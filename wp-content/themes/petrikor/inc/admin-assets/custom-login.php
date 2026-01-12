<?php
/*
 * CUSTOM LOGIN PAGE
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. ADD theme LOGO
 * 2. ADD theme URL
 * 3. REMOVE LOGIN ERRORS
 * 4. REMEMBER ME - ALWAYS CHECKED
 * 
 * *****************************************************************************
 * **************************** 1. ADD theme LOGO *******************************
 * ************************************************************************** */

function login_theme_logo() {

    global $petrikor_options;

    $url = $petrikor_options['logo']['url'];
    ?> 
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo $url; ?>);
            width: 100%;
            background-size: contain;
            margin: 0 auto 15px;
            height: 100px;
        }
        .login .button-primary {
            background-color: #143b66!important;
            box-shadow: unset !important;
            border: 0!important;
            text-shadow: unset!important;
            transition: all 0.2s;
        }
        .login .button-primary:hover {
            background-color: #143b66!important;
            text-shadow: unset!important;
        }
        .login #login_error, .login .message, .login .success {
            border-left: 4px solid #143b66!important;
        }
        p#nav {
            display: none;
        }
        p#backtoblog {
            display: none;
        }
        body.login {
            /*background-color:#000;*/
            /*            background-image:url("<?= get_template_directory_uri(); ?>/img/header.jpg");
                        background-repeat:no-repeat;
                        background-attachment:fixed;
                        background-position:center;*/
        }
        .login .forgetmenot{
            margin-bottom: 20px!important;
        }
        .login form{
            box-shadow:none;
            padding:20px;
        }
        .login label {
            color: #555;
            font-size: 14px;
        }
        .login form .forgetmenot{
            float:none;
        }
        #login form p.submit{
            margin-top:15px;
        }
        .login.wp-core-ui .button-primary {
            background: #7B417A;
            border-color:#7B417A;
            box-shadow: 0 1px 0 #7B417A;
            color: #FFF;
            text-shadow: none;
            float: none;
            clear: both;
            display: block;
            width: 100%;
            padding: 7px;
            height: auto;
            font-size: 15px;
        }
    </style>

    <?php
}

add_action('login_enqueue_scripts', 'login_theme_logo');

/* * ***************************************************************************
 * ****************************** 2. ADD theme URL ******************************
 * ************************************************************************** */

function custom_loginlogo_url($url) {
    return get_site_url();
}

add_filter('login_headerurl', 'custom_loginlogo_url');

/* * ***************************************************************************
 * *************************** 3. REMOVE LOGIN ERRORS **************************
 * ************************************************************************** */

function login_error_override() {
    return 'Incorrect login details.';
}

add_filter('login_errors', 'login_error_override');

/* * ***************************************************************************
 * ********************** 4. REMEMBER ME - ALWAYS CHECKED **********************
 * ************************************************************************** */

add_action('init', 'login_checked_remember_me');

function login_checked_remember_me() {
    add_filter('login_footer', 'rememberme_checked');
}

function rememberme_checked() {
    echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
add_action('login_form', 'wdm_login_form_captcha');
function wdm_login_form_captcha()
{
 ?>
    <input type="hidden" name="wdm_captcha_prefix" value="petrikor-1548793154"/>
    <?php
}

add_filter('wp_authenticate_user','wdm_validate_login_captcha',10,2);
function wdm_validate_login_captcha($user, $password) {
  $return_value = $user;
  
    $user_id = $user->id;
    $prefix = $_POST['wdm_captcha_prefix'];
    if($prefix != 'petrikor-1548793154')
    {
        update_user_meta($user_id, 'user_login_time', 0 );
      // if there is a mis-match
      $return_value = new WP_Error( 'loginCaptchaError', 'Captcha Error. Please try again.' );
    }else{
        update_user_meta($user_id, 'user_login_time', 1 );

        return $return_value;
    }
    
}
/*
this is an redirect action
*/
function BB_ECC_login_redirect_code( $redirect_to, $request, $user  ) {

    $user_login_time = get_user_meta( $user->id , 'user_login_time' , true );
    if( $user_login_time == 1 ){
        $new_url = admin_url();
    }else{
        $new_url = get_site_url();
    }

    return $new_url;
}
//add_filter( 'login_redirect', 'BB_ECC_login_redirect_code', 10, 3 );
if(is_user_logged_in()){
    $user = wp_get_current_user();
    $user_login_time = get_user_meta( $user->id , 'user_login_time' , true );
    if( $user_login_time == 1 ){
        $new_url = admin_url();
    }else{
        $new_url = get_site_url();
        wp_redirect($new_url);
        wp_logout();
    }
}

