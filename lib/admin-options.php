<?php
function vh_setup_options_page() {
    acf_add_options_page(array(
        'page_title'    => 'General',
        'menu_title'    => 'Theme settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Contacts',
        'menu_title'    => 'Contacts',
        'menu_slug'     => 'theme-contacts-settings',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Pages',
        'menu_title'    => 'Pages',
        'menu_slug'     => 'theme-pages-settings',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_local_field_group(array (
        'key' => 'group_settings',
        'title' => 'Settings',
        'fields' => array (
            array (
                'key' => 'field_settings_logo',
                'label' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
            ),
            array (
                'key' => 'field_settings_logo_light',
                'label' => 'Logo (light version)',
                'name' => 'logo-light',
                'type' => 'image',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ),
            ),
        ),
    ));

    // КОНТАКТЫ
    acf_add_local_field_group(array (
        'key' => 'group_settings_contacts',
        'title' => 'Contacts and social networks',
        'fields' => array (
            array (
                'key' => 'field_settings_twitter',
                'label' => 'Twitter',
                'name' => 'twitter_link',
                'type' => 'text',
            ),
            array (
                'key' => 'field_settings_facebook',
                'label' => 'Facebook',
                'name' => 'facebook_link',
                'type' => 'text',
            ),
            array (
                'key' => 'field_settings_linkedin',
                'label' => 'linkedin',
                'name' => 'linkedin_link',
                'type' => 'text',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-contacts-settings',
                ),
            ),
        ),
    ));

    acf_add_local_field_group(array (
        'key' => 'group_pages_settings',
        'title' => 'Pages settings',
        'fields' => array (
            array (
                'key' => 'field_settings_page_vacancies',
                'label' => 'Careers page',
                'name' => 'page-vacancies',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_login',
                'label' => 'Sign in page',
                'name' => 'page-login',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_register',
                'label' => 'Sign up page',
                'name' => 'page-register',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_password_reset',
                'label' => 'Password reset page',
                'name' => 'page-password-reset',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_account',
                'label' => 'Account page',
                'name' => 'page-account',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_account_edit',
                'label' => 'Account edit page',
                'name' => 'page-account-edit',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_order_status',
                'label' => 'Order status page',
                'name' => 'page-order-status',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
            array (
                'key' => 'field_settings_page_invoices',
                'label' => 'Invoices page',
                'name' => 'page-invoices',
                'type' => 'select',
                'choices' => vh_get_all_pages(),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-pages-settings',
                ),
            ),
        ),
    ));
}

add_action('wp_loaded', 'vh_setup_options_page');