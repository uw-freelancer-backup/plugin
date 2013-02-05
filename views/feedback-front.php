<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

global $uw_freelancer;

$uw_freelancer_options = get_option('uw_freelancer_options');

$feedback = $uw_freelancer->get_feedback($uw_freelancer_options['user_id']);

foreach($feedback->feedbacks->items as $project){
    $project_name = $project->project->name;
    $project_link = $project->project->url;
    
    $from_user = $project->from_user->username;
    $from_user_link = $project->from_user->url;
    
    $feedback = $project->descr;
    $rating = $project->rating;
    $value = $project->bid->amount;
    $date = $project->active_unixtime;

$output = '<div class="row">';
    $output .= '<div class="uw-freelancer-widget twelve columns">';

    if($uw_freelancer_options['show_project'] == true && isset($project_name)){
        if($uw_freelancer_options['show_project_link'] && isset($project_link)){
            $output .= '<h5><a href="' . $project_link . '">' . $project_name . '</a></h5>';
        } else {
            $output .= '<h5>' . $project_name . '</h5>';
        }    
    } 
    
    $output .= $feedback;
    
    if($uw_freelancer_options['show_provider'] == true && isset($feedback)){
        if($uw_freelancer_options['show_provider_link'] && isset($from_user_link)){
            $output .= ' - <a href="' . $from_user_link . '">' . $from_user . '</a><br /><br />';
        } else {
            $output .= ' - ' . $from_user . '<br /><br />';
        }        
    }  
    
    if($uw_freelancer_options['show_rating'] == true && isset($rating)){
        $output .= 'Rating : ' . $rating . ' (/10)<br /><br />';
    }
    
    if($uw_freelancer_options['show_value'] == true && isset($value)){
        $output .= 'Project Value : ' . $value . '<br /><br />';
    }
    
    if($uw_freelancer_options['show_date'] == true && isset($date)){
        $output .= 'Date : ' . date("j, n, Y", $date) . '<br /><br />';
    }        
 
    $output .= '</div>';
$output .= '</div>';

echo apply_filters('uwf-feedback-front', $output, $feedback, $uw_freelancer_options, $instance);
    
}