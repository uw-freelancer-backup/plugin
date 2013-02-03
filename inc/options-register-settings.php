<?php
global $uw_freelancer;

$uw_freelancer_options = get_option('uw_freelancer_options');

add_settings_section('freelancer_transients', 'Freelancer Transients', 'freelancer_transients', 'uw-freelancer-settings');

function freelancer_transients(){
    echo 'Manage Freelancer Transients';
}

add_settings_field('transient_timeout', 'Transient Timeout', 'transient_timeout', 'uw-freelancer-settings', 'freelancer_transients');

function transient_timeout(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    echo '<input type="text" id="uw_freelancer_options[transient_timeout]" name="uw_freelancer_options[transient_timeout]" value="' . $uw_freelancer_options['transient_timeout'] . '">';
    echo ' Enter Transients Timeout in Hours';
}

add_settings_field('clear_transients', 'Clear Transients', 'clear_transients', 'uw-freelancer-settings', 'freelancer_transients');

function clear_transients(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['clear_transients'];
    echo '<input type="checkbox" id="uw_freelancer_options[clear_transients]" name="uw_freelancer_options[clear_transients]" value="1"'; checked($checked); echo ' />';
    echo ' Delete transients (Press Save button to delete).<br /><br />';
}

?>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Freelancer Transients</a></li>
    <li><a href="#tabs-2">User Object</a></li>
    <li><a href="#tabs-3">Feedback Object</a></li>
  </ul>
  <div id="tabs-1">
    <h3>UW Freelancer Transients</h3>  
    <p>UW Freelancer plugin stores queried freelancer.com api responses in WordPress
    transients. User Object transient stores the profile widget related data.
    Feedback Object stores the feedback widget related data. You can view the content of
    those objects in the next tabs.</p>
    
    <p>Check the below checkbox to refresh the objects by querying the api again. Otherwise
    they will be refreshed after transient expiration.</p>
  </div>
  <div id="tabs-2">
  <?php
    $user_transient = $uw_freelancer->freelancer_transient(
            'get',
            'user',
            $uw_freelancer_options['user_id']
            );
    echo '<h3>UW Freelancer User Object</h3>';
    echo 'Below is the complete api query response for the user inquiry. It is cached in a WordPress
        transient. You can manually delete the transient before it expires. You can set the Transient 
        expiration period via settings.';
    echo '<pre>';
    print_r($user_transient);
    echo '</pre>';  
  ?>    
  </div>
  <div id="tabs-3">
  <?php
    $feedback_transient = $uw_freelancer->freelancer_transient(
            'get',
            'feedback',
            $uw_freelancer_options['user_id']
            );
    echo '<h3>UW Freelancer Feedback Object</h3>';
    echo 'Below is the complete api query response for the feedback inquiry. It is cached in a WordPress
        transient. You can manually delete the transient before it expires. You can set the Transient 
        expiration period via settings.';
    echo '<pre>';
    print_r($feedback_transient);
    echo '</pre>';  
  ?>
  </div>
</div>