<?php
/**
 * Plugin Name: UW Freelancer
 */
class UW_Freelancer{
    
    private $data;
    private $api_url;
    private $prefix = 'uw_freelancer';
    private $expiration; 
    
    private $settings;
    private $customizer;
    
    function __construct() {
        
        require 'uw-freelancer-settings.php';
        $this->settings = new UW_Freelancer_Setttings();    
        
        require 'uw-freelancer-customizer.php';
        $this->settings = new UW_Freelancer_Customizer();          
        
        add_action( 'widgets_init', array($this, 'register_widgets') );
        
        $this->api_url = 'http://api.freelancer.com';
        $this->expiration = 60*60*24;
    }

    function init() {
        //$this->widgets = new UW_Freelancer_Widgets();
        
    }
    
    public function enqueue_scripts(){
        wp_enqueue_style('uw-freelancer-widget-styles', plugins_url() . '/uw-freelancer/css/uw-freelancer-widgets.css');
    }    
    
    function register_widgets(){
        
        require 'uw-freelancer-profile.php';
        register_widget( 'UW_Freelancer_Profile' );
        
        require 'uw-freelancer-feedback.php';
        register_widget( 'UW_Freelancer_Feedback' );   
        
        require 'uw-freelancer-affiliate.php';
        register_widget( 'UW_Freelancer_Affiliate' );            
    }

    
    function get_user($user_id = 'upekshawisidaga'){
        
        $value = $this->prefix . '_user_' . $user_id;
        
        $user = get_transient($value);
        
        if(!$user){ 
            $url = $this->api_url . '/User/Properties.json?id=' . $user_id;
            $response = wp_remote_get($url); 
        
            if(is_wp_error($response)){
                return 'error occured';
            } else {
                $user = json_decode($response['body']);
                set_transient($value, $user, $this->expiration);                                  
                return $user;
            }
        
        } else {
            return $user;
        }
    }    
    
    function get_feedback($user_id = 'upekshawisidaga'){
        
        $value = $this->prefix . '_feedback_' . $user_id;
        
        $feedback = get_transient($value);
        
        if(!$feedback){ 
            $uw_freelancer_options = get_option( 'uw_freelancer_options' );
            $count = $uw_freelancer_options['feedback_count'];
            $type = $uw_freelancer_options['feedback_type'];
            
            $url = $this->api_url . '/Feedback/Search.json?count=' . $count . '&type=' . $type . '&user=' . $user_id;
            $response = wp_remote_get($url); 
        
            if(is_wp_error($response)){
                return 'error occured';
            } else {
                $user = json_decode($response['body']);
                set_transient($value, $user, $this->expiration);                                  
                return $user;
            }
        
        } else {
            return $feedback;
        }
    }     
    
    function freelancer_transient($method = 'get', $type = 'user', $user_id = 'upekshawisidaga'){
        
        $value = $this->prefix . '_' . $type . '_' . $user_id;
        
        if($method == 'get'){
            return get_transient($value);
        } else if ($method == 'delete'){
            delete_transient($value);
            return 'deleted';
        }
    }
}

$uw_freelancer = new UW_Freelancer();
add_action('init', array($uw_freelancer, 'init'));
?>
