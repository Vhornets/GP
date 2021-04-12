<?php
add_filter('acf/init', 'init_metaboxes');

function init_metaboxes() {
    $template_url = get_bloginfo('template_url');
    $templates = 'templates/';

    foreach (glob(__DIR__ . "/metaboxes/*.php") as $filename) {
        include $filename;
    }
}

function acf_get_template_location_array($templateNames) {
    if(!is_array($templateNames)) {
        return array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => "templates/$templateNames.php",
                ),
            ),
        );
    }

    $res = array();

    foreach($templateNames as $name) {
        $res[][] = array(
            'param' => 'page_template',
            'operator' => '==',
            'value' => "templates/$name.php",
        );
    }

    return $res;
}

function vh_get_all_pages() {
    $res = array();
    $pages = get_posts(array(
        'post_type' => 'page',
        'post_parent' => 0,
        'posts_per_page' => -1
    ));

    foreach($pages as $page) {
        $res[$page->ID] = $page->post_title;
    }

    return $res;
}
