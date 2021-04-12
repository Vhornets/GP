<?php
acf_add_local_field_group([
    'key' => 'group_service_general',
    'title' => 'General settings',
    'fields' => [
        [
            'key' => 'field_service_formatted_title', 
            'label' => 'Formatted title',
            'name' => 'service__formatted-title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_service_icon', 
            'label' => 'Icon',
            'name' => 'service__icon',
            'type' => 'image',
        ],
        [
            'key' => 'field_service_short_description', 
            'label' => 'Short description',
            'name' => 'service__short-description',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_service_button', 
            'label' => 'Button',
            'name' => 'service__button',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_service_button_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_service_button_url', 
                    'label' => 'url',
                    'name' => 'url',
                    'type' => 'text',
                ],
            ]
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'service',
            ]
        ]
    ]
]);

acf_add_local_field_group([
    'key' => 'group_service',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_service_generic_image', 
            'label' => 'Image',
            'name' => 'service__image',
            'type' => 'image',
        ],
        [
            'key' => 'field_service_reversed', 
            'label' => 'Swap order ("image first and then text" instead of "text frist and then image")',
            'name' => 'service__reversed',
            'type' => 'true_false',
        ],
    ],
    'location' => acf_get_template_location_array(['service'])
]);

acf_add_local_field_group([
    'key' => 'group_service_logistics',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_service_image', 
            'label' => 'Image',
            'name' => 'service-logistics__image',
            'type' => 'image',
        ],
        [
            'key' => 'field_service_logistics_blocks', 
            'label' => 'Text blocks',
            'name' => 'service-logistics__blocks',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_service_logistics_blocks_item_icon', 
                    'label' => 'Icon',
                    'name' => 'icon',
                    'type' => 'image',
                    'wrapper' => ['width' => '15']
                ],
                [
                    'key' => 'field_service_logistics_blocks_item_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['service-logistics'])
]);

acf_add_local_field_group([
    'key' => 'group_service_plants',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_service_plants_image', 
            'label' => 'Image',
            'name' => 'service-plants__image',
            'type' => 'image',
        ],
        [
            'key' => 'field_service_plants_subtitle', 
            'label' => 'Subtitle',
            'name' => 'service-plants__subtitle',
            'type' => 'text',
        ],
        [
            'key' => 'field_service_plants_text', 
            'label' => 'Text',
            'name' => 'service-plants__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
    ],
    'location' => acf_get_template_location_array(['service-plants'])
]);

acf_add_local_field_group([
    'key' => 'group_service_containers',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_service_containers_image', 
            'label' => 'Image',
            'name' => 'service-containers__image',
            'type' => 'image',
        ],
    ],
    'location' => acf_get_template_location_array(['service-containers'])
]);

acf_add_local_field_group([
    'key' => 'group_service_marketing',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_service_marketing_text_mobile', 
            'label' => 'Text for mobile devices',
            'name' => 'worldmap__regions-text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_service_marketing_regions', 
            'label' => 'Regions',
            'name' => 'worldmap__regions',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_service_marketing_region', 
                    'label' => 'Region',
                    'name' => 'region',
                    'type' => 'select',
                    'wrapper' => [ 'width' => '40%' ],
                    'choices' => [
                        'Canada'  => 'Canada',
                        'USA'  => 'USA',
                        'Mexico'  => 'Mexico',
                        'South_America'  => 'South America',
                        'Africa'  => 'Africa',
                        'Europe'  => 'Europe',
                        'China'  => 'China',
                        'Hong_Kong'  => 'Hong Kong',
                        'Indonesia'  => 'Indonesia',
                        'Japan'  => 'Japan',
                        'Korea' => 'Korea',
                        'Malaysia' => 'Malaysia',
                        'Thailand' => 'Thailand',
                        'Rest_of_Asia' => 'Rest of Asia',
                        'Middle_East' => 'Middle East',
                        'Australia' => 'Australia',
                        'Layer_1' => 'Cambodia and New Zealand',
                    ]
                ],
                [
                    'key' => 'field_service_marketing_region_color', 
                    'label' => 'Color',
                    'name' => 'color',
                    'type' => 'color_picker',
                    'wrapper' => [ 'width' => '10%' ],
                ],
                [
                    'key' => 'field_service_marketing_region_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'rows' => 6,
                    'new_lines' => 'br',
                    'wrapper' => [ 'width' => '50%' ]
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['service-marketing'])
]);