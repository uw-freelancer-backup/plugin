<?php
global $uw_freelancer;

$uw_freelancer_options = get_option('uw_freelancer_options');

$user = $uw_freelancer->get_user($uw_freelancer_options['user_id'])->profile;

$jobs = implode(", ", $user->jobs);



$hireme_link = 'https://www.freelancer.com/users/' . $user->id . '.html?ext=1&action=hireme';
$hireme_image = plugins_url() . '/uw-freelancer/images/hireme-freelancer.png';

?>
<div class="uw-freelancer-widget row">
        
<?php

if($uw_freelancer_options['show_userphoto'] == true && isset($user->profile_logo_url)){
    echo '<img src="' . $user->profile_logo_url . '" /><br />';
}

if($uw_freelancer_options['show_username'] == true && isset($user->username)){
    echo 'Username : ' . $user->username . '<br />';
}

if($uw_freelancer_options['show_company'] == true && isset($user->company)){
    echo 'Company : ' . $user->company . '<br />';
}

if($uw_freelancer_options['show_city'] == true && isset($user->address->city)){
    echo 'City : ' . $user->address->city . '<br />';
}

if($uw_freelancer_options['show_country'] == true && isset($user->address->country)){
    echo 'Country : ' . $user->address->country . '<br />';
}

if($uw_freelancer_options['show_regdate'] == true && isset($user->reg_unixtime)){
    echo 'Registered date : ' . date("j, n, Y", $user->reg_unixtime) . '<br />';
}

if($uw_freelancer_options['show_rating'] == true && isset($user->provider_rating->avg)){
    echo 'Average Rating : ' . $user->provider_rating->avg . ' (/10)<br />';
}

if($uw_freelancer_options['show_count'] == true && isset($user->provider_rating->count)){
    echo 'No of projects completed : ' . $user->provider_rating->count . '<br />';
}

if($uw_freelancer_options['show_jobs'] == true && isset($user->jobs)){
    echo 'Jobs : ' . $jobs . '<br />';
}


?>
<div class="row" style="text-align: center; margin-top: 5px;">
    <a href="<?php echo $hireme_link; ?>"><img src="<?php echo $hireme_image ?>" /></a>
</div>
</div>