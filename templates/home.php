<?php
/**
* Template Name: Home page
*/
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-slider-hero">
    <?php get_template_part('partials/slider-hero'); ?>
</section>

<section class="s-about-short">
    <div class="l-about-short">
        <div class="l-about-short__text">
            <div class="o-title s-about-short__title">
                <?php the_field('home-about__title'); ?>
            </div>

            <div class="o-text s-about-short__text">
                <?php the_field('home-about__text'); ?>
            </div>
        </div>

        <div class="l-about-short__image">
            <img src="<?php echo get_field('home-about__image')['sizes']['medium_large']; ?>" alt="" class="c-about-short__image" />
        </div>
    </div>
</section>

<section class="s-services" style="background-image: url('<?php echo get_field('home-services__bg')['url']; ?>');">
    <?php 
        $services = get_posts(['post_type' => 'service', 'posts_per_page' => -1]);
        $servicesPage = get_post(get_field('home-services__services-page'));
    ?>

    <div class="l-services">
        <div class="l-services__text">
            <div class="o-title s-services__title">
                <?php the_field('home-services__title'); ?>
            </div>

            <div class="o-text s-services__text">
                <?php the_field('home-services__text'); ?>
            </div>
        </div>

        <div class="l-services__slider">
            <div class="c-slider-services__wrap">
                <div class="c-slider-services" id="slider-services">
                    <?php foreach($services as $post): setup_postdata($post); ?>
                        <div class="c-slider-services__slide">
                            <a href="<?php echo get_the_permalink($servicesPage); ?>#service-<?php the_ID(); ?>" class="c-card-service">
                                <div class="c-card-service__icon">
                                    <img src="<?php echo get_field('service__icon')['url']; ?>" />
                                </div>

                                <div class="c-card-service__title">
                                    <?php the_title(); ?>
                                </div>

                                <div class="c-card-service__text">
                                    <?php the_field('service__short-description'); ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>

                <div class="c-slider-services__arrows">
                    <button class="js-change-slide" data-action="slickPrev" data-slider="#slider-services"><</button>
                    <button class="js-change-slide" data-action="slickNext" data-slider="#slider-services">></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="s-products">
    <?php 
        $products = get_posts(['post_type' => 'product', 'posts_per_page' => -1]);
        $productsFeatured = get_field('home-products__featured');
        $productsPage = get_post(get_field('home-products__products-page'));
    ?>

    <div class="s-products__decor">
        <img src="<?php echo get_field('home-products__icon')['url']; ?>" />
    </div>

    <div class="l-products">
        <div class="l-products__column l-products__list">
            <div class="o-title o-title--smaller o-title--has-bottom-line s-products__title">
                <?php the_field('home-products__title'); ?>
            </div>

            <ul class="c-list-products">
                <?php foreach($products as $product): ?>
                    <li>
                        <a href="<?php echo get_the_permalink($productsPage); ?>#product-<?php echo $product->ID; ?>">
                            <?php echo $product->post_title; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="l-products__column l-products__column--has-children-columns">
            <?php foreach($productsFeatured as $product): ?>
                <div class="l-products__product">
                    <a href="<?php echo get_the_permalink($productsPage); ?>#product-<?php echo $product->ID; ?>" class="c-card-product" style="background-image: url('<?php echo get_thumbnail_src('medium_large', $product->ID); ?>');">
                        <div class="c-card-product__content">
                            <?php echo $product->post_title; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="s-news">
    <img src="<?php echo get_field('home-news__bg')['url']; ?>" class="s-news__bg" />

    <?php 
        $newsTitle = get_field('home-news__title');
        $latestPosts = get_posts(['posts_per_page' => 5]);
    ?>

    <div class="l-news">
        <?php $counter = 0; foreach($latestPosts as $post): setup_postdata($post); if($counter > 0) continue; ?>
            <?php $latestNews = get_the_id(); ?>

            <div class="l-news__featured">
                <div class="o-title o-title--smaller o-title--has-bottom-line s-news__title">
                    <?php echo $newsTitle; ?>
                </div>

                <a href="<?php the_permalink(); ?>" class="c-card c-card--featured">
                    <img src="<?php echo get_thumbnail_src('medium_large'); ?>" class="c-card__image" />

                    <div class="c-card__title">
                        <div class="c-card__date">
                            <?php echo get_the_date( 'd F Y' ); ?>
                        </div>

                        <?php the_title(); ?>
                    </div>

                    <div class="c-card__more">
                        <?php pll_e('Learn more'); ?>
                    </div>
                </a>
            </div>
        <?php $counter++; endforeach; wp_reset_postdata(); ?>

        <div class="l-news__posts">
            <?php foreach($latestPosts as $post): setup_postdata($post); if(get_the_id() == $latestNews) continue; ?>
                <a href="<?php the_permalink(); ?>" class="c-card">
                    <?php get_template_part('partials/news-card'); ?>
                </a>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_template_part('partials/contact'); ?>

<?php endif; ?>

<?php get_footer(); ?>