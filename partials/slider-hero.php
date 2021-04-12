<div class="c-slider-hero">
    <?php foreach(get_field('header-slider') as $slide): ?>
        <div class="c-slider-hero__slide">
            <div class="c-slider-hero-slide" style="background-image: url('<?php echo $slide['image']['url']; ?>');">
                <div class="c-slider-hero-slide__container">
                    <div class="c-slider-hero-slide__content">
                        <?php if($slide['title']): ?>
                            <div class="c-slider-hero-slide__title">
                                <?php echo $slide['title']; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($slide['button-text']): ?>
                            <a href="<?php echo $slide['button-link']; ?>" class="o-button-default o-button-default--has-arrow">
                                <?php echo $slide['button-text']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="c-slider-hero__scroll">
    <i class="icon svg-scroll svg-scroll-dims"></i>
</div>