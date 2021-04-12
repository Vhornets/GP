<?php $homeId = get_option('page_on_front'); ?>

<section class="s-contact" style="background-image: url('<?php echo get_field('contact__bg', $homeId)['url']; ?>');">
    <div class="l-contact">
        <div class="l-contact__text">
            <div class="o-title o-title--smaller o-title--has-bottom-line s-contact__title">
                <?php the_field('contact__title', $homeId); ?>
            </div>

            <?php get_template_part('partials/contacts-list'); ?>
        </div>

        <div class="l-contact__form">
            <form class="c-form js-form-validate js-form-submit">
                <div class="c-form__group">
                    <input type="text" name="name" class="c-form__control" placeholder="<?php pll_e('Name'); ?>" required>
                </div>

                <div class="c-form__group">
                    <input type="email" name="email" class="c-form__control" placeholder="Email" required>
                </div>

                <div class="c-form__group">
                    <input type="text" name="subject" class="c-form__control" placeholder="<?php pll_e('Subject'); ?>" required>
                </div>

                <div class="c-form__group">
                    <div class="c-dropdown js-dropdown">
                        <select name="department" required>
                            <?php foreach(get_field('contact__departments', $homeId) as $department): ?>
                                <option value="<?php echo $department['department']; ?>"><?php echo $department['department']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="c-form__control c-dropdown__value">
                            <?php pll_e('Department'); ?>
                        </div>

                        <ul class="sub-menu">
                            <?php foreach(get_field('contact__departments', $homeId) as $department): ?>
                                <li>
                                    <a href="#">
                                        <?php echo $department['department']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="c-form__group">
                    <textarea name="message" class="c-form__control" placeholder="<?php pll_e('Message'); ?>" required></textarea>
                </div>

                <div class="c-form__group c-form__group--submit">
                    <button type="submit" disabled class="o-button-default o-button-default--has-arrow c-form__submit" data-sending-text="<?php pll_e('Sending'); ?>...">
                        <?php pll_e('Send'); ?>
                    </button>
                </div>

                <?php wp_nonce_field('send_request'); ?>
                <input type="hidden" name="action" value="sendRequest">

                <div class="c-form__response">
                    <div class="c-form__response-text"></div>
                </div>
            </form>
        </div>
    </div>
</section>