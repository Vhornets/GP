<div class="l-containers">
    <div class="l-containers__icon">
        <img src="<?php echo get_field('service__icon')['url']; ?>" alt="">
    </div>

    <div class="l-containers__text">
        <div class="o-title o-title--smaller s-containers__title">
            <?php the_field('service__formatted-title'); ?>
        </div>

        <div class="s-containers__text">
            <?php the_content(); ?>
        </div>
    </div>

    <div class="l-containers__image">
        <img src="<?php echo get_field('service-containers__image')['url']; ?>" alt="">
    </div>
</div>