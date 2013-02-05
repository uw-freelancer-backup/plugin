<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

global $uw_freelancer;

$uw_freelancer_options = get_option('uw_freelancer_options');

$user = $uw_freelancer->get_user($uw_freelancer_options['user_id'])->profile;

$jobs = implode(", ", $user->jobs);

$hireme_link = 'https://www.freelancer.com/users/' . $user->id . '.html?ext=1&action=hireme';
$hireme_image = plugins_url() . '/uw-freelancer/images/uw-freelancer-hireme.png';

$output = '<div class="uw-freelancer-widget row">';

if($uw_freelancer_options['show_userphoto'] == true && isset($user->profile_logo_url)){
    $output .= '<img src="' . $user->profile_logo_url . '" /><br />';
}

if($uw_freelancer_options['show_username'] == true && isset($user->username)){
    $output .= 'Username : ' . $user->username . '<br />';
}

if($uw_freelancer_options['show_company'] == true && isset($user->company)){
    $output .= 'Company : ' . $user->company . '<br />';
}

if($uw_freelancer_options['show_city'] == true && isset($user->address->city)){
    $output .= 'City : ' . $user->address->city . '<br />';
}

if($uw_freelancer_options['show_country'] == true && isset($user->address->country)){
    $output .= 'Country : ' . $user->address->country . '<br />';
}

if($uw_freelancer_options['show_regdate'] == true && isset($user->reg_unixtime)){
    $output .= 'Registered date : ' . date("j, n, Y", $user->reg_unixtime) . '<br />';
}

if($uw_freelancer_options['show_rating'] == true && isset($user->provider_rating->avg)){
    $output .= 'Average Rating : ' . $user->provider_rating->avg . ' (/10)<br />';
}

if($uw_freelancer_options['show_count'] == true && isset($user->provider_rating->count)){
    $output .= 'No of projects completed : ' . $user->provider_rating->count . '<br />';
}

if($uw_freelancer_options['show_jobs'] == true && isset($user->jobs)){
    $output .= 'Jobs : ' . $jobs . '<br />';
}

    $output .= ' <div class="row" style="text-align: center; margin-top: 5px;">';
    $output .= ' <a href="'. $hireme_link .'"><img src="' . $hireme_image . '" /></a>';
    $output .= ' </div>';
    $output .= '</div>';
    
echo apply_filters('uwf-profile-front', $output, $user, $uw_freelancer_options, $instance);    