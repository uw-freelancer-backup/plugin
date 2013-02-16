<?php
class UW_Freelancer_Pointer{
   
   function __construct() {
      add_action( 'admin_enqueue_scripts', array($this,'pointer_load'));      
   }

   function pointer_load($hook_suffix){
      if ( get_bloginfo( 'version' ) < '3.3' )
          return;

      $pointers = apply_filters("uwf_admin_pointers-{$hook_suffix}", array() );

      if ( ! $pointers || ! is_array( $pointers ) )
          return;    
      
      $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
      $valid_pointers = array();

      foreach ( $pointers as $pointer_id => $pointer ) {

          if ( in_array( $pointer_id, $dismissed ) || empty( $pointer )  || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) )
              continue;

          $pointer['pointer_id'] = $pointer_id;

          $valid_pointers['pointers'][] = $pointer;
      }

      if ( empty( $valid_pointers ) )
          return;      
      
      wp_enqueue_style( 'wp-pointer' );

      wp_enqueue_script( 'uwf-pointer', UWF_URL . 'js/uw-freelancer-pointer.js', array( 'wp-pointer' ) );

      wp_localize_script( 'uwf-pointer', 'uwfPointer', $valid_pointers );      
      
   }
   
}
?>
