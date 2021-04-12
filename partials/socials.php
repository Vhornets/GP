<?php if(get_field('linkedin_link', 'options')): ?>
    <li>
        <a href="<?php the_field('linkedin_link', 'options'); ?>" target="_blank" rel="nofollow noreferrer">
            <?php echo file_get_contents( get_bloginfo('template_url') . '/assets/svg/linkedin.svg' ); ?>
        </a>
    </li>
<?php endif; ?>

<?php if(get_field('facebook_link', 'options')): ?>
    <li>
        <a href="<?php the_field('facebook_link', 'options'); ?>" target="_blank" rel="nofollow noreferrer">
            <?php echo file_get_contents( get_bloginfo('template_url') . '/assets/svg/facebook.svg' ); ?>
        </a>
    </li>
<?php endif; ?>

<?php if(get_field('twitter_link', 'options')): ?>
    <li>
        <a href="<?php the_field('twitter_link', 'options'); ?>" target="_blank" rel="nofollow noreferrer">
            <?php echo file_get_contents( get_bloginfo('template_url') . '/assets/svg/twitter.svg' ); ?>
        </a>
    </li>
<?php endif; ?>
