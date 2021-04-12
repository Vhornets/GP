<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php echo get_bloginfo('name') . ' > ' . wp_title('', false); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="it-rating" content="it-rat-35a8b5d7bafe5451a5f0c4800ad877c1" />
    <meta name="cmsmagazine" content="062d657087963e3c33f7fa610e4ee49a" />

    <?php if (has_site_icon()): ?>
        <?php wp_site_icon(); ?>
    <?php else: ?>
        <link type="image/x-icon" rel="icon" href="<?php echo bloginfo('template_url'); ?>/favicon.ico">
    <?php endif; ?>

    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="c-main-menu-mobile__wrap">
    <div class="c-main-menu-mobile__content">
        <ul class="c-main-menu-mobile">
            <?php wp_nav_menu(array(
                'menu' => 'main-menu',
                'theme_location' => 'main-menu',
                'container' => false,
                'items_wrap' => '%3$s',
            )); ?>

            <li>
                <?php if(is_user_logged_in()): ?>
                    <a href="<?php the_permalink( get_field('page-account', 'options') ); ?>">Account</a><a href="<?php echo wp_logout_url( get_permalink( get_field('page-login', 'options') ) ); ?>"> / Logout
                    </a>                     
                <?php else: ?>
                    <a href="<?php the_permalink( get_field('page-login', 'options') ); ?>">
                        <span>Login</span>
                    </a>
                <?php endif; ?>
            </li>            

            <li>
                <ul class="c-language-switcher">
                    <?php pll_the_languages(['display_names_as' => 'slug']); ?>
                </ul>
            </li>
        </ul>
    </div>
</div>

<header class="c-header">
    <div class="l-header">
        <div class="l-header__logo">
            <a href="<?php echo pll_home_url(); ?>" class="c-header__logo">
                <?php echo file_get_contents( get_field('logo', 'options')['url'] ); ?>
            </a>
        </div>

        <div class="l-header__menu">
            <ul class="c-main-menu">
                <?php wp_nav_menu(array(
                    'menu' => 'main-menu',
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'items_wrap' => '%3$s',
                    'walker' => new Vh_Walker_Menu()
                )); ?>

                <li>
                    <?php if(is_user_logged_in()): ?>
                        <a href="<?php the_permalink( get_field('page-account', 'options') ); ?>">
                            <span>Account</span>
                        </a>

                        <a href="<?php echo wp_logout_url( get_permalink( get_field('page-login', 'options') ) ); ?>">
                            <span>Logout</span>
                        </a>                        
                    <?php else: ?>
                        <a href="<?php the_permalink( get_field('page-login', 'options') ); ?>">
                            <span>Login</span>
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>

        <div class="l-header__socials">
            <ul class="c-socials">
                <?php get_template_part('partials/socials'); ?>
            </ul>

            <ul class="c-language-switcher">
                <?php pll_the_languages(['display_names_as' => 'slug']); ?>
            </ul>
        </div>

        <div class="l-header__menu-toggle">
            <button type="button" class="c-main-menu__toggle js-toggle-main-menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>