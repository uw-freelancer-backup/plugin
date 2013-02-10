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

$output = '<div class="uwf-widget">';

if($uw_freelancer_options['show_userphoto'] == true && isset($user->profile_logo_url)){
    $output .= ' <div class="uwf-profile-photo">';
    $output .= '<img src="' . $user->profile_logo_url . '" /><br />';
    $output .= ' </div>';
}

    $output .= ' <div class="uwf-profile-details">';

if($uw_freelancer_options['show_username'] == true && isset($user->username)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">Username : </span>' . $user->username ;
    $output .= '</span>';
}

if($uw_freelancer_options['show_company'] == true && isset($user->company)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">Company : </span>' . $user->company ;
    $output .= '</span>';
}

if($uw_freelancer_options['show_city'] == true && isset($user->address->city)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">City : </span>' . $user->address->city ;
    $output .= '</span>';
}

if($uw_freelancer_options['show_country'] == true && isset($user->address->country)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">Country : </span>' . $user->address->country ;
    $output .= '</span>';
}

if($uw_freelancer_options['show_regdate'] == true && isset($user->reg_unixtime)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">Registered date : </span>' . date("j, n, Y", $user->reg_unixtime) ;
    $output .= '</span>';
}

if($uw_freelancer_options['show_rating'] == true && isset($user->provider_rating->avg)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">Average Rating : </span>' . $user->provider_rating->avg . ' (/10)';
    $output .= '</span>';
}

if($uw_freelancer_options['show_count'] == true && isset($user->provider_rating->count)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">No of projects completed : </span>' . $user->provider_rating->count ;
    $output .= '</span>';
}

if($uw_freelancer_options['show_jobs'] == true && isset($user->jobs)){
    $output .= '<span class="uwf-item">';
    $output .= '<span class="uwf-item-header">Jobs : </span>' . $jobs ;
    $output .= '</span>';
}
    $output .= ' </div>';
    $output .= ' <div class="uwf-hire-me-link">';    
    $output .= ' <a  href="'. $hireme_link .'"><img src="' . $hireme_image . '" /></a>';
    $output .= ' </div>';
    $output .= ' </div>';
    
echo apply_filters('uwf-profile-front', $output, $user, $uw_freelancer_options, $instance);

?>