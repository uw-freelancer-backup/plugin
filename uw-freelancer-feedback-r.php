<?php

class UW_Freelancer_Feedback_R extends WP_Widget{
    
    public function __construct() {
        parent::__construct(
                'uw-freelancer-feedback-r',
                __( 'UW Freelancer Feedback (Recent)', 'uwfreelancer' ),
                array(
                        'classname'		=>	'uw-freelancer',
                        'description'	=>	__( 'Recent Reviews on Freelancer.com.', 'uwfreelancer' )
                )
        );
    }

    public function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );

        echo $before_widget;        
        
        include( plugin_dir_path( __FILE__ ) . '/views/feedback-r-front.php' );

        echo $after_widget;
    }

    public function update( $new_instance, $old_instance ) {
        
        $instance['user_id'] = $new_instance['user_id'];
        $instance['show_freelancer_logo'] = isset($new_instance['show_freelancer_logo']) ? 1 : 0;
        
        return $instance;
    }

    public function form( $instance ) {
        
        $defaults = array(
            'user_id' => 'upekshawisidaga',
            'show_freelancer_logo' => 1,
            'show_profile_logo' => 1
        );
        $instance = wp_parse_args(
                (array) $instance,
                $defaults
        );

        include( plugin_dir_path(__FILE__) . '/views/feedback-r-back.php' );
    }
}

?>
