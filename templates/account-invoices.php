<?php
/**
* Template Name: Account - Invoices
*/

$user = wp_get_current_user();
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

<?php if(have_posts()): the_post(); ?>

<section class="s-account s-account--orders" style="background-image: url('<?php echo $bg['url']; ?>');">
    <div class="l-account l-account--wide">
        <?php get_template_part('partials/account/navigation'); ?>

        <div class="l-account__invoices">
            <div class="l-account__invoices-content l-account__invoices-content--invoices <?php if(count($orders) > 6): ?>has-max-height<?php endif;?>">
                <div class="o-title o-title--medium c-account-settings__heading">
                    Invoices
                </div>
                
                <div class="c-table c-table--invoices">
                    <div class="c-table__title">Unpaid invoices</div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Invoice number</th>
                                <th>Order No.</th>
                                <th>Date</th>
                                <th>Delivery status</th>
                                <th>Amount</th>
                                <th>Expiry date</th>
                                <th>Outstanding</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($orders as $post): setup_postdata($post); ?>
                                <?php foreach(get_field('order-invoices') as $invoice): if($invoice['outstanding']['paid']) continue; ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $invoice['file']['url']; ?>">
                                                <?php echo file_get_contents(get_bloginfo('template_url') . '/assets/svg/pdf.svg'); ?>
                                                <?php echo $invoice['number']; ?>
                                            </a>
                                        </td>

                                        <td>
                                            <?php the_field('order__number'); ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['date']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['delivery-status']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['amount']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['expiry']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['outstanding']['amount']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="c-table c-table--invoices">
                    <div class="c-table__title">Overview paid invoices</div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Invoice number</th>
                                <th>Order No.</th>
                                <th>Date</th>
                                <th>Delivery status</th>
                                <th>Amount</th>
                                <th>Expiry date</th>
                                <th>Outstanding</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($orders as $post): setup_postdata($post); ?>
                                <?php foreach(get_field('order-invoices') as $invoice): if(!$invoice['outstanding']['paid']) continue; ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo $invoice['file']['url']; ?>">
                                                <?php echo file_get_contents(get_bloginfo('template_url') . '/assets/svg/pdf.svg'); ?>
                                                <?php echo $invoice['number']; ?>
                                            </a>
                                        </td>

                                        <td>
                                            <?php the_field('order__number'); ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['date']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['delivery-status']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['amount']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['expiry']; ?>
                                        </td>

                                        <td>
                                            <?php echo $invoice['outstanding']['amount']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if(count($orders) > 6): ?>
                <div class="l-account__invoices-more">
                    <div class="c-account-invoices__more js-account-show-more">
                        <span>Show more</span>

                        <i class="icon svg-arrow-down svg-arrow-down-dims"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part('partials/account/footer'); ?>
</section>

<?php endif; ?>

<?php get_footer(); ?>