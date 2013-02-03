<?php

class UW_Freelancer_Setttings{
    
    private $uw_freelancer_options;
    
    private $freelancer_hook_suffix;

    function __construct() {
        // Initialize Theme options
        add_action('after_setup_theme', array($this, 'options_init') ); 
        
        // Load the Admin Options page
        add_action('admin_menu', array($this, 'menu_options'));
        
        add_action('admin_init', array($this, 'register_settings'));
        
        add_action('wp_head', array($this, 'print_freelancer_styles'));
        
        add_action('admin_print_scripts', array($this, 'freelancer_admin_scripts'));        

    }
    
    function register_settings(){
        register_setting( 'uw_freelancer_options', 'uw_freelancer_options', array($this, 'uw_freelancer_options_validate'));
    }


    function get_default_options() {
         $options = array(
            'show_freelancer_logo' => true,
            'user_id' => 'upekshawisidaga',            
            'show_userphoto' => true,
            'show_username' => true,
            'show_company' => true,
            'show_city' => true,
            'show_country' => true,
            'show_regdate' => true,
            'show_rating' => true,
            'show_count' => true,
            'show_jobs' => true, 
             
            'feedback_count' => 4,
            'show_rating' => true, 
            'show_value' => true,
            'show_date' => true,
            'show_provider' => true,
            'show_provider_link' => true,
            'show_project' => true,
            'show_project_link' => true,
             
            'keyword' => 'wordpress',
            'ad_count' => 4,
            'show_adname' => true,
            'show_addesc' => true,
            'show_startdate' => true,
            'show_enddate' => true,
            'show_daysleft' => true,
            'show_hoursleft' => true,
            'show_bidcount' => true,
            'show_bidavg' => true,
            'show_budget' => true, 
             
            'transient_timeout' => 24, 
            'clear_transients' => false  
             
         );
         return $options;
    }   
    
    function options_init() {
         // set options equal to defaults
         $this->uw_freelancer_options = get_option( 'uw_freelancer_options' );
         if ( false === $this->uw_freelancer_options ) {
              $this->uw_freelancer_options = $this->get_default_options();
         }
         update_option( 'uw_freelancer_options', $this->uw_freelancer_options );
    }
    
    function get_settings_page_tabs() {
         $tabs = array(
            'profile' => 'Profile',
            'feedback' => 'Feedback',
            'affiliate' => 'Affiliate',
            'settings' => 'Settings' 
         );
         return $tabs;
    }    
    
    // Add "UW Freelancer Options" link to the "Settings" menu
    function menu_options() {
         $this->freelancer_hook_suffix = add_menu_page('Freelancer Options', 'Freelancer', 'manage_options', 'uw-freelancer-settings', array($this, 'admin_options_page'));
    }  
    
    function admin_options_page() { 
        ?>
        <div class="wrap">
            <?php 
            $this->admin_options_page_tabs(); 
            settings_errors();
            ?>
            
        <form action="options.php" method="post">
            <?php

            global $pagenow;
            if ( 'admin.php' == $pagenow && isset( $_GET['page'] ) && 'uw-freelancer-settings' == $_GET['page'] ) :
                 if ( isset ( $_GET['tab'] ) ) :
                      $tab = $_GET['tab'];
                 else:
                      $tab = 'profile';
                 endif;
                 switch ( $tab ) :
                      case 'profile' :
                           require( plugin_dir_path(__FILE__) . '/inc/options-register-profile.php' );
                           break;
                      case 'feedback' :
                           require( plugin_dir_path(__FILE__) . '/inc/options-register-feedback.php' );
                           break;
                      case 'affiliate' :
                           require( plugin_dir_path(__FILE__) . '/inc/options-register-affiliate.php' );
                           break;
                      case 'settings' :
                           require( plugin_dir_path(__FILE__) . '/inc/options-register-settings.php' );
                           break;                       
                 endswitch;
            endif;                

            settings_fields('uw_freelancer_options');
            do_settings_sections('uw-freelancer-settings');
            ?>
            <?php $tab = ( isset( $_GET['tab'] ) ? $_GET['tab'] : 'profile' ); ?>
            <input name="uw_freelancer_options[submit-<?php echo $tab; ?>]" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'uw'); ?>" />  
            <input name="uw_freelancer_options[reset-<?php echo $tab; ?>]" type="submit" class="button-secondary" value="<?php esc_attr_e('Reset Defaults', 'uw'); ?>" />
        </form>            
        </div>
    <?php }    
    
    function admin_options_page_tabs( $current = 'profile' ) {
         if ( isset ( $_GET['tab'] ) ) :
              $current = $_GET['tab'];
         else:
              $current = 'profile';
         endif;
         $tabs = $this->get_settings_page_tabs();
         $links = array();
         foreach( $tabs as $tab => $name ) :
              if ( $tab == $current ) :
                   $links[] = "<a class='nav-tab nav-tab-active' href=?page=uw-freelancer-settings&tab=" . $tab . ">$name</a>";
              else :
                   $links[] = "<a class='nav-tab' href=?page=uw-freelancer-settings&tab=" . $tab . ">$name</a>";
              endif;
         endforeach;
         echo '<div id="icon-themes" class="icon32"><br /></div>';
         echo '<h2 class="nav-tab-wrapper">';
         foreach ( $links as $link )
              echo $link;
         echo '</h2>';
    } 
    
    function uw_freelancer_options_validate($input){
        
    $uw_freelancer_options = get_option( 'uw_freelancer_options' );
    $valid_input = $uw_freelancer_options;        

    // Determine which form action was submitted
    $submit_profile = ( ! empty( $input['submit-profile']) ? true : false );
    $reset_profile = ( ! empty($input['reset-profile']) ? true : false );
    $submit_feedback = ( ! empty($input['submit-feedback']) ? true : false );
    $reset_feedback = ( ! empty($input['reset-feedback']) ? true : false ); 
    $submit_affiliate = ( ! empty($input['submit-affiliate']) ? true : false );
    $reset_affiliate = ( ! empty($input['reset-affiliate']) ? true : false );
    $submit_settings = ( ! empty($input['submit-settings']) ? true : false );
    $reset_settings = ( ! empty($input['reset-settings']) ? true : false );    
     
    if ( $submit_profile ) { // if General Settings Submit

        $valid_input['user_id'] = ( ! empty($input['user_id']) ? sanitize_text_field($input['user_id']) : 'upekshawisidaga' );
        $valid_input['show_freelancer_logo'] = ( ! empty($input['show_freelancer_logo']) ? true : false );        
        $valid_input['show_userphoto'] = ( ! empty($input['show_userphoto']) ? true : false );
        $valid_input['show_username'] = ( ! empty($input['show_username']) ? true : false );
        $valid_input['show_company'] = ( ! empty($input['show_company']) ? true : false );
        $valid_input['show_city'] = ( ! empty($input['show_city']) ? true : false );        
        $valid_input['show_country'] = ( ! empty($input['show_country']) ? true : false );
        $valid_input['show_regdate'] = ( ! empty($input['show_regdate']) ? true : false );
        $valid_input['show_rating'] = ( ! empty($input['show_rating']) ? true : false );
        $valid_input['show_count'] = ( ! empty($input['show_count']) ? true : false );
        $valid_input['show_jobs'] = ( ! empty($input['show_jobs']) ? true : false );
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Profile Settings Saved', 'updated');
        
    } else if ($reset_profile) {
        
        $default_options = $this->get_default_options();
        
        $valid_input['user_id'] = $default_options['user_id'];
        $valid_input['show_freelancer_logo'] = $default_options['show_freelancer_logo'];
        $valid_input['show_userphoto'] = $default_options['show_userphoto'];
        $valid_input['show_username'] = $default_options['show_username'];
        $valid_input['show_company'] = $default_options['show_company'];
        $valid_input['show_city'] = $default_options['show_city'];
        $valid_input['show_country'] = $default_options['show_country'];
        $valid_input['show_regdate'] = $default_options['show_regdate'];
        $valid_input['show_rating'] = $default_options['show_rating'];
        $valid_input['show_count'] = $default_options['show_count'];
        $valid_input['show_jobs'] = $default_options['show_jobs'];     
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Profile Settings changed to Defaults', 'updated');
        
    } else if($submit_feedback) {
        
        $valid_input['feedback_count'] = ( ! empty($input['feedback_count']) ? intval(sanitize_text_field($input['feedback_count'])) : 4 );
        $valid_input['show_rating'] = ( ! empty($input['show_rating']) ? true : false ); 
        $valid_input['show_value'] = ( ! empty($input['show_value']) ? true : false );
        $valid_input['show_date'] = ( ! empty($input['show_date']) ? true : false );
        $valid_input['show_provider'] = ( ! empty($input['show_provider']) ? true : false ); 
        $valid_input['show_provider_link'] = ( ! empty($input['show_provider_link']) ? true : false ); 
        $valid_input['show_project'] = ( ! empty($input['show_project']) ? true : false );        
        $valid_input['show_project_link'] = ( ! empty($input['show_project_link']) ? true : false );        
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Feedback Settings Saved', 'updated');
        
    } else if($reset_feedback){
        
        $default_options = $this->get_default_options();
        
        $valid_input['feedback_count'] = $default_options['feedback_count'];
        $valid_input['show_rating'] = $default_options['show_rating'];
        $valid_input['show_value'] = $default_options['show_value'];
        $valid_input['show_date'] = $default_options['show_date'];
        $valid_input['show_provider'] = $default_options['show_provider'];
        $valid_input['show_provider_link'] = $default_options['show_provider_link'];
        $valid_input['show_project'] = $default_options['show_project'];
        $valid_input['show_project_link'] = $default_options['show_project_link'];
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Feedback Settings changed to Defaults', 'updated');
        
    } else if($submit_affiliate) {
        
        $valid_input['keyword'] = ( ! empty($input['keyword']) ? sanitize_text_field($input['keyword']) : 'wordpress' );
        $valid_input['ad_count'] = ( ! empty($input['ad_count']) ? intval(sanitize_text_field($input['ad_count'])) : 4 );
        
        $valid_input['show_adname'] = ( ! empty($input['show_adname']) ? true : false );
        $valid_input['show_addesc'] = ( ! empty($input['show_addesc']) ? true : false );
        $valid_input['show_startdate'] = ( ! empty($input['show_startdate']) ? true : false );
        $valid_input['show_enddate'] = ( ! empty($input['show_enddate']) ? true : false );
        $valid_input['show_daysleft'] = ( ! empty($input['show_daysleft']) ? true : false );
        $valid_input['show_bidcount'] = ( ! empty($input['show_bidcount']) ? true : false );
        $valid_input['show_bidavg'] = ( ! empty($input['show_bidavg']) ? true : false );
        $valid_input['show_budget'] = ( ! empty($input['show_budget']) ? true : false );
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Affiliate Settings Saved', 'updated');
        
    } else if($reset_affiliate){
        
        $default_options = $this->get_default_options();
        
        $valid_input['keyword'] = $default_options['keyword'];
        $valid_input['ad_count'] = $default_options['ad_count'];
        
        $valid_input['show_adname'] = $default_options['show_adname'];
        $valid_input['show_addesc'] = $default_options['show_addesc'];
        $valid_input['show_startdate'] = $default_options['show_startdate'];
        $valid_input['show_enddate'] = $default_options['show_enddate'];
        $valid_input['show_daysleft'] = $default_options['show_daysleft'];
        $valid_input['show_bidcount'] = $default_options['show_bidcount'];
        $valid_input['show_bidavg'] = $default_options['show_bidavg'];
        $valid_input['show_budget'] = $default_options['show_budget'];
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Affiliate Settings changed to Defaults', 'updated');
        
    } else if($submit_settings) {
        
        $valid_input['transient_timeout'] = ( ! empty($input['transient_timeout']) ? sanitize_text_field($input['transient_timeout']) : 24 );
        
        if(isset($input['clear_transients'])){
            
            global $uw_freelancer;

            $user_transient = $uw_freelancer->freelancer_transient(
                    'delete',
                    'user',
                    $uw_freelancer_options['user_id']
            ); 
            
            if($user_transient == 'deleted'){
                add_settings_error('freelancer-transients', 'clear transients', 'User Transient Deleted');
            } else {
                add_settings_error('freelancer-transients', 'clear transients', 'User Transient Deletion Failed !');
            }            
            
            $feedback_transient = $uw_freelancer->freelancer_transient(
                    'delete',
                    'feedback',
                    $uw_freelancer_options['user_id']
            );     

            if($feedback_transient == 'deleted'){
                add_settings_error('freelancer-transients', 'clear transients', 'Feedback Transient Deleted');
            } else {
                add_settings_error('freelancer-transients', 'clear transients', 'Feedback Transient Deletion Failed !');
            }               
        }
        
        add_settings_error('uw-freelancer', 'updated', 'UW Freelancer Transients Settings Saved', 'updated');
        
    } else if($reset_settings){
        
    }     
        
    $this->uw_freelancer_options = $valid_input;
    return $valid_input;
    }
    
    function print_freelancer_styles(){
        $uw_freelancer_styles = get_option('uw_freelancer_styles');
    ?>
        <style>
            .uw-freelancer-widget{
                border-style: solid;
                border-width: <?php echo $uw_freelancer_styles['border_width']; ?>;
                border-color: <?php echo $uw_freelancer_styles['border_color']; ?>;
                border-radius: <?php echo $uw_freelancer_styles['border_radius']; ?>;
                padding: <?php echo $uw_freelancer_styles['padding']; ?>;
                margin: <?php echo $uw_freelancer_styles['margin']; ?>;
                background-color: <?php echo $uw_freelancer_styles['background_color']; ?>;
            }    
        </style>
    <?php        
    }
    
    function freelancer_admin_scripts(){        
        if(isset( $_GET['page'] ) 
           && 'uw-freelancer-settings' == $_GET['page']
           && isset( $_GET['tab'] ) 
           && 'settings' == $_GET['tab'])
        {
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('freelancer-settings', plugins_url() . '/uw-freelancer/js/uw-freelancer-settings.js', 'jquery-ui-tabs', '1.0', true);
        wp_enqueue_style('jquery-style', plugins_url() . '/uw-freelancer/css/smoothness/jquery-ui-1.10.0.custom.min.css');
        }
    }
   
}
?>