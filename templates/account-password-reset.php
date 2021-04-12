<?php
/**
* Template Name: Account - Password Reset
*/

define('DONOTCACHEPAGE', true);

$bg = get_field('page-account__bg');

if(!$bg) {
    $bg = get_field('page-account__bg', get_field('page-account', 'options') );
}
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-account" style="background-image: url('<?php echo $bg['url']; ?>');">
    <img src="<?php bloginfo('template_url'); ?>/img/account-weed.png" class="s-account__weed s-account__weed--mobile s-account__weed--opacity">

    <div class="l-account">
        <div class="l-account__password-reset">
            <div class="l-account__password-reset-content">
                <form class="js-form-validate js-form-account-send c-form-grey c-form-grey--password-reset">
                    <div class="o-title o-title--small c-form-grey__title c-form-grey__title--inline">
                        <span>Reset</span> your password?
                    </div>

                    <div class="c-form-grey__text">
                        <p>Please provide the username or email address that you used when you signed up for your Green Prairie account.</p>
                        <p>We will send you an email that will allow you to reset your password.</p>
                    </div>

                    <div class="c-form-grey__group c-form-grey__group--login c-form-grey__group--password--max-width">
                        <input type="email" name="user_login" class="c-form-grey__control c-form-grey__control--password-reset" placeholder="Email *" required>
                    </div>

                    <div class="c-form-grey__group">
                        <a href="<?php the_permalink( get_field('page-login', 'options') ); ?>" class="o-button-plain o-button-plain--gray c-form-grey__button">
                            < SING IN
                        </a>

                        <input type="submit" class="o-button-plain c-form-grey__button c-form-grey__button--desktop c-form-grey__submit c-form-grey__submit--wide" value="SEND VERIFICATION EMAIL" data-sending-text="Sending..." disabled>
                        <input type="submit" class="o-button-plain c-form-grey__button c-form-grey__button--mobile c-form-grey__submit c-form-grey__submit--wide" value="SEND" data-sending-text="Sending..." disabled>
                    </div>

                    <?php wp_nonce_field('user_reset_password'); ?>
                    <input type="hidden" name="action" value="userResetPassword">
                </form>
            </div>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php endif; ?>

<?php get_footer(); ?>