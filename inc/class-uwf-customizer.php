<?php
class UW_Freelancer_Customizer{
    function __construct() {
        add_action( 'customize_register', array($this, 'customize_register') );
    }
    
    function customize_register($wp_customize){
    $wp_customize->add_section( 'uw_freelancer', array(
        'title'          => __( 'Freelancer Widget', 'uw' ),
        'priority'       => 35,
    ) );
        
    // Border Width ------------------------------------------------------------
    
    $wp_customize->add_setting( 'uw_freelancer_styles[border_width]', array(
        'default'        => '1px',
        'type'           => 'option',
        'transport'      => 'postMessage',
        'capability'     => 'manage_options',
    ) );        
    
    $wp_customize->add_control( 'adjust_border_width', array(
        'settings' => 'uw_freelancer_styles[border_width]',
        'label'    => 'Change border size',
        'section'  => 'uw_freelancer',
        'type'     => 'text',
    ) ); 
    
    // Border Color ------------------------------------------------------------
    
    $wp_customize->add_setting( 'uw_freelancer_styles[border_color]', array(
        'default'        => 'e6e6e6',
        'type'           => 'option',
        'transport'      => 'postMessage',
        'capability'     => 'manage_options',
    ) );           
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adjust_border_color', array(
        'label'   => 'Change border color',
        'section' => 'uw_freelancer',
        'settings'   => 'uw_freelancer_styles[border_color]',
    ) ) );    
    
    // Border Radius -----------------------------------------------------------
    
    $wp_customize->add_setting( 'uw_freelancer_styles[border_radius]', array(
        'default'        => '1px',
        'type'           => 'option',
        'transport'      => 'postMessage',
        'capability'     => 'manage_options',
    ) );        
    
    $wp_customize->add_control( 'adjust_border_radius', array(
        'settings' => 'uw_freelancer_styles[border_radius]',
        'label'    => 'Change border radius',
        'section'  => 'uw_freelancer',
        'type'     => 'text',
    ) );   
    
    // Widget Padding ----------------------------------------------------------
    
    $wp_customize->add_setting( 'uw_freelancer_styles[padding]', array(
        'default'        => '10px',
        'type'           => 'option',
        'transport'      => 'postMessage',
        'capability'     => 'manage_options',
    ) );        
    
    $wp_customize->add_control( 'adjust_widget_padding', array(
        'settings' => 'uw_freelancer_styles[padding]',
        'label'    => 'Change Widget Padding',
        'section'  => 'uw_freelancer',
        'type'     => 'text',
    ) );     
    
    // Widget Margin -----------------------------------------------------------
    
    $wp_customize->add_setting( 'uw_freelancer_styles[margin]', array(
        'default'        => '0',
        'type'           => 'option',
        'transport'      => 'postMessage',
        'capability'     => 'manage_options',
    ) );        
    
    $wp_customize->add_control( 'adjust_widget_margin', array(
        'settings' => 'uw_freelancer_styles[margin]',
        'label'    => 'Change Widget Margin',
        'section'  => 'uw_freelancer',
        'type'     => 'text',
    ) );    
    
    // Background Color ------------------------------------------------------------
    
    $wp_customize->add_setting( 'uw_freelancer_styles[background_color]', array(
        'default'        => 'f2f2f2',
        'type'           => 'option',
        'transport'      => 'postMessage',
        'capability'     => 'manage_options',
    ) );           
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'adjust_background_color', array(
        'label'   => 'Change background color',
        'section' => 'uw_freelancer',
        'settings'   => 'uw_freelancer_styles[background_color]',
    ) ) );      
    
    if ( $wp_customize->is_preview() && ! is_admin() )
        add_action( 'wp_footer', array($this, 'customize_preview'), 21);
    
    }
    
    function customize_preview(){
        ?>
        <script type="text/javascript">
        ( function( $ ){
        wp.customize('uw_freelancer_styles[border_width]',function( value ) {
            value.bind(function(to) {
                $('.uwf-widget').css('border-width', to ? to : '' );
            });
        });
        
        wp.customize('uw_freelancer_styles[border_color]',function( value ) {
            value.bind(function(to) {
                $('.uwf-widget').css('border-color', to ? to : '' );
            });
        });
        
        wp.customize('uw_freelancer_styles[background_color]',function( value ) {
            value.bind(function(to) {
                $('.uwf-widget').css('background-color', to ? to : '' );
            });
        });        

        wp.customize('uw_freelancer_styles[border_radius]',function( value ) {
            value.bind(function(to) {
                $('.uwf-widget').css('border-radius', to ? to : '' );
            });
        });
        
        wp.customize('uw_freelancer_styles[padding]',function( value ) {
            value.bind(function(to) {
                $('.uwf-widget').css('padding', to ? to : '' );
            });
        });    
        
        wp.customize('uw_freelancer_styles[margin]',function( value ) {
            value.bind(function(to) {
                $('.uwf-widget').css('margin', to ? to : '' );
            });
        });          
        } )( jQuery )
        </script>
        <?php    
        
        do_action('uwf-customizer-footer');
    }    
}
?>
