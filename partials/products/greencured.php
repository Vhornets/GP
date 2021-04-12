<div class="l-container text-center">
    <div class="s-greencured__text">
        <div class="o-title o-title--inline o-title--has-bottom-line">
            <?php the_field('product__formatted-title'); ?>
        </div>

        <?php the_content(); ?>

        <?php $button = get_field('product__button'); ?>

        <?php if($button['text'] && get_field('greencured__button-placement') == 'before-image'): ?>
            <a href="<?php echo $button['url']; ?>" class="o-button-default o-button-default--green o-button-default--has-arrow">
                <?php echo $button['text']; ?>
            </a>
        <?php endif; ?>
    </div>
</div>

<?php if(get_field('greencured__image-text')[0]['text'] != ''): ?>
    <div class="l-container">
        <div class="c-greencured__process">
            <?php echo file_get_contents( get_bloginfo('template_url') . '/img/prod.process-no-text.svg' ); ?>

            <div class="c-greencured__bubble">
                <?php the_field('greencured__image-bubble-text'); ?>
            </div>
            
            <div class="c-greencured__text">
                <?php foreach(get_field('greencured__image-text') as $textBlock): ?>
                    <div class="c-greencured__text-block">
                        <?php echo strip_tags($textBlock['text']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="l-container text-center">
    <div class="s-greencured__text">
        <?php the_field('greencured__bottom_text'); ?>
    </div>

    <?php if($button['text'] && get_field('greencured__button-placement') == 'after-image'): ?>
        <a href="<?php echo $button['url']; ?>" class="o-button-default o-button-default--green o-button-default--has-arrow">
            <?php echo $button['text']; ?>
        </a>
    <?php endif; ?>
</div>
