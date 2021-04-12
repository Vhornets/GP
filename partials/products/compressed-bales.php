<div class="l-compressed-bales">
    <div class="l-compressed-bales__text">
        <div class="o-title o-title--smaller o-title--has-bottom-line">
            <?php the_field('product__formatted-title'); ?>
        </div>

        <div class="s-compressed-bales__text">
            <?php the_content(); ?>
        </div>

        <div class="c-compressed-bales__popups">
            <div class="c-compressed-bales__close">&times;</div>

            <?php foreach(get_field('compressed-bales__popups') as $num => $popup): ?>
                <div class="c-compressed-bales__popup" data-index="<?php echo $num; ?>">
                    <div class="o-title o-title--has-bottom-line c-compressed-bales__popup-title">
                        <?php echo $popup['title']; ?>
                    </div>

                    <div class="c-compressed-bales__popup-text">
                        <?php echo $popup['text']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="l-compressed-bales__images">
        <?php $images = get_field('compressed-bales__images'); ?>

        <?php if($images) foreach($images as $img): ?>
            <img src="<?php echo $img['sizes']['large']; ?>">
        <?php endforeach; ?>

        <p class="c-compressed-bales__description">
            <?php pll_e('Click on any product below to show the information about it'); ?>:
        </p>

        <div class="c-compressed-bales">
            <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/all.jpg" alt="">

            <div class="c-compressed-bales__items">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/press0.jpg" data-index="0">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/press1.jpg" data-index="1">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/press2.jpg" data-index="2">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/press3.jpg" data-index="3">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/food1.jpg" data-index="4">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/food2.jpg" data-index="5">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/food3.jpg" data-index="6">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/bale1.jpg" data-index="7">
                <img src="<?php bloginfo('template_url'); ?>/img/compressed-bale/bale2.jpg" data-index="8">

                <div class="c-compressed-bales__dummy" data-index="8"></div>
                <div class="c-compressed-bales__dummy" data-index="7"></div>
                <div class="c-compressed-bales__dummy" data-index="0"></div>
                <div class="c-compressed-bales__dummy" data-index="1"></div>
                <div class="c-compressed-bales__dummy" data-index="2"></div>
                <div class="c-compressed-bales__dummy" data-index="3"></div>
                <div class="c-compressed-bales__dummy" data-index="6"></div>
                <div class="c-compressed-bales__dummy" data-index="5"></div>
                <div class="c-compressed-bales__dummy" data-index="4"></div>
            </div>
        </div>
    </div>
</div>