<?php
if( !defined( 'ABSPATH' ) ){
    header('HTTP/1.0 403 Forbidden');
    die('No Direct Access Allowed!');
}

function pointer_console($p){
   $p['uwf_console'] = array(
      'target' => '#icon-themes',
      'options' => array(
         'content' => sprintf( '<h3> %s </h3> <p> %s </p> <p> %s </p>',
             __( 'Query Freelancer.com API' ,'uwf'),
             __( 'You can directly query the freelancer.com api within your admin dashboard.','uwf'),
             __( 'See contextual help for more details.','uwf')
         ),
          'position' => array( 'edge' => 'top', 'align' => 'left' )
      )
    );
    return $p;  
}
?>
