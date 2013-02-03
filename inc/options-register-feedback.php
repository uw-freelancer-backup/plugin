<?php
global $uw_freelancer;

$uw_freelancer_options = get_option('uw_freelancer_options');

add_settings_section('freelancer_feedback', 'Freelancer Feedback', 'freelancer_feedback', 'uw-freelancer-settings');

function freelancer_feedback(){
    echo 'Manage Freelancer Feedback Widget';
}

add_settings_field('feedback_count', 'Freelancer Logo', 'feedback_count', 'uw-freelancer-settings', 'freelancer_feedback');

function feedback_count(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    echo '<input type="text" id="uw_freelancer_options[feedback_count]" name="uw_freelancer_options[feedback_count]" value="' . $uw_freelancer_options['feedback_count'] . '">';
    echo ' Enter no of feedback items to display';
}

add_settings_field('show_provider', 'Project Poster', 'show_provider', 'uw-freelancer-settings', 'freelancer_feedback');

function show_provider(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_provider'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_provider]" name="uw_freelancer_options[show_provider]" value="1"'; checked($checked); echo ' />';
    echo ' Display project poster/employer (feeback provider)';
}

add_settings_field('show_provider_link', 'Project Poster Link', 'show_provider_link', 'uw-freelancer-settings', 'freelancer_feedback');

function show_provider_link(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_provider_link'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_provider_link]" name="uw_freelancer_options[show_provider_link]" value="1"'; checked($checked); echo ' />';
    echo ' Display a link to project poster/employer profile on freelancer.com (feeback provider)';
}

add_settings_field('show_project', 'Show Project', 'show_project', 'uw-freelancer-settings', 'freelancer_feedback');

function show_project(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_project'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_project]" name="uw_freelancer_options[show_project]" value="1"'; checked($checked); echo ' />';
    echo ' Display the project name for a feedback item';
}

add_settings_field('show_project_link', 'Show Project Link', 'show_project_link', 'uw-freelancer-settings', 'freelancer_feedback');

function show_project_link(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_project_link'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_project_link]" name="uw_freelancer_options[show_project_link]" value="1"'; checked($checked); echo ' />';
    echo ' Display a link to the project for a feedback item';
}

add_settings_field('show_rating', 'Project Rating', 'show_rating', 'uw-freelancer-settings', 'freelancer_feedback');

function show_rating(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_rating'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_rating]" name="uw_freelancer_options[show_rating]" value="1"'; checked($checked); echo ' />';
    echo ' Display project rating associate with the feedback';
}

add_settings_field('show_value', 'Project Budget', 'show_value', 'uw-freelancer-settings', 'freelancer_feedback');

function show_value(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_value'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_value]" name="uw_freelancer_options[show_value]" value="1"'; checked($checked); echo ' />';
    echo ' Display project value';
}

add_settings_field('show_date', 'Project Date', 'show_date', 'uw-freelancer-settings', 'freelancer_feedback');

function show_date(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_date'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_date]" name="uw_freelancer_options[show_date]" value="1"'; checked($checked); echo ' />';
    echo ' Display feedback date<br /><br />';
}

?>
