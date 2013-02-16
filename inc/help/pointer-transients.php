<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

function pointer_transients($p){
   $p['uwf_dashboard'] = array(
      'target' => '.nav-tab-wrapper',
      'options' => array(
         'content' => sprintf( '<h3> %s </h3> <p> %s </p> <p> %s </p>',
             __( 'Customize Freelancer Widgets' ,'uwf'),
             __( 'You can customize the freelancer widget using the above tabs.','uwf'),
             __( 'To learn more about customization, see the contextual help.','uwf')
         ),
          'position' => array( 'edge' => 'top', 'align' => 'left' )
      )
    );
    return $p;  
}
?>
