<?php
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

?>
<div class="row">
    <div class="uw-freelancer-widget twelve columns">
    <?php    
    
    if($uw_freelancer_options['show_project'] == true && isset($project_name)){
        if($uw_freelancer_options['show_project_link'] && isset($project_link)){
            echo '<h5><a href="' . $project_link . '">' . $project_name . '</a></h5>';
        } else {
            echo '<h5>' . $project_name . '</h5>';
        }    
    } 
    
    echo $feedback;
    
    if($uw_freelancer_options['show_provider'] == true && isset($feedback)){
        if($uw_freelancer_options['show_provider_link'] && isset($from_user_link)){
            echo ' - <a href="' . $from_user_link . '">' . $from_user . '</a><br /><br />';
        } else {
            echo ' - ' . $from_user . '<br /><br />';
        }        
    }  
    
    if($uw_freelancer_options['show_rating'] == true && isset($rating)){
        echo 'Rating : ' . $rating . ' (/10)<br /><br />';
    }
    
    if($uw_freelancer_options['show_value'] == true && isset($value)){
        echo 'Project Value : ' . $value . '<br /><br />';
    }
    
    if($uw_freelancer_options['show_date'] == true && isset($date)){
        echo 'Date : ' . date("j, n, Y", $date) . '<br /><br />';
    }        
    
    ?>    
    </div>
</div>
<?php
}