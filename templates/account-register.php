<?php
/**
* Template Name: Account - Register
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
        <div class="l-account__register-card">
            <div class="l-account__register-card-content">
                <div class="o-title o-title--small s-account__register-card-title">
                    Already have 
                    <span>an account?</span>
                </div>
    
                <a href="<?php the_permalink( get_field('page-login', 'options') ); ?>" class="o-button-plain c-form-grey__button">
                    Sign In
                </a>
            </div>
        </div>

        <div class="l-account__register">
            <img src="<?php bloginfo('template_url'); ?>/img/account-weed.png" class="s-account__weed s-account__weed--desktop">

            <div class="l-account__register-content">
                <form action="" class="js-form-validate js-form-account-send c-form-grey c-form-grey--light">
                    <div class="o-title o-title--small c-form-grey__title">
                        Create your <span>new account</span> 
                    </div>

                    <fieldset>
                        <legend>Company details</legend>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_name" class="c-form-grey__control" placeholder="Company name">
                        </div>
    
                        <div class="c-form-grey__group c-form-grey__group--street">
                            <input type="text" name="company_street" class="c-form-grey__control" placeholder="Street">
                            <input type="number" name="company_building" class="c-form-grey__control" placeholder="Nr.">
                        </div>
    
                        <div class="c-form-grey__group c-form-grey__group--city">
                            <input type="number" name="company_zip" class="c-form-grey__control" placeholder="Zip code">
                            <input type="text" name="company_city" class="c-form-grey__control" placeholder="City / Town">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_country" class="c-form-grey__control" placeholder="Country *" required>
                        </div>

                        <div class="c-form-grey__group">
                            <input type="tel" name="company_phone" class="c-form-grey__control" placeholder="Phone">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_vat" class="c-form-grey__control" placeholder="VAT Number">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_chamber" class="c-form-grey__control" placeholder="Chamber of commerce Number">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Contact person</legend>

                        <div class="c-form-grey__group">
                            <input type="text" name="first_name" class="c-form-grey__control" placeholder="Name *" required>
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="last_name" class="c-form-grey__control" placeholder="Surname *" required>
                        </div>

                        <div class="c-form-grey__group">
                            <input type="tel" name="phone" class="c-form-grey__control" placeholder="Phone *" required>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Account</legend>

                        <div class="c-form-grey__group c-form-grey__group--login">
                            <input type="email" name="log" class="c-form-grey__control" placeholder="Email *" required>
                        </div>

                        <div class="c-form-grey__group c-form-grey__group--password">
                            <input type="password" name="pwd" class="c-form-grey__control" placeholder="Password *" required>
                        </div>

                        <div class="c-form-grey__group c-form-grey__group--password">
                            <input type="password" name="pwd_repeat" class="c-form-grey__control" placeholder="Repeat password *" required>
                        </div>
                    </fieldset>

                    <div class="c-form-grey__group">
                        <input type="submit" class="o-button-plain o-button-plain--white c-form-grey__submit c-form-grey__button" value="Sign Up" data-sending-text="Signing up...">

                        <a href="<?php the_permalink( get_field('page-login', 'options') ); ?>" class="o-button-plain o-button-plain--white s-account__register-hidden c-form-grey__button">
                            Sign in
                        </a>                        
                    </div>

                    <?php wp_nonce_field('user_register'); ?>
                    <input type="hidden" name="action" value="userRegister">
                </form>
            </div>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php endif; ?>

<?php get_footer(); ?>