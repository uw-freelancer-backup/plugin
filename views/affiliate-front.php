<?php

$uw_freelancer_options = get_option('uw_freelancer_options');
$count = $uw_freelancer_options['ad_count'];
$keyword = $uw_freelancer_options['keyword'];
$aff = $uw_freelancer_options['user_id'];
$order = 'rand';

$aff = 'sachiran';
$count =2;

echo '<script src="http://api.freelancer.com/Project/Search.json?' .
        'keyword=' . $keyword .
        '&count=' . $count .
        '&order=' . $order .
        '&aff=' . $aff .
        '&callback=uw_freelancer_affiliate" language="javascript"></script>';
?>