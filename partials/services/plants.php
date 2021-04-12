<div class="l-container text-center">
    <img src="<?php echo get_field('service__icon')['url']; ?>" alt="" class="s-plants__icon">

    <div class="o-title o-title--smaller o-title--has-bottom-line s-values__title">
        <?php the_field('service__formatted-title'); ?>
    </div>

    <div class="s-marketing__text">
        <?php the_content(); ?>
    </div>
</div>

<div class="l-plants">
    <div class="l-plants__text">
        <p class="c-plants__title">
            <?php the_field('service-plants__subtitle'); ?>
        </p>

        <div class="c-plants__text">
            <?php the_field('service-plants__text'); ?>
        </div>
    </div>

    <div class="l-plants__image">
        <img src="<?php echo get_field('service-plants__image')['url']; ?>" alt="" class="c-plants__image">
    </div>
</div>