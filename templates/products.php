<?php
/**
* Template Name: Products
*/

$products = get_posts(['post_type' => 'product', 'posts_per_page' => -1]);
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-slider-hero">
    <?php get_template_part('partials/slider-hero'); ?>
</section>

<?php foreach($products as $post): setup_postdata($post); ?>
    <?php 
        $template = str_replace( '.php', '', basename( get_page_template_slug() ) );
        $template = str_replace('product-', '', $template);
    ?>

    <section class="s-<?php echo $template; ?> <?php if(get_field('product__reversed')): ?>s-<?php echo $template; ?>--reversed<?php endif; ?>" id="product-<?php the_ID(); ?>">
        <?php get_template_part("partials/products/$template"); ?>
    </section>
<?php endforeach; wp_reset_postdata(); ?>

<?php endif; ?>

<?php get_footer(); ?>