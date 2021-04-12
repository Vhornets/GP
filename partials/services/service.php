<div class="l-infocard">
    <div class="l-infocard__icon">
        <img src="<?php echo get_field('service__icon')['url']; ?>" alt="">
    </div>

    <div class="l-infocard__text">
        <div class="o-title o-title--smaller o-title--has-bottom-line s-infocard__title">
            <?php the_field('service__formatted-title'); ?>
        </div>

        <div class="s-infocard__text">
            <?php the_content(); ?>
        </div>

        <?php $button = get_field('service__button'); ?>

        <?php if($button['text']): ?>
            <div class="s-infocard__button">
                <a href="<?php echo $button['url']; ?>" class="o-button-default o-button-default--has-arrow">
                    <?php echo $button['text']; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

<img src="<?php echo get_field('service__image')['url']; ?>" alt="" class="s-infocard__image">