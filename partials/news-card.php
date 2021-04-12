<img src="<?php echo get_thumbnail_src('large'); ?>" class="c-card__image" />

<div class="c-card__date">
    <?php echo get_the_date( 'd F Y' ); ?>
</div>

<div class="c-card__title">
    <?php the_title(); ?>
</div>

<div class="c-card__more">
    <?php pll_e('Learn more'); ?>
</div>
