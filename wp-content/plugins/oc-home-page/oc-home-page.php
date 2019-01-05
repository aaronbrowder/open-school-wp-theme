<?php
/*
Plugin Name: OC Home Page
Description: 
Version: 1.0
Author: Aaron Browder
*/

//////////////////////////////////////////////////////////////////////
// Edit home page

add_action('admin_menu', 'edit_home_page_add_menu');
function edit_home_page_add_menu() {
   add_menu_page('Edit_Home_Page', 'Home Page', 'manage_options', 'edit_home_page', 'edit_home_page_page', null, 4);
}

function edit_home_page_page() { ?>
   <div class="wrap">
      <h1>Edit Home Page</h1>
      <form method="post" action="options.php">
         <?php
            settings_fields('edit-home-page');
            do_settings_sections('edit-home-page');
            submit_button();
         ?>
      </form>
   </div>
<?php }

function image_attachment_callback($option_id) { 
   $image_attachment_id = get_option($option_id);
   ?>
      <div class="image-preview-wrapper">
   		<img class="image-preview" src="<?php echo wp_get_attachment_url($image_attachment_id); ?>" height="100"/>
   	</div>
   	<input class="upload-image-button button" type="button" value="<?php _e('Select Image'); ?>" />
   	<input type="hidden" name="<?php echo $option_id; ?>" class="image-attachment-id" value="<?php echo $image_attachment_id; ?>">
   <?php
}

function logo_image_attachment_callback() { 
   image_attachment_callback('logo-image-attachment-id');
}

function greenscreen_1_image_attachment_callback() { 
   image_attachment_callback('greenscreen-1-image-attachment-id');
}

function greenscreen_1_tiny_image_attachment_callback() { 
   image_attachment_callback('greenscreen-1-tiny-image-attachment-id');
}

function greenscreen_2_image_attachment_callback() { 
   image_attachment_callback('greenscreen-2-image-attachment-id');
}

function greenscreen_2_tiny_image_attachment_callback() { 
   image_attachment_callback('greenscreen-2-tiny-image-attachment-id');
}

function greenscreen_3_image_attachment_callback() { 
   image_attachment_callback('greenscreen-3-image-attachment-id');
}

function greenscreen_3_tiny_image_attachment_callback() { 
   image_attachment_callback('greenscreen-3-tiny-image-attachment-id');
}

function greenscreen_4_image_attachment_callback() { 
   image_attachment_callback('greenscreen-4-image-attachment-id');
}

function greenscreen_4_tiny_image_attachment_callback() { 
   image_attachment_callback('greenscreen-4-tiny-image-attachment-id');
}

function greenscreen_5_image_attachment_callback() { 
   image_attachment_callback('greenscreen-5-image-attachment-id');
}

function greenscreen_5_tiny_image_attachment_callback() { 
   image_attachment_callback('greenscreen-5-tiny-image-attachment-id');
}

function new_banner_1_image_attachment_callback() { 
   image_attachment_callback('new-banner-1-image-attachment-id');
}

function new_banner_1_tiny_image_attachment_callback() { 
   image_attachment_callback('new-banner-1-tiny-image-attachment-id');
}

function new_banner_2_image_attachment_callback() { 
   image_attachment_callback('new-banner-2-image-attachment-id');
}

function new_banner_2_tiny_image_attachment_callback() { 
   image_attachment_callback('new-banner-2-tiny-image-attachment-id');
}

function new_banner_3_image_attachment_callback() { 
   image_attachment_callback('new-banner-3-image-attachment-id');
}

function new_banner_3_tiny_image_attachment_callback() { 
   image_attachment_callback('new-banner-3-tiny-image-attachment-id');
}

function nonprofit_image_attachment_callback() { 
   image_attachment_callback('nonprofit-image-attachment-id');
}

function event1_title_callback() { ?>
  <input type="text" name="event1-title" size="20" value="<?php echo get_option('event1-title'); ?>" />
<?php }

function event1_url_callback() { ?>
  <input type="text" name="event1-url" size="50" value="<?php echo get_option('event1-url'); ?>" />
<?php }

function event1_line1_callback() { ?>
  <input type="text" name="event1-line1" size="25" value="<?php echo get_option('event1-line1'); ?>" />
<?php }

function event1_line2_callback() { ?>
  <input type="text" name="event1-line2" size="25" value="<?php echo get_option('event1-line2'); ?>" />
<?php }

function event2_title_callback() { ?>
  <input type="text" name="event2-title" size="20" value="<?php echo get_option('event2-title'); ?>" />
<?php }

function event2_url_callback() { ?>
  <input type="text" name="event2-url" size="50" value="<?php echo get_option('event2-url'); ?>" />
<?php }

function event2_line1_callback() { ?>
  <input type="text" name="event2-line1" size="25" value="<?php echo get_option('event2-line1'); ?>" />
<?php }

function event2_line2_callback() { ?>
  <input type="text" name="event2-line2" size="25" value="<?php echo get_option('event2-line2'); ?>" />
<?php }

add_action('admin_init', 'edit_home_page_page_setup');
function edit_home_page_page_setup() {
   wp_enqueue_media();
   add_settings_section('content', 'Content', null, 'edit-home-page');
   
   add_settings_field('logo-image-attachment-id', 'Logo', 'logo_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-1-image-attachment-id', 'Greenscreen 1', 'greenscreen_1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-1-tiny-image-attachment-id', 'Greenscreen 1 Tiny', 'greenscreen_1_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-2-image-attachment-id', 'Greenscreen 2', 'greenscreen_2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-2-tiny-image-attachment-id', 'Greenscreen 2 Tiny', 'greenscreen_2_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-3-image-attachment-id', 'Greenscreen 3', 'greenscreen_3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-3-tiny-image-attachment-id', 'Greenscreen 3 Tiny', 'greenscreen_3_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-4-image-attachment-id', 'Greenscreen 4', 'greenscreen_4_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-4-tiny-image-attachment-id', 'Greenscreen 4 Tiny', 'greenscreen_4_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-5-image-attachment-id', 'Greenscreen 5', 'greenscreen_5_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-5-tiny-image-attachment-id', 'Greenscreen 5 Tiny', 'greenscreen_5_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-1-image-attachment-id', 'New Banner 1', 'new_banner_1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-1-tiny-image-attachment-id', 'New Banner 1 Tiny', 'new_banner_1_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-2-image-attachment-id', 'New Banner 2', 'new_banner_2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-2-tiny-image-attachment-id', 'New Banner 2 Tiny', 'new_banner_2_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-3-image-attachment-id', 'New Banner 3', 'new_banner_3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-3-tiny-image-attachment-id', 'New Banner 3 Tiny', 'new_banner_3_tiny_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('nonprofit-image-attachment-id', 'Nonprofit Badge', 'nonprofit_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('event1-title', 'Event 1 Title', 'event1_title_callback', 'edit-home-page', 'content');
   add_settings_field('event1-url', 'Event 1 URL', 'event1_url_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line1', 'Event 1 Line 1', 'event1_line1_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line2', 'Event 1 Line 2', 'event1_line2_callback', 'edit-home-page', 'content');
   add_settings_field('event2-title', 'Event 2 Title', 'event2_title_callback', 'edit-home-page', 'content');
   add_settings_field('event2-url', 'Event 2 URL', 'event2_url_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line1', 'Event 2 Line 1', 'event2_line1_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line2', 'Event 2 Line 2', 'event2_line2_callback', 'edit-home-page', 'content');

   register_setting('edit-home-page', 'logo-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-1-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-1-tiny-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-2-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-2-tiny-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-3-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-3-tiny-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-4-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-4-tiny-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-5-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-5-tiny-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-1-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-1-tiny-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-2-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-2-tiny-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-3-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-3-tiny-image-attachment-id');
   register_setting('edit-home-page', 'nonprofit-image-attachment-id');
   register_setting('edit-home-page', 'event1-title');
   register_setting('edit-home-page', 'event1-url');
   register_setting('edit-home-page', 'event1-line1');
   register_setting('edit-home-page', 'event1-line2');
   register_setting('edit-home-page', 'event2-title');
   register_setting('edit-home-page', 'event2-url');
   register_setting('edit-home-page', 'event2-line1');
   register_setting('edit-home-page', 'event2-line2');
}
