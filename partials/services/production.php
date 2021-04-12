<img src="<?php echo get_field('pet-food__bg')['url']; ?>" class="s-pet-food__bg" />

<div class="l-pet-food">
    <div class="l-pet-food__icon">
        <?php echo file_get_contents( get_field('service__icon')['url'] ); ?>
    </div>

    <div class="l-pet-food__title">
        <div class="o-title o-title--has-bottom-line c-pet-food__title">
            <?php the_field('service__formatted-title'); ?>
        </div>
    </div>

    <div class="l-pet-food__text">
        <div class="c-pet-food">
            <div class="c-pet-food__text">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>