<div class="l-product">
    <div class="l-product__text">
        <div class="o-title o-title--has-bottom-line">
            <?php the_field('product__formatted-title'); ?>
        </div>

        <?php the_content(); ?>

        <?php $button = get_field('product__button'); ?>

        <?php if($button['text']): ?>
            <br>
            <a href="<?php echo $button['url']; ?>" class="o-button-default o-button-default--green o-button-default--has-arrow">
                <?php echo $button['text']; ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="l-product__image">
        <img src="<?php echo get_field('product__image')['sizes']['large']; ?>" />
    </div>
</div>