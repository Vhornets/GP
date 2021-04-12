import validate from 'jquery-validation';
import Dropzone from 'dropzone';

export default class Forms {
    constructor() {
        this.initDropdown();
        this.initFormValidation();
        this.handleFileUpload();
        this.handleFormSubmit();

        this.handle2faSend();
        this.handleLoginFormSubmit();
    }

    initDropdown() {
        let toggle = ($submenu, status) => {
            let css = status == 'show' ? {visibility: 'visible', opacity: 1} : {visibility: 'hidden', opacity: 0};

            $submenu.css(css);
        };

        $('.js-dropdown').on('click', (e) => {
            e.preventDefault();

            let $self = $(e.currentTarget);
            let $submenu = $self.find('.sub-menu');

            if($self.hasClass('is-active')) {
                $self.removeClass('is-active');
                toggle($submenu, 'hide');

                return;
            }

            toggle($submenu, 'show');
            
            $self.addClass('is-active');
        });

        $('.js-dropdown .sub-menu a').on('click', (e) => {
            e.preventDefault();

            let $self = $(e.currentTarget);
            let value = $self.text();
            let $dropdown = $self.parents('.js-dropdown');
            let $select = $dropdown.find('select');

            $select.find(`option[value='${value}']`).attr('selected','selected');
            $dropdown.find('.c-dropdown__value').text(value);
        });
    }

    initFormValidation() {
        $('.js-form-validate').each(function() {
            $(this).validate({
                errorPlacement: () => false,

                submitHandler: (form) => {
                    $(form).trigger('form.valid');

                    return false;
                },
            });
        });

        $('input[required],textarea[required]').on('input', (e) => {
            let $self = $(e.currentTarget);
            let $form = $self.parents('form');

            if($form.valid()) {
                $form.find('[type="submit"]').prop("disabled", false);

                return;
            }

            $form.find('[type="submit"]').prop("disabled", true);
        });
    }

    handleFormSubmit() {
        $('.js-form-submit').on('form.valid', function() {
            let $self = $(this);
            let $response = $self.find('.c-form__response');
            let $button = $self.find('button[type="submit"]');
            let button_old_text = $button.text();

            $button.text( $button.data('sending-text') );

            let request = $.ajax('/wp-admin/admin-ajax.php', {
                method: 'post',
                data: $self.serialize()
            });

            request.done((res) => {
                $button.text(button_old_text);

                $self.get(0).reset();

                $self.find('.c-file-upload').each((i, el) => $(el).text( $(el).data('initial-text') ));

                $response.find('.c-form__response-text').html(res);
                $response.addClass('is-active');

                setTimeout(() => $response.removeClass('is-active'), 4000);
            });
        });
    }

    handle2faSend() {
        $(document.body).on('submit', 'form[name="validate_2fa_form"]', (e) => {
            let $form = $(e.currentTarget);

            if ($form.find('input[name="wp-2fa-email-code"]').val() == '') {
                e.preventDefault();
            }
        });
    }

    handleLoginFormSubmit() {
        $('.js-form-account-send').on('form.valid', function() {
            let $self = $(this);
            let $responseModal = $('[data-remodal-id="modal-message"]');
            let $button = $self.find('[type="submit"]');
            let button_old_text = $button.val();
            let data = $self.serialize();

            let isValidURL = (str) => {
                var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                    '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
                return !!pattern.test(str);
            };            

            $button.val( $button.data('sending-text') );

            let request = $.ajax('/wp-admin/admin-ajax.php', { method: 'post', data: data });

            request.done((res) => {
                $self.find('.c-file-upload').each((i, el) => $(el).text($(el).data('initial-text')));
                
                if (isValidURL(res)) {
                    window.location.href = res; 
                }

                else {
                    $responseModal.find('.c-modal__content').html(res);

                    $responseModal.remodal().open();

                    $button.val( button_old_text );

                    $button.val(button_old_text);
                }
            });
        });
    }

    handleFileUpload() {
        $('.c-file-upload').each((i, el) => {
            let dropzone = new Dropzone(el, {
                url: "/wp-admin/admin-ajax.php?action=uploadFile",
                processing: function() {
                    let $self = $(this.element);

                    $self.text( $self.data('uploading-text') );
                },
                success: function(e, res) {
                    let $self = $(this.element);
                    let $file_id_input = $( '#' + $self.data('input-id') );

                    if(res !== 0) {
                        $self.text(e.name);
                        $file_id_input.val(res);

                        if ($self.hasClass('c-file-upload--company-logo')) {
                            let $form = $self.parents('.c-account-settings__logo');
                            let request = $.ajax('/wp-admin/admin-ajax.php', { method: 'post', data: $form.serialize() });

                            request.done((res) => {
                                if (res != 0) {
                                    $form.find('img').attr('src', res);
                                }
                            });
                        }
                    }
                }
            });
        });
    }
}
