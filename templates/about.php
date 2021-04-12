<?php
/**
* Template Name: About
*/
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-slider-hero s-slider-hero--text-shadow">
    <?php get_template_part('partials/slider-hero'); ?>
</section>

<section class="s-about">
    <div class="l-about">
        <div class="l-about__text">
            <div class="o-title o-title--inline o-title--has-bottom-line s-about__title">
                <?php the_field('home-about__title'); ?>
            </div>

            <div class="s-about__text">
                <?php the_field('home-about__text'); ?>
            </div>
        </div>

        <div class="l-about__image">
            <img src="<?php bloginfo('template_url'); ?>/img/weed.jpg" alt="" class="s-about__image" />
        </div>
    </div>
</section>

<section class="s-history" style="background-image: url('<?php echo get_field('about-history__bg')['url']; ?>');">
    <div class="l-history">
        <div class="l-history__title">
            <div class="o-title o-title--has-bottom-line s-history__title">
                <?php the_field('about-history__title'); ?>
            </div>
        </div>

        <div class="l-history__content">
            <div class="c-history">
                <div class="l-history-content">
                    <div class="l-history-content__video">
                        <a href="<?php echo get_field('about-history__video')['link']; ?>" class="c-history__video" style="background-image: url('<?php echo get_field('about-history__video')['image']['sizes']['medium']; ?>');"></a>
                    </div>

                    <div class="l-history-content__text">
                        <div class="c-history__text">
                            <?php the_field('about-history__text'); ?>
                        </div>
                    </div>

                    <div class="l-history-content__images">
                        <?php foreach(get_field('about-history__images') as $image): ?>
                            <img src="<?php echo $image['sizes']['medium']; ?>">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="s-values">
    <div class="l-container text-center">
        <div class="o-title o-title--smaller o-title--has-bottom-line o-title--inline s-values__title">
            <?php the_field('about-values__title'); ?>
        </div>

        <div class="s-values__text">
            <?php the_field('about-values__text'); ?>
        </div>

        <img src="<?php echo get_field('about-values__image')['sizes']['large']; ?>" alt="" class="s-values__image">
    </div>
</section>

<section class="s-community" style="background-image: url('<?php echo get_field('about-history__bg')['url']; ?>');">
    <div class="l-community">
        <div class="l-community__content">
            <div class="o-title o-title--smaller o-title--has-bottom-line s-values__title">
                <?php the_field('about-community__title'); ?>
            </div>

            <p><?php the_field('about-community__text'); ?></p>

            <div class="l-community-columns">
                <?php $communityRows = array_chunk(get_field('about-community__columns'), 2); ?>

                <?php foreach($communityRows as $row): ?>
                    <div class="l-community-columns__item">
                        <?php foreach($row as $column): ?>
                            <div class="c-community__column-text">
                                <h5><?php echo $column['title']; ?></h5>

                                <?php echo $column['text']; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('partials/team'); ?>

<?php endif; ?>

<?php get_footer(); ?>