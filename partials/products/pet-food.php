<img src="<?php echo get_field('pet-food__bg')['url']; ?>" class="s-pet-food__bg" />

<div class="l-pet-food">
    <div class="l-pet-food__head">
        <div class="o-title o-title--has-bottom-line c-pet-food__title">
            <?php the_field('product__formatted-title'); ?>
        </div>

        <img src="<?php echo get_field('pet-food__image')['sizes']['medium']; ?>" class="c-pet-food__image" />
    </div>

    <div class="l-pet-food__text">
        <div class="c-pet-food">
            <div class="c-pet-food__text">
                <?php the_content(); ?>

                <?php $button = get_field('product__button'); ?>

                <?php if($button['text']): ?>
                    <div class="c-pet-food__button">
                        <a href="<?php echo $button['url']; ?>" class="o-button-default o-button-default--green o-button-default--has-arrow">
                            <?php echo $button['text']; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
