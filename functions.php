<?php
if (file_exists(dirname(__FILE__) . '/lib/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/lib/vendor/autoload.php';
}

require_once 'lib/language-strings.php';
require_once 'lib/metaboxes.php';
require_once 'lib/admin-options.php';
require_once 'lib/widgets.php';
require_once 'lib/utils.php';
require_once 'lib/filters.php';
require_once 'lib/actions.php';
require_once 'lib/post-types.php';
require_once 'lib/shortcodes.php';

add_theme_support('post-thumbnails');

register_nav_menus(array(
    'main-menu'           => 'Main menu',
    'footer-menu'         => 'Footer menu',
));

register_sidebar(array(
	'name' => 'Main sidebar',
	'id' => 'sidebar-main',
	'description' => 'Sidebar'
));
