<div class="l-quality-insurance">
    <div class="l-quality-insurance__icon">
        <img src="<?php echo get_field('service__icon')['url']; ?>" alt="">
    </div>

    <div class="l-quality-insurance__text">
        <div class="o-title o-title--smaller o-title--has-bottom-line s-quality-insurance__title">
            <?php the_field('service__formatted-title'); ?>
        </div>

        <div class="s-quality-insurance__text">
            <?php the_content(); ?>
        </div>
    </div>
</div>