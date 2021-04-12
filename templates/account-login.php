<?php
/**
* Template Name: Account - Login
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
    <img src="<?php bloginfo('template_url'); ?>/img/account-weed.png" class="s-account__weed s-account__weed--mobile">

    <div class="l-account">
        <div class="l-account__login">
            <div class="l-account__login-content">
                <?php //wp_login_form(['value_remember' => 1, 'remember' => 0] ); ?>

                <form action="" class="js-form-validate js-form-account-send c-form-grey c-form-grey--login">
                    <div class="o-title o-title--small c-form-grey__title">
                        <span>Sign in to your</span> Green Prairie
                    </div>

                    <div class="c-form-grey__group c-form-grey__group--login">
                        <input type="email" name="log" class="c-form-grey__control" placeholder="Email *" required>
                    </div>

                    <div class="c-form-grey__group c-form-grey__group--password">
                        <input type="password" name="pwd" class="c-form-grey__control" placeholder="Password *" required>
                    </div>

                    <div class="c-form-grey__group">
                        <a href="<?php the_permalink( get_field('page-register', 'options') ); ?>" class="o-button-plain o-button-plain--white s-account__register-hidden c-form-grey__button">
                            Sign up
                        </a>

                        <input type="submit" class="o-button-plain c-form-grey__submit c-form-grey__button" disabled value="Sign In" data-sending-text="Signing in...">
                    </div>

                    <div class="c-form-grey__group">
                        <a href="<?php the_permalink( get_field('page-password-reset', 'options') ); ?>" class="c-form-grey__reset-password">
                            Forgot password?
                        </a>
                    </div>

                    <?php wp_nonce_field('user_log_in'); ?>
                    <input type="hidden" name="action" value="userLogin">
                </form>
            </div>
        </div>

        <div class="l-account__card">
            <img src="<?php bloginfo('template_url'); ?>/img/account-weed.png" class="s-account__weed s-account__weed--desktop">

            <div class="l-account__card-content">
                <div class="o-title o-title--small s-account__card-title">
                    Hello there!
                </div>
    
                <div class="s-account__card-text">
                    Please feel free to create a new account
                </div>
    
                <a href="<?php the_permalink( get_field('page-register', 'options') ); ?>" class="o-button-plain o-button-plain--white c-form-grey__button">
                    Sign up
                </a>
            </div>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php endif; ?>

<?php get_footer(); ?>