<div class="l-logistics">
    <div class="l-logistics__content">
        <div class="l-logistics__icon">
            <img src="<?php echo get_field('service__icon')['url']; ?>" alt="">
        </div>

        <div class="l-logistics__text">
            <div class="o-title o-title--has-bottom-line s-logistics__title">
                <?php the_field('service__formatted-title'); ?>
            </div>
        </div>

        <?php foreach(get_field('service-logistics__blocks') as $textBlock): ?>
            <div class="l-logistics__icon">
                <?php if($textBlock['icon']): ?>
                    <img src="<?php echo $textBlock['icon']['url']; ?>" alt="">
                <?php endif; ?>
            </div>

            <div class="l-logistics__text">
                <div class="s-logistics__text">
                    <?php echo $textBlock['text']; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php $button = get_field('service__button'); ?>

        <?php if($button['text']): ?>
            <div class="l-logistics__icon"></div>

            <div class="l-logistics__text">
                <a href="<?php echo $button['url']; ?>" class="o-button-default o-button-default--green o-button-default--has-arrow">
                    <?php echo $button['text']; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="l-logistics__image">
        <img src="<?php echo get_field('service-logistics__image')['url']; ?>" alt="">
    </div>
</div>