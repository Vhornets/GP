<?php
/**
* Template Name: Account - Edit
*/

define('DONOTCACHEPAGE', true);

$user = wp_get_current_user();
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
        <div class="l-account__register">
            <img src="<?php bloginfo('template_url'); ?>/img/account-weed.png" class="s-account__weed s-account__weed--desktop">

            <div class="l-account__register-content">
                <form action="" class="js-form-validate js-form-account-send c-form-grey c-form-grey--light">
                    <div class="o-title o-title--small c-form-grey__title">
                        Edit your <span>account</span> 
                    </div>

                    <fieldset>
                        <legend>Company details</legend>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_name" class="c-form-grey__control" placeholder="Company name" value="<?php the_field('user__company_name', 'user_'.$user->ID); ?>">
                        </div>
    
                        <div class="c-form-grey__group c-form-grey__group--street">
                            <input type="text" name="company_street" class="c-form-grey__control" placeholder="Street" value="<?php the_field('user__company_street', 'user_'.$user->ID); ?>">
                            <input type="number" name="company_building" class="c-form-grey__control" placeholder="Nr." value="<?php the_field('user__company_building', 'user_'.$user->ID); ?>">
                        </div>
    
                        <div class="c-form-grey__group c-form-grey__group--city">
                            <input type="number" name="company_zip" class="c-form-grey__control" placeholder="Zip code" value="<?php the_field('user__company_zip', 'user_'.$user->ID); ?>">
                            <input type="text" name="company_city" class="c-form-grey__control" placeholder="City / Town" value="<?php the_field('user__company_city', 'user_'.$user->ID); ?>">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_country" class="c-form-grey__control" placeholder="Country" value="<?php the_field('user__company_country', 'user_'.$user->ID); ?>">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="tel" name="company_phone" class="c-form-grey__control" placeholder="Phone" value="<?php the_field('user__company_phone', 'user_'.$user->ID); ?>">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_vat" class="c-form-grey__control" placeholder="VAT Number" value="<?php the_field('user__company_vat', 'user_'.$user->ID); ?>">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="company_chamber" class="c-form-grey__control" placeholder="Chamber of commerce Number" value="<?php the_field('user__company_chamber', 'user_'.$user->ID); ?>">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Contact person</legend>

                        <div class="c-form-grey__group">
                            <input type="text" name="first_name" class="c-form-grey__control" placeholder="Name" value="<?php echo $user->first_name; ?>">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="text" name="last_name" class="c-form-grey__control" placeholder="Surname" value="<?php echo $user->last_name; ?>">
                        </div>

                        <div class="c-form-grey__group">
                            <input type="tel" name="phone" class="c-form-grey__control" placeholder="Phone" value="<?php the_field('user__phone', 'user_'.$user->ID); ?>">
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Account</legend>

                        <div class="c-form-grey__group c-form-grey__group--login">
                            <input type="email" name="log" class="c-form-grey__control" placeholder="Email" value="<?php echo $user->user_email; ?>" required>
                        </div>
                    </fieldset>

                    <div class="c-form-grey__group">
                        <a href="<?php the_permalink( get_field('page-account', 'options') ); ?>" class="o-button-plain o-button-plain--white">
                            Back
                        </a>

                        <input type="submit" class="o-button-plain o-button-plain--white o-button-plain--white-active c-form-grey__submit c-form-grey__button" value="Done" data-sending-text="Editing...">
                    </div>

                    <?php wp_nonce_field('user_edit'); ?>
                    <input type="hidden" name="action" value="userEdit">
                </form>
            </div>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php endif; ?>

<?php get_footer(); ?>