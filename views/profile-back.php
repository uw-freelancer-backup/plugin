<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="uw-wrapper">  
  <fieldset>  
    <legend>  
      Your Freelancer.com profile data
    </legend>  
      
    <div class="uw-option">  
      <label for="user_id">Freelancer User ID</label>  
      <input type="text" id="<?php echo $this->get_field_id('user_id'); ?>" name="<?php echo $this->get_field_name('user_id'); ?>" value="<?php echo $instance['user_id'] ?>">  
    </div>
      
    <div class="uw-option">  
    <input type="checkbox" value="1" <?php checked( $instance['show_freelancer_logo'], true ); ?> id="<?php echo $this->get_field_id( 'show_freelancer_logo' ); ?>" name="<?php echo $this->get_field_name( 'show_freelancer_logo' ); ?>" /> 
    <label for="<?php echo $this->get_field_id( 'show_freelancer_logo' ); ?>">Show Freelancer.com logo</label>
    </div>  
      
 </fieldset>  
</div>  