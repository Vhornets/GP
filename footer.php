<div class="c-footer">
    <div class="l-footer">
        <div class="l-footer__logo">
            <a href="<?php echo pll_home_url(); ?>" class="c-footer__logo">
                <?php echo file_get_contents( get_field('logo', 'options')['url'] ); ?>
            </a>
        </div>

        <div class="l-footer__menu">
            <?php wp_nav_menu(array(
                'menu' => 'footer-menu',
                'theme_location' => 'footer-menu',
                'menu_class' => 'c-main-menu c-main-menu--footer',
                'container' => false,
            )); ?>
        </div>

        <div class="l-footer__copyright">
            <div class="c-footer__copyright">
                Green Prairie International Inc © <?php echo date('Y'); ?>. Design by <a href="https://giraffes4zebras.com" target="_blank" rel="nofollow">Giraffes4Zebras</a> 
            </div>
        </div>
    </div>
</div>

<div class="remodal c-modal" data-remodal-id="modal-message" data-remodal-options="hashTracking: false">
    <button data-remodal-action="close" class="remodal-close"></button>
    
    <div class="c-modal__content"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>
