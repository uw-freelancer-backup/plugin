<?php

class UW_Freelancer_Affiliate extends WP_Widget{
    
    public function __construct() {
        parent::__construct(
                'uw-freelancer-affiliate',
                __( 'UW Freelancer Affiliate Projects', 'uwfreelancer' ),
                array(
                        'classname'		=>	'uw-freelancer',
                        'description'	=>	__( 'Direct visitors to freelancer.com and earn commision.', 'uwfreelancer' )
                )
        );
        
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function widget( $args, $instance ) {
        extract( $args, EXTR_SKIP );

        echo $before_widget;        
        
        include( plugin_dir_path( __FILE__ ) . '/views/affiliate-front.php' );

        echo $after_widget;
    }
    
    public function enqueue_scripts(){        
        wp_enqueue_script('uw-freelancer-affiliate', plugins_url() . '/uw-freelancer/js/uw-freelancer-affiliate.js', array('jquery'), '1.0', false );
        wp_localize_script('uw-freelancer-affiliate', 'uw_freelancer_obj', $this->localize_uw_f_a());
    }
    
    public function localize_uw_f_a(){
        $uw_freelancer_options = get_option('uw_freelancer_options');
        
        return array(
            'show_adname' => $uw_freelancer_options['show_adname'],
            'show_addesc' => $uw_freelancer_options['show_addesc'],
            'show_startdate' => $uw_freelancer_options['show_startdate'],
            'show_enddate' => $uw_freelancer_options['show_enddate'],
            'show_daysleft' => $uw_freelancer_options['show_daysleft'],
            'show_bidcount' => $uw_freelancer_options['show_bidcount'],
            'show_bidavg' => $uw_freelancer_options['show_bidavg'],
            'show_budget' => $uw_freelancer_options['show_budget']
        );
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

        include( plugin_dir_path(__FILE__) . '/views/affiliate-back.php' );
    }
}

?>
