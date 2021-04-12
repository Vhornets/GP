<?php
acf_add_local_field_group([
    'key' => 'group_header_slider',
    'title' => 'Header slider',
    'fields' => [
        [
            'key' => 'field_header_slider', 
            'label' => 'Slides',
            'name' => 'header-slider',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_header_slider_item_image', 
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                ],
                [
                    'key' => 'field_header_slider_item_title', 
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'textarea',
                    'new_lines' => 'br',
                    'rows' => 3,
                ],
                [
                    'key' => 'field_header_slider_item_button_text', 
                    'label' => 'Button text',
                    'name' => 'button-text',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_header_slider_item_button_link', 
                    'label' => 'Button link',
                    'name' => 'button-link',
                    'type' => 'text',
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['home', 'about', 'products', 'what-we-do', 'careers'])
]);

acf_add_local_field_group([
    'key' => 'group_home_about',
    'title' => 'About',
    'fields' => [
        [
            'key' => 'field_home_about_title', 
            'label' => 'Title',
            'name' => 'home-about__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_home_about_text', 
            'label' => 'Text',
            'name' => 'home-about__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_home_about_image', 
            'label' => 'Image',
            'name' => 'home-about__image',
            'type' => 'image',
        ],
    ],
    'location' => acf_get_template_location_array(['home', 'about'])
]);

acf_add_local_field_group([
    'key' => 'group_home_services',
    'title' => 'What we do',
    'fields' => [
        [
            'key' => 'field_home_services_bg', 
            'label' => 'Background image',
            'name' => 'home-services__bg',
            'type' => 'image',
        ],
        [
            'key' => 'field_home_services_title', 
            'label' => 'Title',
            'name' => 'home-services__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_home_services_text', 
            'label' => 'Text',
            'name' => 'home-services__text',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 4,
        ],
        [
            'key' => 'field_home_services_services_page', 
            'label' => 'Services page',
            'name' => 'home-services__services-page',
            'type' => 'post_object',
            'post_type' => ['page'],
            'multiple' => 0,
            'return_format' => 'post_id',
        ],
    ],
    'location' => acf_get_template_location_array('home')
]);

acf_add_local_field_group([
    'key' => 'group_home_products',
    'title' => 'Products',
    'fields' => [
        [
            'key' => 'field_home_products_icon', 
            'label' => 'Icon',
            'name' => 'home-products__icon',
            'type' => 'image',
        ],
        [
            'key' => 'field_home_products_title', 
            'label' => 'Title',
            'name' => 'home-products__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_home_featured_products_page', 
            'label' => 'Products page',
            'name' => 'home-products__products-page',
            'type' => 'post_object',
            'post_type' => ['page'],
            'multiple' => 0,
            'return_format' => 'post_id',
        ],
        [
            'key' => 'field_home_featured_products', 
            'label' => 'Featured products',
            'name' => 'home-products__featured',
            'type' => 'post_object',
            'post_type' => ['product'],
            'multiple' => 1,
            'return_format' => 'object',
        ],
    ],
    'location' => acf_get_template_location_array('home')
]);

acf_add_local_field_group([
    'key' => 'group_home_news',
    'title' => 'News',
    'fields' => [
        [
            'key' => 'field_home_news_bg', 
            'label' => 'Background image',
            'name' => 'home-news__bg',
            'type' => 'image',
        ],
        [
            'key' => 'field_home_news_title', 
            'label' => 'Title',
            'name' => 'home-news__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
    ],
    'location' => acf_get_template_location_array('home')
]);

acf_add_local_field_group([
    'key' => 'group_contact',
    'title' => 'Contact',
    'fields' => [
        [
            'key' => 'field_contact_bg', 
            'label' => 'Background image',
            'name' => 'contact__bg',
            'type' => 'image',
        ],
        [
            'key' => 'field_contact_title', 
            'label' => 'Title',
            'name' => 'contact__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_contact_address', 
            'label' => 'Address',
            'name' => 'contact__address',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_contact_emails', 
            'label' => 'Email addresses',
            'name' => 'contact__emails',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_contact_emails_item', 
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => 'text',
                ],
            ]
        ],
        [
            'key' => 'field_contact_phones', 
            'label' => 'Phone numbers',
            'name' => 'contact__phones',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_contact_phones_item', 
                    'label' => 'Phone',
                    'name' => 'phone',
                    'type' => 'text',
                ],
            ]
        ],
        [
            'key' => 'field_contact_departments', 
            'label' => 'Departments',
            'name' => 'contact__departments',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_contact_departments_item', 
                    'label' => 'Department',
                    'name' => 'department',
                    'type' => 'text',
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array('home')
]);