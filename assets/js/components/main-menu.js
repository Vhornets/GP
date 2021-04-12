export default class MainMenu {
    constructor() {
        this.menuMobileToggle();
    }

    menuMobileToggle() {
        $(document).on('click', '.js-toggle-main-menu', (e) => {
            e.preventDefault();

            $('.c-main-menu-mobile__wrap').fadeToggle();
            $('body').toggleClass('menu-opened');
        });
    }
}
