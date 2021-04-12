<?php
/**
* Template Name: What we do
*/

$services = get_posts(['post_type' => 'service', 'posts_per_page' => -1]);
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-slider-hero">
    <?php get_template_part('partials/slider-hero'); ?>
</section>

<?php foreach($services as $post): setup_postdata($post); ?>
    <?php 
        $template = str_replace( '.php', '', basename( get_page_template_slug() ) );
        $template = str_replace('service-', '', $template);
    ?>

    <section class="s-<?php echo $template; ?> <?php if(get_field('service__reversed')): ?>s-<?php echo $template; ?>--reversed<?php endif; ?>" id="service-<?php the_ID(); ?>">
        <?php get_template_part("partials/services/$template"); ?>
    </section>
<?php endforeach; wp_reset_postdata(); ?>

<?php endif; ?>

<?php get_footer(); ?>