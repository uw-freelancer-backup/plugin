<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

$api_console_screen = WP_Screen::get($this->api_console_hook_suffix);
$api_console_screen->add_help_tab(
   array(
      'title'    => 'Freelancer API',
      'id'       => 'page_info',
      'content'  => '',
      'callback' => 'freelancer_help_tab'
   )
);

function freelancer_help_tab(){
   echo "<p>This is my generated content.</p>";
}
?>