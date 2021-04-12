<div class="l-container text-center">
    <img src="<?php echo get_field('service__icon')['url']; ?>" alt="" class="s-marketing__icon">

    <div class="o-title o-title--smaller o-title--has-bottom-line o-title--inline s-values__title">
        <?php the_field('service__formatted-title'); ?>
    </div>

    <div class="s-marketing__text">
        <?php the_content(); ?>
    </div>
</div>

<?php $regions = get_field('worldmap__regions'); ?>

<?php if($regions): ?>
    <style type="text/css">
        <?php foreach($regions as $region): ?>
            #<?php echo $region['region']; ?>.is-active path {
                fill: <?php echo $region['color']; ?>;
            }
        <?php endforeach; ?>
    </style>

    <div class="l-container">
        <div class="c-worldmap__mobile">
            <?php the_field('worldmap__regions-text'); ?>
        </div>
        
        <div class="c-worldmap">
            <?php echo file_get_contents( get_bloginfo('template_url') . '/img/worldmap.svg' ); ?>

            <?php foreach($regions as $region): if($region['text']): ?>
                <div class="c-worldmap__popup" data-region="<?php echo $region['region']; ?>">
                    <?php echo $region['text']; ?>
                </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
<?php endif; ?>