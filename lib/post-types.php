<?php
function request_init() {
    register_post_type('request', [
        'labels'            => ['menu_name' => 'Requests', 'name' => 'Request', 'singular_name' => 'Request'],
        'menu_position'     => 24,
        'public'            => false,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'editor'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-phone',
        'show_in_rest'      => true,
        'rest_base'         => 'request',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ]);
}
add_action( 'init', 'request_init' );

function team_member_init() {
    register_post_type('team-member', [
        'labels'            => ['menu_name' => 'Team', 'name' => 'Team', 'singular_name' => 'Team member'],
        'menu_position'     => 22,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'thumbnail'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-groups',
        'show_in_rest'      => true,
        'rest_base'         => 'team-member',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ]);
}
add_action( 'init', 'team_member_init' );

function product_init() {
    register_post_type('product', [
        'labels'            => ['menu_name' => 'Products', 'name' => 'Product', 'singular_name' => 'Product'],
        'menu_position'     => 20,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'editor', 'thumbnail'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-feedback',
        'show_in_rest'      => true,
        'rest_base'         => 'product',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ]);

}
add_action( 'init', 'product_init' );

function service_init() {
    register_post_type('service', [
        'labels'            => ['menu_name' => 'Services', 'name' => 'Service', 'singular_name' => 'Service'],
        'menu_position'     => 20,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'editor', 'thumbnail'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-hammer',
        'show_in_rest'      => true,
        'rest_base'         => 'service',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ]);

}
add_action( 'init', 'service_init' );

function vacancy_init() {
    register_post_type('vacancy', [
        'labels'            => ['menu_name' => 'Careers', 'name' => 'Vacancy', 'singular_name' => 'Vacancy'],
        'menu_position'     => 19,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'editor', 'thumbnail'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-universal-access',
        'show_in_rest'      => true,
        'rest_base'         => 'vacancy',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ]);
}
add_action( 'init', 'vacancy_init' );

function application_init() {
    register_post_type('application', [
        'labels'            => ['menu_name' => 'Applications', 'name' => 'Applications', 'singular_name' => 'Application'],
        'menu_position'     => 19,
        'public'            => false,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'editor'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-phone',
        'show_in_rest'      => true,
        'rest_base'         => 'application',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'show_in_menu' => 'edit.php?post_type=vacancy'
    ]);
}
add_action( 'init', 'application_init' );

function order_init() {
    register_post_type('green-order', [
        'labels'            => ['menu_name' => 'Orders', 'name' => 'Order', 'singular_name' => 'Order'],
        'menu_position'     => 3,
        'public'            => true,
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_in_nav_menus' => true,
        'supports'          => ['title', 'author'],
        'has_archive'       => true,
        'rewrite'           => true,
        'query_var'         => true,
        'menu_icon'         => 'dashicons-cart',
        'show_in_rest'      => true,
        'rest_base'         => 'request',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    ]);
}
add_action( 'init', 'order_init' );