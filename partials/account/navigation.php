<?php $homeId = get_option('page_on_front'); ?>

<div class="l-account__navigation">
    <img src="<?php bloginfo('template_url'); ?>/img/account-weed.png" class="s-account__weed s-account__weed--desktop">

    <div class="l-account__navigation-mobile">
        <a href="<?php the_permalink( get_field('page-invoices', 'options') ); ?>">
            <i class="icon svg-invoices svg-invoices-dims"></i>
            <span>Invoices</span>
        </a>

        <a href="<?php the_permalink( get_field('page-order-status', 'options') ); ?>">
            <i class="icon svg-order svg-order-dims"></i>
            <span>Status</span>
        </a>

        <a href="<?php the_permalink( get_field('page-account', 'options') ); ?>">
            <i class="icon svg-proile svg-proile-dims"></i>
            <span>Profile</span>
        </a>
    </div>

    <div class="l-account__navigation-content">
        <div class="c-account-nav__section">
            <div class="c-account-nav__title">
                Overview
            </div>

            <ul class="c-account-nav">
                <li class="<?php if( is_page( get_field('page-order-status', 'options') ) ): ?>is-active<?php endif; ?>">
                    <a href="<?php the_permalink( get_field('page-order-status', 'options') ); ?>">Order status</a>
                </li>

                <li class="<?php if( is_page( get_field('page-invoices', 'options') ) ): ?>is-active<?php endif; ?>">
                    <a href="<?php the_permalink( get_field('page-invoices', 'options') ); ?>">Invoices</a>
                </li>
            </ul>
        </div>

        <div class="c-account-nav__section">
            <div class="c-account-nav__title">
                Account settings
            </div>

            <ul class="c-account-nav">
                <li class="<?php if( is_page( get_field('page-account', 'options') ) ): ?>is-active<?php endif; ?>">
                    <a href="<?php the_permalink( get_field('page-account', 'options') ); ?>">Change settings</a>
                </li>
            </ul>
        </div>

        <div class="c-account-contacts">
            <div class="c-account-contacts__title">
                Contact
            </div>

            <div class="c-account-contacts__item">
                <?php the_field('contact__address', $homeId); ?>
            </div>

            <br>

            <?php foreach(get_field('contact__emails', $homeId) as $email): ?>
                <a href="mailto:<?php echo $email['email']; ?>" class="c-account-contacts__item">
                    <?php echo $email['email']; ?>
                </a>
            <?php endforeach; ?>

            <br>

            <?php foreach(get_field('contact__phones', $homeId) as $phone): ?>
                <a href="tel:<?php echo preg_replace('/[^0-9]/', '', $phone['phone']); ?>" class="c-account-contacts__item">
                    <?php echo $phone['phone']; ?>
                </a>
            <?php endforeach; ?>            
        </div>
    </div>
</div>