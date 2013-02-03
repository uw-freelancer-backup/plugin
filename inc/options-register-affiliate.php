<?php
add_settings_section('affiliate_config', 'Freelancer Affiliate Program', 'affiliate_config', 'uw-freelancer-settings');

function affiliate_config(){
    echo 'Freelancer Affiliate Program Settings';
}

add_settings_field('keyword', 'Search Keyword', 'keyword', 'uw-freelancer-settings', 'affiliate_config');

function keyword(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    echo '<input type="text" id="uw_freelancer_options[keyword]" name="uw_freelancer_options[keyword]" value="' . $uw_freelancer_options['keyword'] . '">';
    echo ' Enter keyword to query projects';
}

add_settings_field('ad_count', 'Project Count', 'ad_count', 'uw-freelancer-settings', 'affiliate_config');

function ad_count(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    echo '<input type="text" id="uw_freelancer_options[ad_count]" name="uw_freelancer_options[ad_count]" value="' . $uw_freelancer_options['ad_count'] . '">';
    echo ' How many projects should be listed on affliate widget<br /><br />';
}

add_settings_section('affiliate_listing', 'Freelancer Affiliate Listing', 'affiliate_listing', 'uw-freelancer-settings');

function affiliate_listing(){
    echo 'Format Freelancer Affiliate Listing';
}

add_settings_field('show_adname', 'Project Name', 'show_adname', 'uw-freelancer-settings', 'affiliate_listing');

function show_adname(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_adname'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_adname]" name="uw_freelancer_options[show_adname]" value="1"'; checked($checked); echo ' />';
    echo ' Display Project Name';
}

add_settings_field('show_addesc', 'Project Description', 'show_addesc', 'uw-freelancer-settings', 'affiliate_listing');

function show_addesc(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_addesc'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_addesc]" name="uw_freelancer_options[show_addesc]" value="1"'; checked($checked); echo ' />';
    echo ' Display Project Description';
}

add_settings_field('show_startdate', 'Project Start Date', 'show_startdate', 'uw-freelancer-settings', 'affiliate_listing');

function show_startdate(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_startdate'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_startdate]" name="uw_freelancer_options[show_startdate]" value="1"'; checked($checked); echo ' />';
    echo ' Display Project Posted Date';
}

add_settings_field('show_enddate', 'Project End Date', 'show_enddate', 'uw-freelancer-settings', 'affiliate_listing');

function show_enddate(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_enddate'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_enddate]" name="uw_freelancer_options[show_enddate]" value="1"'; checked($checked); echo ' />';
    echo ' Display Project Bidding End Date';
}

add_settings_field('show_daysleft', 'Days Left for Bidding', 'show_daysleft', 'uw-freelancer-settings', 'affiliate_listing');

function show_daysleft(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_daysleft'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_daysleft]" name="uw_freelancer_options[show_daysleft]" value="1"'; checked($checked); echo ' />';
    echo ' Display the number of days left for bidding';
}

add_settings_field('show_bidcount', 'Bid Count', 'show_bidcount', 'uw-freelancer-settings', 'affiliate_listing');

function show_bidcount(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_bidcount'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_bidcount]" name="uw_freelancer_options[show_bidcount]" value="1"'; checked($checked); echo ' />';
    echo ' Display Current number of bids for the project';
}

add_settings_field('show_bidavg', 'Average Bid Value', 'show_bidavg', 'uw-freelancer-settings', 'affiliate_listing');

function show_bidavg(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_bidavg'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_bidavg]" name="uw_freelancer_options[show_bidavg]" value="1"'; checked($checked); echo ' />';
    echo ' Display Bid value average';
}

add_settings_field('show_budget', 'Project Budget', 'show_budget', 'uw-freelancer-settings', 'affiliate_listing');

function show_budget(){
    $uw_freelancer_options = get_option('uw_freelancer_options');
    $checked = $uw_freelancer_options['show_budget'];
    echo '<input type="checkbox" id="uw_freelancer_options[show_budget]" name="uw_freelancer_options[show_budget]" value="1"'; checked($checked); echo ' />';
    echo ' Display Project Budget<br /><br />';
}
?>
