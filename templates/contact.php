<?php
/**
* Template Name: Contact
*/
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<?php get_template_part('partials/contact'); ?>

<section class="s-map">
    <div id="map" class="c-map" data-map-markers="<?php echo htmlspecialchars(json_encode( get_field('map') ), ENT_QUOTES, 'UTF-8'); ?>"></div>
</section>

<?php get_template_part('partials/team'); ?>

<?php endif; ?>

<?php get_footer(); ?>