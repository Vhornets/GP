<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-news-single-head">
    <img src="<?php echo get_thumbnail_src('full'); ?>" alt="" class="s-news-single-head__image">
</section>

<section class="s-news-single">
    <div class="l-news-single">
        <div class="l-news-single__back">
            <a href="<?php echo get_the_permalink( get_option('page_for_posts') ); ?>" class="c-news__back">
                < <?php pll_e('back'); ?>
            </a>
        </div>

        <div class="l-news-single__content">
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
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>