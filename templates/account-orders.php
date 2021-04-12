<?php
/**
* Template Name: Account - Orders
*/

define('DONOTCACHEPAGE', true);

$user = wp_get_current_user();

update_user_meta($user->ID, 'wp_2fa_nominated_email_address', $user->user_email);
update_user_meta($user->ID, 'wp_2fa_enabled_methods', 'email');

$orders = get_posts([
    'post_type' => 'green-order',
    'posts_per_page' => -1,
    'author' => $user->ID
]);

$bg = get_field('page-account__bg');

if(!$bg) {
    $bg = get_field('page-account__bg', get_field('page-account', 'options') );
}
?>

<?php get_header(); ?>

<section class="s-account s-account--orders" style="background-image: url('<?php echo $bg['url']; ?>');">
    <div class="l-account l-account--wide">
        <?php get_template_part('partials/account/navigation'); ?>

        <div class="l-account__invoices">
            <div class="l-account__invoices-content l-account__invoices-content--orders <?php if(count($orders) > 6): ?>has-max-height<?php endif;?>">
                <div class="o-title o-title--medium c-account-settings__heading">
                    Order <span>status</span>
                </div>

                <?php if($user->ID == 0): ?>
                    <div class="c-order">
                        <p>You must be logged in to view your orders.</p>
                    </div>
                <?php else: ?>
                    <?php foreach($orders as $post): setup_postdata($post); ?>
                        <div class="c-order">
                            <div class="c-order__back">
                                <i class="icon svg-back svg-back-dims"></i>
                                Go Back
                            </div>

                            <div class="c-order__button">
                                <?php echo file_get_contents( get_bloginfo('template_url') . '/assets/svg/accordion-arrow.svg' ); ?>
                            </div>

                            <div class="l-order">
                                <div class="l-order__row">
                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Order number
                                            <strong><?php the_field('order__number'); ?></strong>
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Booking No.
                                            <strong><?php the_field('order__booking-number'); ?></strong>
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <?php $shipmentStatusText = ['Being processed', 'On schedule', 'On schedule', 'Delivered', 'Hold', 'Canceled']; ?>

                                        <div class="c-order__column-title c-order__column-title--<?php the_field('order__shipment'); ?>">
                                            Shipment status
                                            <strong><?php echo $shipmentStatusText[get_field('order__shipment') - 1]; ?></strong>
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Week
                                            <strong><?php the_field('order__week'); ?></strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="l-order__row">
                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Vessel
                                            <strong><?php the_field('order__vessel'); ?></strong>
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Destination
                                            <strong><?php the_field('order__destination'); ?></strong>
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title c-order__column-title--delayed">
                                            Carrier
                                            <strong><?php the_field('order__carrier'); ?></strong>
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            ETA
                                            <strong><?php the_field('order__eta'); ?></strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="l-order__row">
                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Container
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Product
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title c-order__column-title--delayed">
                                            Wrap
                                        </div>
                                    </div>

                                    <div class="l-order__column">
                                        <div class="c-order__column-title">
                                            Packaging
                                        </div>
                                    </div>
                                </div>

                                <?php foreach(get_field('order__content') as $content): ?>
                                    <div class="l-order__row">
                                        <div class="l-order__column">
                                            <div class="c-order__column-title">
                                                <a href="<?php echo $content['container']['url']; ?>" class="c-order__column-link" rel="nofollow" target="_blank">
                                                    <strong><?php echo $content['container']['text']; ?></strong>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="l-order__column">
                                            <div class="c-order__column-title">
                                                <strong><?php echo $content['product']; ?></strong>
                                            </div>
                                        </div>

                                        <div class="l-order__column">
                                            <div class="c-order__column-title">
                                                <strong><?php echo $content['wrap']; ?></strong>
                                            </div>
                                        </div>

                                        <div class="l-order__column">
                                            <div class="c-order__column-title">
                                                <strong><?php echo $content['packaging']; ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>                                


                                <div class="c-order__details">
                                    <?php $shipmentText = get_field('order__shipment-text'); ?>
                                    
                                    <div class="l-order-tracking l-order-tracking--<?php the_field('order__shipment'); ?>">
                                        <?php for($i = 0; $i <= 3; $i++): ?>
                                            <div class="l-order-tracking__point">
                                                <div class="c-order-tracking-point">
                                                    <div class="c-order-tracking-point__icon">
                                                        <i class="icon svg-order-tracking-<?php echo $i; ?> svg-order-tracking-<?php echo $i; ?>-dims"></i>
                                                    </div>

                                                    <div class="c-order-tracking-point__title">
                                                        <?php echo $shipmentText[$i]['text']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                    
                                    <div class="c-order-comment">
                                        <div class="c-order-comment__title">
                                            Payment information
                                        </div>

                                        <?php if(get_field('order__payment-info')): ?>
                                            <div class="c-order-comment__text">
                                                <?php the_field('order__payment-info'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="c-table c-table--white c-table--order-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Container</th>
                                                    <th>Product</th>
                                                    <!-- <th>Lot</th> -->
                                                    <th>Wrap</th>
                                                    <th>Packaging</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach(get_field('order__content') as $content): ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo $content['container']['url']; ?>" rel="nofollow" target="_blank">
                                                                <?php echo $content['container']['text']; ?>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <?php echo $content['product']; ?>
                                                        </td>

                                                        <!-- <td>
                                                            <?php echo $content['lot']; ?>
                                                        </td> -->

                                                        <td>
                                                            <?php echo $content['wrap']; ?>
                                                        </td>

                                                        <td>
                                                            <?php echo $content['packaging']; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>   
                                    
                                    <div class="c-order-comment">
                                        <div class="c-order-comment__title">
                                            Comments
                                        </div>

                                        <?php if(get_field('order__comment')): ?>
                                            <div class="c-order-comment__text">
                                                <?php the_field('order__comment'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div> 
                                    
                                    <div class="c-order-buttons">
                                        <?php if(get_field('order__schedule')): ?>
                                            <a href="<?php echo get_field('order__schedule')['url']; ?>">
                                                Download schedule
                                            </a>
                                        <?php endif; ?>

                                        <?php $invoice = get_field('order-invoices'); ?>

                                        <?php if($invoice): ?>
                                            <a href="<?php echo $invoice[count($invoice) - 1]['file']['url']; ?>">
                                                Show invoice
                                            </a>
                                        <?php endif; ?>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php endif; ?>

            </div>

            <?php if(count($orders) > 6): ?>
                <div class="l-account__invoices-more">
                    <div class="c-account-invoices__more js-account-show-more">
                        <span>Show more</span>

                        <?php echo file_get_contents( get_bloginfo('template_url') . '/assets/svg/arrow-down.svg' ); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php get_footer(); ?>