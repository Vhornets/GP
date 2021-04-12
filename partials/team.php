<section class="s-team">
    <?php $team = get_posts(['post_type' => 'team-member', 'posts_per_page' => -1]); ?>

    <div class="l-team text-center">
        <div class="l-team__head">
            <div class="o-title o-title--smaller o-title--has-bottom-line o-title--inline s-team__title">
                <?php the_field('about-team__title'); ?>
            </div>

            <div class="s-team__text">
                <?php the_field('about-team__text'); ?>
            </div>
        </div>

        <div class="l-team-members">
            <?php foreach($team as $post): setup_postdata($post); ?>
                <div class="l-team-members__item">
                    <a href="<?php the_field('team-member__linkedin'); ?>" class="c-card-person" target="_blank" rel="nofollow">
                        <img src="<?php echo get_thumbnail_src('medium'); ?>" alt="" class="c-card-person__image">

                        <p class="c-card-person__name">
                            <?php the_title(); ?>
                        </p>

                        <p class="c-card-person__position">
                            <?php the_field('team-member__position'); ?>
                        </p>

                        <div class="c-card-person__socials">
                            <?php echo file_get_contents( get_bloginfo('template_url') . '/assets/svg/linkedin.svg' ); ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; wp_reset_postdata(); ?>
        </div>            
    </div>
</section>