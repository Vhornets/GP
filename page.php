<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-news-single-head">
    <img src="<?php bloginfo('template_url'); ?>/img/bg1.jpg" alt="" class="s-news-single-head__image">
</section>

<section class="s-page">
    <div class="l-container">
        <h1 class="c-slider-hero-slide__title c-news__title">
            <?php the_title(); ?>
        </h1>

        <div class="c-slider-hero-slide__date c-news__date">
            <?php echo get_the_date( 'd F Y' ); ?>
        </div>

        <div class="c-news__content">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>