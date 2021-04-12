<?php
acf_add_local_field_group([
    'key' => 'group_about_history',
    'title' => 'History',
    'fields' => [
        [
            'key' => 'field_about_history_bg', 
            'label' => 'Background image',
            'name' => 'about-history__bg',
            'type' => 'image',
        ],
        [
            'key' => 'field_about_history_title', 
            'label' => 'Title',
            'name' => 'about-history__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_about_history_text', 
            'label' => 'Text',
            'name' => 'about-history__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_about_history_video', 
            'label' => 'Video',
            'name' => 'about-history__video',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_about_history_video_image', 
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                ],
                [
                    'key' => 'field_about_history_video_link', 
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'text',
                ],
            ]
        ],
        [
            'key' => 'field_about_history_images', 
            'label' => 'Images',
            'name' => 'about-history__images',
            'type' => 'gallery',
        ],
    ],
    'location' => acf_get_template_location_array(['about'])
]);

acf_add_local_field_group([
    'key' => 'group_about_values',
    'title' => 'Core values',
    'fields' => [
        [
            'key' => 'field_about_values_title', 
            'label' => 'Title',
            'name' => 'about-values__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_about_values_text', 
            'label' => 'Text',
            'name' => 'about-values__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_about_values_image', 
            'label' => 'Image',
            'name' => 'about-values__image',
            'type' => 'image',
        ],
    ],
    'location' => acf_get_template_location_array(['about'])
]);

acf_add_local_field_group([
    'key' => 'group_about_community',
    'title' => 'Community involvement',
    'fields' => [
        [
            'key' => 'field_about_community_bg', 
            'label' => 'Background image',
            'name' => 'avbout-community__bg',
            'type' => 'image',
        ],
        [
            'key' => 'field_about_community_title', 
            'label' => 'Title',
            'name' => 'about-community__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_about_community_text', 
            'label' => 'Text',
            'name' => 'about-community__text',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 3,
        ],
        [
            'key' => 'field_about_community_columns', 
            'label' => 'Text columns',
            'name' => 'about-community__columns',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'key' => 'field_about_community_columns_item_title', 
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_about_community_columns_item_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['about'])
]);

acf_add_local_field_group([
    'key' => 'group_about_team',
    'title' => 'Team',
    'fields' => [
        [
            'key' => 'field_about_team_title', 
            'label' => 'Title',
            'name' => 'about-team__title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_about_team_text', 
            'label' => 'Text',
            'name' => 'about-team__text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        // [
        //     'key' => 'field_about_team', 
        //     'label' => 'Text columns',
        //     'name' => 'about-team',
        //     'type' => 'repeater',
        //     'sub_fields' => [
        //         [
        //             'key' => 'field_about_team_member_position', 
        //             'label' => 'Title',
        //             'name' => 'position',
        //             'type' => 'text',
        //         ],
        //         [
        //             'key' => 'field_about_team_member_Linkedin', 
        //             'label' => 'Title',
        //             'name' => 'Linkedin',
        //             'type' => 'text',
        //         ],
        //         [
        //             'key' => 'field_about_team_member_photo', 
        //             'label' => 'Title',
        //             'name' => 'photo',
        //             'type' => 'image',
        //         ],
        //         [
        //             'key' => 'field_about_team_member_name', 
        //             'label' => 'name',
        //             'name' => 'name',
        //             'type' => 'text',
        //         ],
        //     ]
        // ],
    ],
    'location' => acf_get_template_location_array(['about', 'contact'])
]);