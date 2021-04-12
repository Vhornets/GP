<?php
acf_add_local_field_group([
    'key' => 'group_user_company',
    'title' => 'Company',
    'fields' => [
        [
            'key' => 'field_user_company_name', 
            'label' => 'Company name',
            'name' => 'user__company_name',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_street', 
            'label' => 'Company street',
            'name' => 'user__company_street',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_building', 
            'label' => 'Company building nr.',
            'name' => 'user__company_building',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_zip', 
            'label' => 'Company zip code',
            'name' => 'user__company_zip',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_city', 
            'label' => 'Company city',
            'name' => 'user__company_city',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_country', 
            'label' => 'Company country',
            'name' => 'user__company_country',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_phone', 
            'label' => 'Company phone',
            'name' => 'user__company_phone',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_vat', 
            'label' => 'Company vat nr.',
            'name' => 'user__company_vat',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_company_chamber', 
            'label' => 'Company chamber of commerce nr.',
            'name' => 'user__company_chamber',
            'type' => 'text',
        ],
    ],
	'location' => array(
		array(
			array(
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
]);

acf_add_local_field_group([
    'key' => 'group_user',
    'title' => 'User',
    'fields' => [
        [
            'key' => 'field_user_phone', 
            'label' => 'Phone number',
            'name' => 'user__phone',
            'type' => 'text',
        ],
        [
            'key' => 'field_user_avatar', 
            'label' => 'Avatar',
            'name' => 'user__avatar',
            'type' => 'image',
        ],
    ],
	'location' => array(
		array(
			array(
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
]);