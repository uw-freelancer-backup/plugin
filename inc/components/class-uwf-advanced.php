<?php

class UW_Freelancer_Advanced{
   
   private $hook_suffix;
   
   function __construct() {
      add_action('admin_menu', array($this,'add_page'));
      add_action('add_meta_boxes',array($this,'metaboxes'));
   }
   
   function metaboxes(){
      
      $screen_id = WP_Screen::get($this->hook_suffix);
      
		add_meta_box('feeds',__('WordPress Freelancer Feeds', 'uwf'),array($this, 'metabox'),$screen_id,'normal','high');
		add_meta_box('uwf_tracker', __('Freelancer Tracker', 'uwf'),array($this, 'metabox'),$screen_id,'side','high');      
      add_meta_box('uwf_tour', __('Freelancer Tour', 'uwf'),array($this, 'metabox'),$screen_id,'side','low');      
      add_meta_box('uwf_tracker', __('Freelancer Subscribe', 'uwf'),array($this, 'metabox'),$screen_id,'side','high');      
   }
   
	function metabox(){
		?>
		<p> An example of a metabox <p>
		<?php
	}   

   function add_page(){
      $this->hook_suffix = add_submenu_page(
              'uw-freelancer-settings', 
              __('Advanced Settings', 'uwf'), 
              __('Settings', 'uwf'),
              'manage_options',
              'uw-freelancer-advanced-settings',
              array($this, 'freelancer_advanced_settings'));
		add_action('load-'.$this->hook_suffix,  array($this,'page_actions'),9);
		add_action('admin_footer-'.$this->hook_suffix,array($this,'footer_scripts'));      
   }
   
   function page_actions(){
		do_action('add_meta_boxes_'.$this->hook_suffix, null);
		do_action('add_meta_boxes', $this->hook_suffix, null);
		add_screen_option('layout_columns', array('max' => 2, 'default' => 2) );
		wp_enqueue_script('postbox');       
   }
   
   function footer_scripts(){
		?>
		<script> postboxes.add_postbox_toggles(pagenow);</script>
		<?php      
   }

   function freelancer_advanced_settings(){
		?>
		 <div class="wrap">

			<?php echo '<div id="uwf-icon" class="icon32"><br /></div>'; ?>

			 <h2><?php _e('Advanced Settings', 'uwf'); ?></h2>

			<form name="my_form" method="post">  
				<input type="hidden" name="action" value="some-action">
				<?php wp_nonce_field( 'some-action-nonce' );

				wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false );
				wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>

				<div id="poststuff">
		
					 <div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>"> 

						  <div id="post-body-content">
							<?php $this->body_content(); ?>
						  </div>    

						  <div id="postbox-container-1" class="postbox-container">
						        <?php do_meta_boxes('','side',null); ?>
						  </div>    

						  <div id="postbox-container-2" class="postbox-container">
						        <?php do_meta_boxes('','normal',null);  ?>
						        <?php do_meta_boxes('','advanced',null); ?>
						  </div>	     					

					 </div> <!-- #post-body -->
				
				 </div> <!-- #poststuff -->

         </form>			

		 </div><!-- .wrap -->
		<?php
	}
   
	function body_content(){
		?>
		<p> WordPress Freelancer Advanced Settings allows you to further configure WordPress Freelancer Plugin.<p>

		<p> To configure Freelancer Widget, visit dashboard section. For transients related settings, visit transients section.<p>
         
      <p> You can allow the freelancer tracker for tracking basic information about your site.
      View the latest posts about WordPress Freelancer Plugin through the News section. If you missed the 
      initial plugin tour, you can restart the tour. Subscribe for important email alerts.</p>   
	<?php
	}
}
?>
