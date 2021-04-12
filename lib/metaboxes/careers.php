<?php 
acf_add_local_field_group([
    'key' => 'group_vacancy_general',
    'title' => 'General settings',
    'fields' => [
        [
            'key' => 'field_vacancy_formatted_title', 
            'label' => 'Formatted title',
            'name' => 'vacancy__formatted-title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'vacancy',
            ]
        ]
    ]
]);

acf_add_local_field_group([
    'key' => 'group_careers_cards',
    'title' => 'Text blocks',
    'fields' => [
        [
            'key' => 'field_careers_cards', 
            'label' => 'Text blocks',
            'name' => 'careers-cards',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_careers_cards_card_image', 
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                ],
                [
                    'key' => 'field_careers_cards_card_title', 
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'textarea',
                    'new_lines' => 'br',
                    'rows' => 2,
                ],
                [
                    'key' => 'field_careers_cards_card_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'wrapper' => [ 'width' => '60%' ]
                ],
                [
                    'key' => 'field_careers_cards_card_reversed', 
                    'label' => 'Swap order',
                    'name' => 'reversed',
                    'type' => 'true_false',
                    'wrapper' => [ 'width' => '10%' ]
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['careers'])
]);

acf_add_local_field_group([
    'key' => 'group_careers',
    'title' => 'Vacancies',
    'fields' => [
        [
            'key' => 'field_careers_title', 
            'label' => 'Title',
            'name' => 'careers__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_careers_text', 
            'label' => 'Text',
            'name' => 'careers__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
    ],
    'location' => acf_get_template_location_array(['careers'])
]);

acf_add_local_field_group([
    'key' => 'group_careers_benefits',
    'title' => 'Benefits',
    'fields' => [
        [
            'key' => 'field_careers_benefits_image', 
            'label' => 'Image',
            'name' => 'careers-benefits__image',
            'type' => 'image',
        ],
        [
            'key' => 'field_careers_benefits_title', 
            'label' => 'Title',
            'name' => 'careers-benefits__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2,
        ],
        [
            'key' => 'field_careers_benefits_text', 
            'label' => 'Text',
            'name' => 'careers-benefits__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_careers_benefits_list', 
            'label' => 'List',
            'name' => 'careers-benefits',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_careers_benefits_list_item_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'new_lines' => 'br',
                    'rows' => 2,
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['careers'])
]);

acf_add_local_field_group([
    'key' => 'group_request_attachments',
    'title' => 'Attachments',
    'fields' => [
        [
            'key' => 'field_request_attachments_cv', 
            'label' => 'Resume / CV',
            'name' => 'request__cv',
            'type' => 'file',
        ],
        [
            'key' => 'field_request_attachments_letter', 
            'label' => 'Cover Letter',
            'name' => 'request__letter',
            'type' => 'file',
        ],
    ],
    'location' => [
        [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'application',
            ]
        ]
    ]
]);