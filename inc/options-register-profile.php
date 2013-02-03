<?php
//add_settings_section($id, $title, $callback, $page)

add_settings_section('profile_information', 'Freelancer Profile', 'profile_information', 'uw-freelancer-settings');

function profile_information(){
    echo 'Freelancer Profile Information';
}

add_settings_field('user_id', 'User ID', 'user_id', 'uw-freelancer-settings', 'profile_information');

function user_id(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    echo '<input type="text" id="uw_freelancer_options[user_id]" name="uw_freelancer_options[user_id]" value="' . $uw_freelancer_options['user_id'] . '">';
    echo ' Enter your freelancer.com user id';
}

add_settings_section('profile_structure', 'Profile Structure', 'profile_structure', 'uw-freelancer-settings');

function profile_structure(){
    echo 'Manage freelancer profile widget structure';
}

add_settings_field('freelancer_logo', 'Freelancer Logo', 'freelancer_logo', 'uw-freelancer-settings', 'profile_structure');

function freelancer_logo(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_freelancer_logo'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_freelancerlogo]" name="uw_freelancer_options[show_freelancer_logo]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com logo on top of the profile widget';
}

add_settings_field('user_photo', 'User Photo', 'freelancer_user_photo', 'uw-freelancer-settings', 'profile_structure');

function freelancer_user_photo(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_userphoto'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_userphoto]" name="uw_freelancer_options[show_userphoto]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user profile photo in the profile widget';
}

add_settings_field('username', 'Username', 'freelancer_username', 'uw-freelancer-settings', 'profile_structure');

function freelancer_username(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_username'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_username]" name="uw_freelancer_options[show_username]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com username in the profile widget';
}

add_settings_field('company', 'Company', 'freelancer_company', 'uw-freelancer-settings', 'profile_structure');

function freelancer_company(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_company'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_company]" name="uw_freelancer_options[show_company]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user company in the profile widget';
}

add_settings_field('city', 'City', 'freelancer_city', 'uw-freelancer-settings', 'profile_structure');

function freelancer_city(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_city'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_city]" name="uw_freelancer_options[show_city]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user city in the profile widget';
}

add_settings_field('country', 'Country', 'freelancer_country', 'uw-freelancer-settings', 'profile_structure');

function freelancer_country(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_country'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_country]" name="uw_freelancer_options[show_country]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user country in the profile widget';
}

add_settings_field('regdate', 'Registred Date', 'freelancer_regdate', 'uw-freelancer-settings', 'profile_structure');

function freelancer_regdate(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_regdate'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_regdate]" name="uw_freelancer_options[show_regdate]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user registered date in the profile widget';
}

add_settings_field('rating', 'Rating', 'freelancer_rating', 'uw-freelancer-settings', 'profile_structure');

function freelancer_rating(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_rating'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_rating]" name="uw_freelancer_options[show_rating]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user provider rating in the profile widget';
}

add_settings_field('count', 'Project Count', 'freelancer_count', 'uw-freelancer-settings', 'profile_structure');

function freelancer_count(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_count'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_count]" name="uw_freelancer_options[show_count]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com user completed project count in the profile widget';
}

add_settings_field('jobs', 'Job List', 'freelancer_jobs', 'uw-freelancer-settings', 'profile_structure');

function freelancer_jobs(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_jobs'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_jobs]" name="uw_freelancer_options[show_jobs]" value="1"'; checked($checked); echo ' />';
    echo ' Display freelancer.com job list in the profile widget';
}

add_settings_section('profile_format', 'Freelancer Styles', 'profile_format', 'uw-freelancer-settings');

function profile_format(){
    echo 'Formatting/Styling options for Freelancer.com Widgets';
}

add_settings_field('customizer_link', 'Customize Appearence', 'customizer_link', 'uw-freelancer-settings', 'profile_format');

function customizer_link(){
    echo 'Visit <a href="' . get_admin_url() . 'customize.php">Customizer</a> to customize the widget appearence<br /><br />';
}
?>
