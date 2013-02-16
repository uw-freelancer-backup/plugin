<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

$freelancer_screen = WP_Screen::get($this->freelancer_hook_suffix);

$freelancer_screen->set_help_sidebar('Freelancer.com');

$freelancer_screen->add_help_tab(
   array(
      'title'    => 'Profile Tab',
      'id'       => 'profile_tab',
      'content'  => '',
      'callback' => 'profile_tab'
   )
);
$freelancer_screen->add_help_tab(
   array(
      'title'    => 'Feedback Tab',
      'id'       => 'feedback_tab',
      'content'  => '',
      'callback' => 'feedback_tab'
   )
);
$freelancer_screen->add_help_tab(
   array(
      'title'    => 'Affiliate Tab',
      'id'       => 'affiliate_tab',
      'content'  => '',
      'callback' => 'affiliate_tab'
   )
);

function feedback_tab(){
   echo "<p>This is my generated content.</p>";
}

function profile_tab(){
   echo "<p>This is my generated content.</p>";
}

function affiliate_tab(){
   echo "<p>This is my generated content.</p>";
}
?>