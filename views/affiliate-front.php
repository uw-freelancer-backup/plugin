<?php

$uw_freelancer_options = get_option('uw_freelancer_options');
$count = $uw_freelancer_options['ad_count'];
$keyword = $uw_freelancer_options['keyword'];
$aff = $uw_freelancer_options['user_id'];
$owner = $uw_freelancer_options['owner'];
$only_featured = $uw_freelancer_options['only_featured'];
$order = $uw_freelancer_options['order'];
$order_dir = $uw_freelancer_options['order_dir'];

$aff = 'sachiran';

$script_string =  '<script src="http://api.freelancer.com/Project/Search.json?';
        if(!empty($count)) $script_string .= '&count=' . $count;
        if(!empty($keyword)) $script_string .= '&keyword=' . $keyword ;
        if(!empty($aff)) $script_string .= '&aff=' . $aff;
        if(!empty($owner)) $script_string .= '&owner=' . $owner;
        if(!empty($only_featured)) $script_string .= '&featured=' . $only_featured;
        if(!empty($order)) $script_string .= '&order=' . $order;
        if(!empty($order_dir)) $script_string .= '&order_dir=' . $order_dir;        
$script_string .= '&callback=uw_freelancer_affiliate" language="javascript"></script>';
echo $script_string;
?>