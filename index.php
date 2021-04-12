<?php get_header(); ?>

<section class="s-slider-hero s-slider-hero--news">
    <?php $latesPost = get_posts(['post_type' => 'post', 'posts_per_page' => 1]); ?>

    <div class="c-slider-hero">
        <?php foreach($latesPost as $post): setup_postdata($post); ?>
            <div class="c-slider-hero__slide">
                <div class="c-slider-hero-slide" style="background-image: url('<?php echo get_thumbnail_src('full'); ?>');">
                    <div class="c-slider-hero-slide__container">
                        <div class="c-slider-hero-slide__content">
                            <div class="c-slider-hero-slide__title">
                                <?php the_title(); ?>
                            </div>

                            <div class="c-slider-hero-slide__date">
                                <?php echo get_the_date( 'd F Y' ); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="o-button-default o-button-default--has-arrow">
                                <?php pll_e('Learn more'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>

    <div class="c-slider-hero__scroll">
        <i class="icon svg-scroll svg-scroll-dims"></i>
    </div>
</section>

<section class="s-news">
    <div class="l-news l-news--archive">
        <div class="l-news__posts">
            <?php if(have_posts()): while(have_posts()): the_post(); if(get_the_ID() == $latesPost[0]->ID) continue; ?>
                <a href="<?php the_permalink(); ?>" class="c-card">
                    <?php get_template_part('partials/news-card'); ?>
                </a>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>