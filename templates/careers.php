<?php
/**
* Template Name: Careers
*/
?>

<?php get_header(); ?>

<?php if(have_posts()): the_post(); ?>

<section class="s-slider-hero">
    <?php get_template_part('partials/slider-hero'); ?>
</section>

<?php $cards = get_field('careers-cards'); ?>

<?php if($cards): ?>
    <?php foreach($cards as $card): ?>
        <section class="s-product <?php if($card['reversed']): ?>s-product--reversed<?php endif; ?>">
            <div class="l-product">
                <div class="l-product__text">
                    <div class="o-title o-title--has-bottom-line">
                        <?php echo $card['title']; ?>
                    </div>

                    <?php echo $card['text']; ?>
                </div>

                <div class="l-product__image">
                    <img src="<?php echo $card['image']['sizes']['large']; ?>" />
                </div>
            </div>            
        </section>        
    <?php endforeach; ?>
<?php endif; ?>

<section class="s-vacancies">
    <div class="l-team text-center">
        <div class="l-team__head">
            <div class="o-title o-title--smaller o-title--has-bottom-line o-title--inline s-vacancies__title">
                <?php the_field('careers__title'); ?>
            </div>

            <div class="s-vacancies__text">
                <?php the_field('careers__text'); ?>
            </div>
        </div>          
    </div>

    <div class="l-vacancies">
        <?php $vacancies = get_posts(['post_type' => 'vacancy', 'posts_per_page' => -1]); ?>

        <?php foreach($vacancies as $vacancy): ?>
            <div class="l-vacancies__item">
                <a href="<?php echo get_the_permalink($vacancy->ID); ?>" class="c-card-vacancy">
                    <div class="c-card-vacancy__title">
                        <?php echo $vacancy->post_title; ?>
                    </div>

                    <div class="o-button-default o-button-default--has-arrow-green c-card-vacancy__button">
                        <?php pll_e('read more'); ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<div class="s-benefits__image">
    <img src="<?php echo get_field('careers-benefits__image')['url']; ?>" alt="">
</div>

<section class="s-benefits">
    <div class="l-team text-center">
        <div class="l-team__head">
            <div class="o-title o-title--smaller o-title--has-bottom-line o-title--inline s-benefits__title">
                <?php the_field('careers-benefits__title'); ?>
            </div>

            <div class="s-benefits__text">
                <?php the_field('careers-benefits__text'); ?>
            </div>
        </div>          
    </div>

    <?php
        $benefits = get_field('careers-benefits');
        $benefitsColumns = array_chunk($benefits, 6);
    ?>

    <div class="l-benefits">
        <?php foreach($benefitsColumns as $benefits): ?>
            <div class="l-benefits__column">
                <?php foreach($benefits as $benefit): ?>
                    <div class="s-benefits__item">
                        <?php echo $benefit['text']; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>