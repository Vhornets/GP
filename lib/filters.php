<?php
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyC5jtelIafbf3u7eWfxHxvR-XaaTvr8V34';

    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

add_filter('wp_mail_content_type', 'mail_content_type_custom');
function mail_content_type_custom() { return 'text/html'; }

if(ENV == 'development' || ENV == 'test' || ENV == 'production') {
    add_filter('show_admin_bar', '__return_false');
}

function posts_link_attributes() {
    return 'class="o-button-bordered js-load-next-posts-page"';
}
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function add_body_class($classes) {
    if(wp_is_mobile()) {
        $classes = array_merge( $classes, ['is-mobile'] );
    }

    return $classes;
}
add_filter('body_class', 'add_body_class');

function add_async_for_enqueue($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url)."' async='async"; 
}
add_filter('clean_url', 'add_async_for_enqueue', 11, 1);

add_filter( 'manage_green-order_posts_columns', 'vh_filter_posts_columns' );
function vh_filter_posts_columns( $columns ) {
    $columns = [
        'cb' => $columns['cb'],
        'order-number' => '<strong>Order number</strong>',
        'title' => 'Title',
        'author' => 'Author',
        'date' => 'Date'
    ];
    
    return $columns;
}

// add_filter('login_redirect', 'admin_default_page', 10, 3);
// function admin_default_page() {
//     return get_the_permalink( get_field('page-order-status', 'options') );
// }
  