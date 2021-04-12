<?php
acf_add_local_field_group([
    'key' => 'group_product_general',
    'title' => 'General settings',
    'fields' => [
        [
            'key' => 'field_product_formatted_title', 
            'label' => 'Formatted title',
            'name' => 'product__formatted-title',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 2
        ],
        [
            'key' => 'field_product_button', 
            'label' => 'Button',
            'name' => 'product__button',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_product_button_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'text',
                ],
                [
                    'key' => 'field_product_button_url', 
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
                'value' => 'product',
            ]
        ]
    ]
]);

acf_add_local_field_group([
    'key' => 'group_product',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_product_image', 
            'label' => 'Image',
            'name' => 'product__image',
            'type' => 'image',
        ],
        [
            'key' => 'field_product_reversed', 
            'label' => 'Swap order ("image first and then text" instead of "text frist and then image")',
            'name' => 'product__reversed',
            'type' => 'true_false',
        ],
    ],
    'location' => acf_get_template_location_array(['product'])
]);

acf_add_local_field_group([
    'key' => 'group_greencured',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_greencured_bottom_text', 
            'label' => 'Bottom text',
            'name' => 'greencured__bottom_text',
            'type' => 'wysiwyg',
            'toolbar' => 'basic',
            'media_upload' => 0,
        ],
        [
            'key' => 'field_greencured_button_placement', 
            'label' => 'Button palcement',
            'name' => 'greencured__button-placement',
            'type' => 'select',
            'choices' => [
                'before-image' => 'Before the image',
                'after-image' => 'After the image'
            ]
        ],
        [
            'key' => 'field_greencured_image_bubble_text', 
            'label' => 'Top text on the image (located where the bubble/cloud thingy is)',
            'name' => 'greencured__image-bubble-text',
            'type' => 'textarea',
            'new_lines' => 'br',
            'rows' => 3,
        ],
        [
            'key' => 'field_greencured_image_text', 
            'label' => 'Text blocks on the image',
            'name' => 'greencured__image-text',
            'type' => 'repeater',
            'min' => 5,
            'max' => 5,
            'sub_fields' => [
                [
                    'key' => 'field_greencured_image_text_item_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'textarea',
                    'new_lines' => 'br',
                    'rows' => 3,
                ],
            ]
        ],
    ],
    'location' => acf_get_template_location_array(['product-greencured'])
]);

acf_add_local_field_group([
    'key' => 'group_compressed_bales',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_compressed_bales_images', 
            'label' => 'Images',
            'name' => 'compressed-bales__images',
            'type' => 'gallery',
        ],
        [
            'key' => 'field_compressed_bales_popups', 
            'label' => 'Popups',
            'name' => 'compressed-bales__popups',
            'type' => 'repeater',
            'instructions' => '1 - jumbo press 60kg bale, 2 - jumbo press 40kg bale, 3 - jumbo press 30kg bale,<br> 4 - pet food 2402 bag, 5 pet food 4802 bag, 6 pet food 9602 bag, <br>7 - jumbo bales (right bale), 8 - jumbo bales (left bale)',
            'sub_fields' => [
                [
                    'key' => 'field_compressed_bales_popup_title', 
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'textarea',
                    'new_lines' => 'br',
                    'rows' => 2
                ],
                [
                    'key' => 'field_compressed_bales_popup_text', 
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'wysiwyg',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'wrapper' => [ 'width' => '70%' ]
                ],
            ]
        ]
    ],
    'location' => acf_get_template_location_array(['product-compressed-bales'])
]);

acf_add_local_field_group([
    'key' => 'group_pet_food',
    'title' => 'Template settings',
    'fields' => [
        [
            'key' => 'field_pet_food_bg', 
            'label' => 'Background image',
            'name' => 'pet-food__bg',
            'type' => 'image',
        ],
        [
            'key' => 'field_pet_food_image', 
            'label' => 'Image',
            'name' => 'pet-food__image',
            'type' => 'image',
        ],
    ],
    'location' => acf_get_template_location_array(['product-pet-food', 'service-production'])
]);