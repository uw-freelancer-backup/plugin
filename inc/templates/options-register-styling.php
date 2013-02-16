<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

global $uw_freelancer;

$uw_freelancer_options = get_option('uw_freelancer_options');

$feedback = $uw_freelancer->get_user($uw_freelancer_options['user_id']);
$feedback = $uw_freelancer->get_feedback($uw_freelancer_options['user_id']);

add_settings_section(
        'profile_format', 
        __('Freelancer Styles', 'uwf'), 
        'profile_format', 
        'uw-freelancer-settings');

function profile_format(){
    echo __('Formatting/Styling options for Freelancer.com Widgets', 'uwf');
}

add_settings_field('customizer_link', __('Customize Appearence', 'uwf'), 'customizer_link', 'uw-freelancer-settings', 'profile_format');

function customizer_link(){
    echo '<p><a class="button" href="' . get_admin_url() . 'customize.php">' . __('Customize Widget Appearence', 'uwf') . '</a> ' . __('Visit Freelancer Widget section to customize the widget appearence', 'uwf') . '</p><br /><br />';
}

do_action('uwf-profile-settings');
?>
