<?php
acf_add_local_field_group([
    'key' => 'group_page_account',
    'title' => 'Page settings',
    'fields' => [
        [
            'key' => 'field_page_account_bg', 
            'label' => 'Background image',
            'name' => 'page-account__bg',
            'type' => 'image',
        ],
    ],
    'location' => acf_get_template_location_array(['account-edit', 'account-invoices', 'account-login', 'account-orders', 'account-password-reset', 'account-register', 'account-settings'])
]);