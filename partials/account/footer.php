<div class="c-footer-account">
    <div class="c-footer-account__logo">
        <?php echo file_get_contents( get_field('logo-light', 'options')['url'] ); ?>
    </div>
    
    <?php get_template_part('partials/contacts-list'); ?>

    <a href="/" class="c-footer-account__link">
        www.greenprairie.com
    </a>
</div>