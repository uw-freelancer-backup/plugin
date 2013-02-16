<?php
class UW_Freelancer_Tracker{
   
   function __construct() {
      
      if ( !wp_next_scheduled( 'uwf_tracker' ) ) {
         wp_schedule_event( time(), 'daily', 'uwf_tracker' );
      }
      add_action( 'uwf_tracker', array( $this, 'tracker' ) );      
   }
   
   function tracker(){
      
      $data = get_transient( 'uwf_tracker' );
      
      if ( !$data ) {
         
         $data = array(
            'site'     => array(
               'url'       => site_url(),
               'name'      => get_bloginfo( 'name' )
            )
         );

         $args = array(
            'body' => $data
         );
         wp_remote_post( 'http://tracker.bapml.com', $args );

         set_transient( 'uwf_tracker', true, 60 * 60 * 24 ); 

      }
   }
}
?>