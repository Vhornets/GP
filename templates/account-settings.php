<?php
/**
* Template Name: Account - Settings
*/

define('DONOTCACHEPAGE', true);

$user = wp_get_current_user();
$avatar = get_field('user__avatar', 'user_'.$user->ID)['sizes']['medium'];
$bg = get_field('page-account__bg');

if(!$avatar) {
    $avatar = get_avatar_url($user);
}
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-account s-account--settings" style="background-image: url('<?php echo $bg['url']; ?>');">
    <div class="l-account l-account--wide">
        <?php get_template_part('partials/account/navigation'); ?>

        <div class="l-account__settings">
            <div class="l-account__register-content">
                <div class="o-title o-title--medium c-account-settings__heading">
                    Account
                </div>

                <div class="l-account-settings">
                    <?php //echo do_shortcode( '[wp-2fa-setup-form]' ); ?>

                    <div class="l-account-settings__edit">
                        <a href="<?php the_permalink( get_field('page-account-edit', 'options') ); ?>" class="s-account__settings-edit">
                            Edit
                        </a>
                    </div>

                    <div class="l-account-settings__column">
                        <div class="c-account-settings__title">
                            Company details
                        </div>

                        <div class="c-account-settings__text">
                            <strong><?php the_field('user__company_name', 'user_'.$user->ID); ?></strong>
                            <?php the_field('user__company_street', 'user_'.$user->ID); ?> <?php the_field('user__company_building', 'user_'.$user->ID); ?><br>
                            <?php the_field('user__company_city', 'user_'.$user->ID); ?><br>
                            <?php the_field('user__company_country', 'user_'.$user->ID); ?>
                            <br>
                            T. <?php the_field('user__company_phone', 'user_'.$user->ID); ?>
                            <br><br>
                            VAT: <?php the_field('user__company_vat', 'user_'.$user->ID); ?><br>
                            COC: <?php the_field('user__company_chamber', 'user_'.$user->ID); ?>
                        </div>
                    </div>

                    <div class="l-account-settings__column">
                        <div class="c-account-settings__title">
                            Contact person
                        </div>

                        <div class="c-account-settings__text">
                            <strong><?php echo $user->display_name; ?></strong>
                            T. <?php the_field('user__phone', 'user_'.$user->ID); ?><br>
                            E. <?php echo $user->user_email; ?>
                        </div>
                    </div>

                    <div class="l-account-settings__column l-account-settings__column--logo">
                        <div class="c-account-settings__title">
                            Company logo
                        </div>

                        <form class="c-account-settings__logo">
                            <img src="<?php echo $avatar; ?>" alt="">

                            <div class="c-file-upload c-file-upload--company-logo c-account-settings__logo-upload" data-initial-text="<?php pll_e('Attach'); ?>" data-uploading-text="<?php pll_e('Uploading'); ?>..." data-input-id="file_logo_id">
                                <?php pll_e('Attach'); ?>
                            </div>


                            <?php wp_nonce_field('user_upload_logo'); ?>
                            <input type="hidden" name="file_logo_id" id="file_logo_id">
                            <input type="hidden" name="action" value="userUploadLogo">                            
                            <input type="hidden" name="user_id" value="<?php echo $user->ID; ?>">                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php endif; ?>

<?php get_footer(); ?>