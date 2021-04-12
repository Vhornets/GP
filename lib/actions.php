<?php
function vh_theme_assets() {
    wp_register_style( 'vh-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i&display=swap&subset=latin-ext' );
    wp_enqueue_style( 'vh-styles', get_template_directory_uri() . '/dist/css/app.css', array('vh-google-fonts'), '0.0.1' );

    if(ENV === "development") {
        wp_enqueue_script( 'vh-scripts', get_template_directory_uri() . '/dist/js/bundle.js', array(), '0.0.1', true );
    }

    else {
        wp_enqueue_script( 'vh-scripts', get_template_directory_uri() . '/dist/js/bundle.min.js', array(), '0.0.1', true );
    }
}
add_action( 'wp_enqueue_scripts', 'vh_theme_assets' );

function disable_wp_emojicons() {
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
    add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
       return array();
    }
}

function sendRequest() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'send_request') ) {
       die('Wrong nonce.');
    }

    $name = get_post_var('name');
    $email = get_post_var('email');
    $subject = get_post_var('subject');
    $department = get_post_var('department');
    $message = get_post_var('message');

    $request_body = "Name: $name <br> Email: $email <br> Subject: $subject <br> Department: $department <br> Message: $message";

    $request = wp_insert_post(array(
        'post_title'   => $name,
        'post_content'   => $request_body,
        'post_type'    => 'request',
    ));

    if($request) {
        pll_e('Thank you! <br> We will contact you as soon as possible.');

        $request_link = get_edit_post_link($request);

        sendmail('New request', "<a href='$request_link'>$request_link</a><br>" . $request_body);
        sendmail(get_bloginfo('name'), pll__('Thank you for your message, we have received it successfully. We will come back to you soon.'), $email);
    }

    else {
         pll_e('An error occured. <br> Please, try later.');
    }

    die();
}
add_action('wp_ajax_sendRequest', 'sendRequest');
add_action('wp_ajax_nopriv_sendRequest', 'sendRequest');

function sendApplication() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'send_application') ) {
       die('Wrong nonce.');
    }

    $firstName = get_post_var('firstName');
    $lastName = get_post_var('lastName');
    $email = get_post_var('email');
    $phone = get_post_var('phone');
    $linkedin = get_post_var('linkedin');
    $fileCvId = get_post_var('file_cv_id');
    $fileLetterId = get_post_var('file_letter_id');
    $vacancyId = get_post_var('vacancy_id');
    $vacancy = get_post($vacancyId);

    $request_body = "Vacancy: <a href='" . get_the_permalink($vacancyId) . "'>{$vacancy->post_name}</a> <br> First name: $firstName <br> Last name: $lastName <br> Email: $email <br> Phone: $phone <br> Linkedin: $linkedin";

    $request = wp_insert_post(array(
        'post_title'   => "$firstName $lastName",
        'post_content'   => $request_body,
        'post_type'    => 'application',
    ));

    if($request) {
        pll_e('Thank you! <br> We will contact you as soon as possible.');

        $request_link = get_edit_post_link($request);

        update_field('request__cv', $fileCvId, $request);
        update_field('request__letter', $fileLetterId, $request);

        sendmail('New job application', "<a href='$request_link'>$request_link</a><br>" . $request_body);
        // sendmail(get_bloginfo('name'), pll__('Thank you for your message, we have received it successfully. We will come back to you soon.'));
    }

    else {
         pll_e('An error occured. <br> Please, try later.');
    }

    die();
}
add_action('wp_ajax_sendApplication', 'sendApplication');
add_action('wp_ajax_nopriv_sendApplication', 'sendApplication');

function show_all_projects_in_archive( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( is_tax('project-category') || is_post_type_archive('project') ) {
            $query->set( 'posts_per_page', -1 );
        }
    }
}
add_action( 'pre_get_posts', 'show_all_projects_in_archive' );

add_action('init', 'create_team');
function create_team() {
    set_time_limit(0);

    if(isset($_GET['create-team']) && $_GET['create-team'] === 'true') {
        $team = get_field('about-team', 30);

        foreach($team as $member) {
            $memberPost = wp_insert_post(array(
                'post_title'   => $member['name'],
                'post_type'    => 'team-member',
            ));

            update_field('team-member__position', $member['position'], $memberPost);
            update_field('team-member__linkedin', $member['Linkedin'], $memberPost);

            set_post_thumbnail($memberPost, $member['photo']['id']);
        }
    }
}

function uploadFile() {
    if ( !function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }

    $movefile = upload_attachment($_FILES['file']);

    if ($movefile) {
        echo $movefile;
    }

    else {
        echo 0;
    }

    die();
}
add_action('wp_ajax_uploadFile', 'uploadFile');
add_action('wp_ajax_nopriv_uploadFile', 'uploadFile');

add_action('wp_ajax_userResetPassword', 'userResetPassword');
add_action('wp_ajax_nopriv_userResetPassword', 'userResetPassword');
function userResetPassword() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'user_reset_password') ) {
        die('Wrong nonce.');
    }

    $errors = vh_retrieve_password();

    if ( is_wp_error($errors) ) {
        echo $errors->get_error_codes();
    } 
    
    else {
        echo "The password reset link has been successfully sent to your e-mail.";
    }


    die();
}

add_action('wp_ajax_userLogin', 'userLogin');
add_action('wp_ajax_nopriv_userLogin', 'userLogin');
function userLogin() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'user_log_in') ) {
        die('Wrong nonce.');
    }

    $user = wp_signon([
        'user_login' => get_post_var('log'),
        'user_password' => get_post_var('pwd'),
        'remember' => true
    ], false);

    if ( is_wp_error($user) ) {
        echo $user->get_error_message();
    }

    else {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);

        echo get_the_permalink( get_field('page-order-status', 'options') );
    }

    die();
}

add_action('wp_ajax_userRegister', 'userRegister');
add_action('wp_ajax_nopriv_userRegister', 'userRegister');
function userRegister() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'user_register') ) {
        die('Wrong nonce.');
    }

    $user_login = get_post_var('log');
    $user_pass = get_post_var('pwd');
    $first_name = get_post_var('first_name');
    $last_name = get_post_var('last_name');
    $phone = get_post_var('phone');

    $company = [
        'company_name' => get_post_var('company_name'),
        'company_street' => get_post_var('company_street'),
        'company_building' => get_post_var('company_building'),
        'company_zip' => get_post_var('company_zip'),
        'company_city' => get_post_var('company_city'),
        'company_country' => get_post_var('company_country'),
        'company_phone' => get_post_var('company_phone'),
        'company_vat' => get_post_var('company_vat'),
        'company_chamber' => get_post_var('company_chamber')
    ];

    $userdata = [
        'user_login'  =>  "user_" . time(),
        'user_email'  =>  $user_login,
        'user_pass'   =>  $user_pass,
        'role'        => 'client',
        'first_name'  => $first_name,
        'last_name'   => $last_name
    ];

    $user_id = wp_insert_user($userdata);

    if ( is_wp_error($user_id) ) {
        echo $user->get_error_message();
    }

    else {
        update_field("user__phone", $phone, 'user_'.$user_id);
        update_user_meta($user_id, 'wp_2fa_nominated_email_address', $user_login);
        update_user_meta($user_id, 'wp_2fa_enabled_methods', 'email');

        foreach($company as $key => $value) {
            update_field("user__$key", $value, 'user_'.$user_id);
        }

        wp_signon([
            'user_login' => $user_login,
            'user_password' => $user_pass,
            'remember' => true
        ]);

        the_permalink( get_field('page-account', 'options') );
    }

    die();
}

add_action('wp_ajax_userEdit', 'userEdit');
add_action('wp_ajax_nopriv_userEdit', 'userEdit');
function userEdit() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'user_edit') ) {
        die('Wrong nonce.');
    }

    $user_id = get_current_user_id();
    $user_login = get_post_var('log');
    $first_name = get_post_var('first_name');
    $last_name = get_post_var('last_name');
    $phone = get_post_var('phone');

    $company = [
        'company_name' => get_post_var('company_name'),
        'company_street' => get_post_var('company_street'),
        'company_building' => get_post_var('company_building'),
        'company_zip' => get_post_var('company_zip'),
        'company_city' => get_post_var('company_city'),
        'company_country' => get_post_var('company_country'),
        'company_phone' => get_post_var('company_phone'),
        'company_vat' => get_post_var('company_vat'),
        'company_chamber' => get_post_var('company_chamber')
    ];

    $user_data = wp_update_user([
        'ID' => $user_id, 
        'first_name' => $first_name,
        'last_name' => $last_name,
        'user_email' => $user_login,
    ]);

    update_field("user__phone", $phone, 'user_'.$user_id);
    update_user_meta($user_id, 'wp_2fa_nominated_email_address', $user_login);

    foreach($company as $key => $value) {
        update_field("user__$key", $value, 'user_'.$user_id);
    }

    if ( is_wp_error($user_data) ) {
        echo $user->get_error_message();
    }

    else {
        the_permalink( get_field('page-account-edit', 'options') );
    }

    die();
}

add_action('wp_ajax_userUploadLogo', 'userUploadLogo');
add_action('wp_ajax_nopriv_userUploadLogo', 'userUploadLogo');
function userUploadLogo() {
    if ( !isset( $_POST['_wpnonce'] ) || !wp_verify_nonce($_POST['_wpnonce'], 'user_upload_logo') ) {
        die('Wrong nonce.');
    }

    $logo_id = get_post_var('file_logo_id');
    $user_id = get_post_var('user_id');

    update_field('user__avatar', $logo_id, 'user_'.$user_id);

    echo get_field('user__avatar', 'user_'.$user_id)['sizes']['medium'];

    die();
}

function add_custom_roles() {
    if ( get_option( 'custom_roles_version' ) < 1 ) {
        add_role( 'client', 'Client', ['read' => true, 'level_0' => true] );
        update_option( 'custom_roles_version', 1 );
    }
}
add_action( 'init', 'add_custom_roles' );

function redirect_non_logged_users() {
    if ( !is_user_logged_in() && ( is_page( get_field('page-account-edit', 'options') ) || is_page( get_field('page-account', 'options') ) || is_page( get_field('page-invoices', 'options') ) ) && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php' ) {
        
        wp_redirect( get_permalink( get_field('page-login', 'options') ) ); 
        exit;
    }
}
add_action( 'template_redirect', 'redirect_non_logged_users' );

add_action( 'manage_green-order_posts_custom_column', 'vh_realestate_column', 10, 2);
function vh_realestate_column( $column, $post_id ) {
    if ( 'order-number' === $column ) {
        the_field('order__number', $post_id);
    }
}

// add_action('clear_auth_cookie', 'user_setup_2fa', 10);
// function user_setup_2fa() {
//     $user = wp_get_current_user();

//     update_user_meta($user->ID, 'wp_2fa_nominated_email_address', $user->user_email);
//     update_user_meta($user->ID, 'wp_2fa_enabled_methods', 'email');
// }