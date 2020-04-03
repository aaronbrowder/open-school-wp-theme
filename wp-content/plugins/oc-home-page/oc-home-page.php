<?php
/*
Plugin Name: OC Home Page
Description: 
Version: 1.1
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

function custom_text_callback($option_id, $rows) { ?>
   <textarea name="<?php echo $option_id; ?>" rows="<?php echo $rows; ?>" cols="70"><?php echo get_option($option_id); ?></textarea>
<?php }

function logo_image_attachment_callback() { 
   image_attachment_callback('logo-image-attachment-id');
}

function greenscreen_1_image_attachment_callback() { 
   image_attachment_callback('greenscreen-1-image-attachment-id');
}

function greenscreen_2_image_attachment_callback() { 
   image_attachment_callback('greenscreen-2-image-attachment-id');
}


function greenscreen_3_image_attachment_callback() { 
   image_attachment_callback('greenscreen-3-image-attachment-id');
}

function greenscreen_4_image_attachment_callback() { 
   image_attachment_callback('greenscreen-4-image-attachment-id');
}

function greenscreen_5_image_attachment_callback() { 
   image_attachment_callback('greenscreen-5-image-attachment-id');
}

function new_banner_1_image_attachment_callback() { 
   image_attachment_callback('new-banner-1-image-attachment-id');
}

function new_banner_1_es_image_attachment_callback() { 
   image_attachment_callback('new-banner-1-image-attachment-id-es');
}

function new_banner_2_image_attachment_callback() { 
   image_attachment_callback('new-banner-2-image-attachment-id');
}

function new_banner_2_es_image_attachment_callback() { 
   image_attachment_callback('new-banner-2-image-attachment-id-es');
}

function new_banner_3_image_attachment_callback() { 
   image_attachment_callback('new-banner-3-image-attachment-id');
}

function new_banner_3_es_image_attachment_callback() { 
   image_attachment_callback('new-banner-3-image-attachment-id-es');
}

function nonprofit_image_attachment_callback() { 
   image_attachment_callback('nonprofit-image-attachment-id');
}

function notice_text_callback() {
   custom_text_callback('notice-text', 1);
}

function notice_url_callback() { ?>
   <input type="text" name="notice-url" size="50" value="<?php echo get_option('notice-url'); ?>" />
<?php }

function school_description_callback() {
   custom_text_callback('school-description', 3);
}

function school_description_es_callback() {
   custom_text_callback('school-description-es', 3);
}

function second_banner_header_callback() { ?>
   <input type="text" name="second-banner-header" size="20" value="<?php echo get_option('second-banner-header'); ?>" />
<?php }

function second_banner_header_es_callback() { ?>
   <input type="text" name="second-banner-header-es" size="20" value="<?php echo get_option('second-banner-header-es'); ?>" />
<?php }

function second_banner_text_callback() {
   custom_text_callback('second-banner-text', 4);
}

function second_banner_text_es_callback() {
   custom_text_callback('second-banner-text-es', 4);
}

function enrollment_message_callback() { ?>
   <input type="text" name="enrollment-message" size="20" value="<?php echo get_option('enrollment-message'); ?>" />
<?php }

function enrollment_message_es_callback() { ?>
   <input type="text" name="enrollment-message-es" size="20" value="<?php echo get_option('enrollment-message-es'); ?>" />
<?php }

function apply_button_text_callback() { ?>
   <input type="text" name="apply-button-text" size="20" value="<?php echo get_option('apply-button-text'); ?>" />
<?php }

function apply_button_text_es_callback() { ?>
   <input type="text" name="apply-button-text-es" size="20" value="<?php echo get_option('apply-button-text-es'); ?>" />
<?php }

function subscribe_message_callback() { ?>
   <input type="text" name="subscribe-message" size="20" value="<?php echo get_option('subscribe-message'); ?>" />
<?php }

function subscribe_message_es_callback() { ?>
   <input type="text" name="subscribe-message-es" size="20" value="<?php echo get_option('subscribe-message-es'); ?>" />
<?php }

function subscribe_button_text_callback() { ?>
   <input type="text" name="subscribe-button-text" size="20" value="<?php echo get_option('subscribe-button-text'); ?>" />
<?php }

function subscribe_button_text_es_callback() { ?>
   <input type="text" name="subscribe-button-text-es" size="20" value="<?php echo get_option('subscribe-button-text-es'); ?>" />
<?php }

function subscribe_url_callback() { ?>
   <input type="text" name="subscribe-url" size="20" value="<?php echo get_option('subscribe-url'); ?>" />
<?php }

function events_header_callback() { ?>
   <input type="text" name="events-header" size="20" value="<?php echo get_option('events-header'); ?>" />
<?php }

function events_header_es_callback() { ?>
   <input type="text" name="events-header-es" size="20" value="<?php echo get_option('events-header-es'); ?>" />
<?php }

function event1_title_callback() { ?>
  <input type="text" name="event1-title" size="20" value="<?php echo get_option('event1-title'); ?>" />
<?php }

function event1_title_es_callback() { ?>
  <input type="text" name="event1-title-es" size="20" value="<?php echo get_option('event1-title-es'); ?>" />
<?php }

function event1_url_callback() { ?>
  <input type="text" name="event1-url" size="50" value="<?php echo get_option('event1-url'); ?>" />
<?php }

function event1_url_es_callback() { ?>
  <input type="text" name="event1-url-es" size="50" value="<?php echo get_option('event1-url-es'); ?>" />
<?php }

function event1_line1_callback() { ?>
  <input type="text" name="event1-line1" size="25" value="<?php echo get_option('event1-line1'); ?>" />
<?php }

function event1_line1_es_callback() { ?>
  <input type="text" name="event1-line1-es" size="25" value="<?php echo get_option('event1-line1-es'); ?>" />
<?php }

function event1_line2_callback() { ?>
  <input type="text" name="event1-line2" size="25" value="<?php echo get_option('event1-line2'); ?>" />
<?php }

function event1_line2_es_callback() { ?>
  <input type="text" name="event1-line2-es" size="25" value="<?php echo get_option('event1-line2-es'); ?>" />
<?php }

function event2_title_callback() { ?>
  <input type="text" name="event2-title" size="20" value="<?php echo get_option('event2-title'); ?>" />
<?php }

function event2_title_es_callback() { ?>
  <input type="text" name="event2-title-es" size="20" value="<?php echo get_option('event2-title-es'); ?>" />
<?php }

function event2_url_callback() { ?>
  <input type="text" name="event2-url" size="50" value="<?php echo get_option('event2-url'); ?>" />
<?php }

function event2_url_es_callback() { ?>
  <input type="text" name="event2-url-es" size="50" value="<?php echo get_option('event2-url-es'); ?>" />
<?php }

function event2_line1_callback() { ?>
  <input type="text" name="event2-line1" size="25" value="<?php echo get_option('event2-line1'); ?>" />
<?php }

function event2_line1_es_callback() { ?>
  <input type="text" name="event2-line1-es" size="25" value="<?php echo get_option('event2-line1-es'); ?>" />
<?php }

function event2_line2_callback() { ?>
  <input type="text" name="event2-line2" size="25" value="<?php echo get_option('event2-line2'); ?>" />
<?php }

function event2_line2_es_callback() { ?>
  <input type="text" name="event2-line2-es" size="25" value="<?php echo get_option('event2-line2-es'); ?>" />
<?php }

function testimonial1_callback() {
   custom_text_callback('testimonial1', 6);
}

function testimonial1_es_callback() {
   custom_text_callback('testimonial1-es', 6);
}

function testimonial1_attribution_callback() { ?>
   <input type="text" name="testimonial1-attribution" size="30" value="<?php echo get_option('testimonial1-attribution'); ?>" />
<?php }

function testimonial1_attribution_es_callback() { ?>
   <input type="text" name="testimonial1-attribution-es" size="30" value="<?php echo get_option('testimonial1-attribution-es'); ?>" />
<?php }

function testimonial2_callback() {
   custom_text_callback('testimonial2', 6);
}

function testimonial2_es_callback() {
   custom_text_callback('testimonial2-es', 6);
}

function testimonial2_attribution_callback() { ?>
   <input type="text" name="testimonial2-attribution" size="30" value="<?php echo get_option('testimonial2-attribution'); ?>" />
<?php }

function testimonial2_attribution_es_callback() { ?>
   <input type="text" name="testimonial2-attribution-es" size="30" value="<?php echo get_option('testimonial2-attribution-es'); ?>" />
<?php }

add_action('admin_init', 'edit_home_page_page_setup');
function edit_home_page_page_setup() {
   wp_enqueue_media();
   add_settings_section('content', 'Content', null, 'edit-home-page');
   
   add_settings_field('logo-image-attachment-id', 'Logo', 'logo_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-1-image-attachment-id', 'Greenscreen 1', 'greenscreen_1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-2-image-attachment-id', 'Greenscreen 2', 'greenscreen_2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-3-image-attachment-id', 'Greenscreen 3', 'greenscreen_3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-4-image-attachment-id', 'Greenscreen 4', 'greenscreen_4_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-5-image-attachment-id', 'Greenscreen 5', 'greenscreen_5_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-1-image-attachment-id', 'New Banner 1', 'new_banner_1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-1-image-attachment-id-es', 'New Banner 1 (Spanish)', 'new_banner_1_es_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-2-image-attachment-id', 'New Banner 2', 'new_banner_2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-2-image-attachment-id-es', 'New Banner 2 (Spanish)', 'new_banner_2_es_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-3-image-attachment-id', 'New Banner 3', 'new_banner_3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('new-banner-3-image-attachment-id-es', 'New Banner 3 (Spanish)', 'new_banner_3_es_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('nonprofit-image-attachment-id', 'Nonprofit Badge', 'nonprofit_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('school-description', 'School Description', 'school_description_callback', 'edit-home-page', 'content');
   add_settings_field('school-description-es', 'School Description (Spanish)', 'school_description_es_callback', 'edit-home-page', 'content');
   add_settings_field('notice-text', 'Notice Text', 'notice_text_callback', 'edit-home-page', 'content');
   add_settings_field('notice-url', 'Notice URL', 'notice_url_callback', 'edit-home-page', 'content');
   add_settings_field('second-banner-header', '2nd Banner Header', 'second_banner_header_callback', 'edit-home-page', 'content');
   add_settings_field('second-banner-header-es', '2nd Banner Header (Spanish)', 'second_banner_header_es_callback', 'edit-home-page', 'content');
   add_settings_field('second-banner-text', '2nd Banner Text', 'second_banner_text_callback', 'edit-home-page', 'content');
   add_settings_field('second-banner-text-es', '2nd Banner Text (Spanish)', 'second_banner_text_es_callback', 'edit-home-page', 'content');
   add_settings_field('enrollment-message', 'Enrollment Message', 'enrollment_message_callback', 'edit-home-page', 'content');
   add_settings_field('enrollment-message-es', 'Enrollment Message (Spanish)', 'enrollment_message_es_callback', 'edit-home-page', 'content');
   add_settings_field('apply-button-text', 'Apply Button Text', 'apply_button_text_callback', 'edit-home-page', 'content');
   add_settings_field('apply-button-text-es', 'Apply Button Text (Spanish)', 'apply_button_text_es_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-message', 'Subscribe Message', 'subscribe_message_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-message-es', 'Subscribe Message (Spanish)', 'subscribe_message_es_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-button-text', 'Subscribe Button Text', 'subscribe_button_text_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-button-text-es', 'Subscribe Button Text (Spanish)', 'subscribe_button_text_es_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-url', 'Subscribe URL', 'subscribe_url_callback', 'edit-home-page', 'content');
   add_settings_field('events-header', 'Events Header', 'events_header_callback', 'edit-home-page', 'content');
   add_settings_field('events-header-es', 'Events Header (Spanish)', 'events_header_es_callback', 'edit-home-page', 'content');
   add_settings_field('event1-title', 'Event 1 Title', 'event1_title_callback', 'edit-home-page', 'content');
   add_settings_field('event1-url', 'Event 1 URL', 'event1_url_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line1', 'Event 1 Line 1', 'event1_line1_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line2', 'Event 1 Line 2', 'event1_line2_callback', 'edit-home-page', 'content');
   add_settings_field('event1-title-es', 'Event 1 Title (Spanish)', 'event1_title_es_callback', 'edit-home-page', 'content');
   add_settings_field('event1-url-es', 'Event 1 URL (Spanish)', 'event1_url_es_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line1-es', 'Event 1 Line 1 (Spanish)', 'event1_line1_es_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line2-es', 'Event 1 Line 2 (Spanish', 'event1_line2_es_callback', 'edit-home-page', 'content');
   add_settings_field('event2-title', 'Event 2 Title', 'event2_title_callback', 'edit-home-page', 'content');
   add_settings_field('event2-url', 'Event 2 URL', 'event2_url_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line1', 'Event 2 Line 1', 'event2_line1_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line2', 'Event 2 Line 2', 'event2_line2_callback', 'edit-home-page', 'content');
   add_settings_field('event2-title-es', 'Event 2 Title (Spanish)', 'event2_title_es_callback', 'edit-home-page', 'content');
   add_settings_field('event2-url-es', 'Event 2 URL (Spanish)', 'event2_url_es_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line1-es', 'Event 2 Line 1 (Spanish)', 'event2_line1_es_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line2-es', 'Event 2 Line 2 (Spanish)', 'event2_line2_es_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial1', 'Testimonial 1', 'testimonial1_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial1-attribution', 'Testimonial 1 Attribution', 'testimonial1_attribution_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial1-es', 'Testimonial 1 (Spanish)', 'testimonial1_es_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial1-attribution-es', 'Testimonial 1 Attribution (Spanish)', 'testimonial1_attribution_es_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2', 'Testimonial 2', 'testimonial2_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2-attribution', 'Testimonial 2 Attribution', 'testimonial2_attribution_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2-es', 'Testimonial 2 (Spanish)', 'testimonial2_es_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2-attribution-es', 'Testimonial 2 Attribution (Spanish)', 'testimonial2_attribution_es_callback', 'edit-home-page', 'content');

   register_setting('edit-home-page', 'logo-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-1-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-2-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-3-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-4-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-5-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-1-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-1-image-attachment-id-es');
   register_setting('edit-home-page', 'new-banner-2-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-2-image-attachment-id-es');
   register_setting('edit-home-page', 'new-banner-3-image-attachment-id');
   register_setting('edit-home-page', 'new-banner-3-image-attachment-id-es');
   register_setting('edit-home-page', 'nonprofit-image-attachment-id');
   register_setting('edit-home-page', 'notice-text');
   register_setting('edit-home-page', 'notice-url');
   register_setting('edit-home-page', 'school-description');
   register_setting('edit-home-page', 'school-description-es');
   register_setting('edit-home-page', 'second-banner-header');
   register_setting('edit-home-page', 'second-banner-header-es');
   register_setting('edit-home-page', 'second-banner-text');
   register_setting('edit-home-page', 'second-banner-text-es');
   register_setting('edit-home-page', 'enrollment-message');
   register_setting('edit-home-page', 'enrollment-message-es');
   register_setting('edit-home-page', 'apply-button-text');
   register_setting('edit-home-page', 'apply-button-text-es');
   register_setting('edit-home-page', 'subscribe-message');
   register_setting('edit-home-page', 'subscribe-message-es');
   register_setting('edit-home-page', 'subscribe-button-text');
   register_setting('edit-home-page', 'subscribe-button-text-es');
   register_setting('edit-home-page', 'subscribe-url');
   register_setting('edit-home-page', 'events-header');
   register_setting('edit-home-page', 'events-header-es');
   register_setting('edit-home-page', 'event1-title');
   register_setting('edit-home-page', 'event1-url');
   register_setting('edit-home-page', 'event1-line1');
   register_setting('edit-home-page', 'event1-line2');
   register_setting('edit-home-page', 'event1-title-es');
   register_setting('edit-home-page', 'event1-url-es');
   register_setting('edit-home-page', 'event1-line1-es');
   register_setting('edit-home-page', 'event1-line2-es');
   register_setting('edit-home-page', 'event2-title');
   register_setting('edit-home-page', 'event2-url');
   register_setting('edit-home-page', 'event2-line1');
   register_setting('edit-home-page', 'event2-line2');
   register_setting('edit-home-page', 'event2-title-es');
   register_setting('edit-home-page', 'event2-url-es');
   register_setting('edit-home-page', 'event2-line1-es');
   register_setting('edit-home-page', 'event2-line2-es');
   register_setting('edit-home-page', 'testimonial1');
   register_setting('edit-home-page', 'testimonial1-attribution');
   register_setting('edit-home-page', 'testimonial1-es');
   register_setting('edit-home-page', 'testimonial1-attribution-es');
   register_setting('edit-home-page', 'testimonial2');
   register_setting('edit-home-page', 'testimonial2-attribution');
   register_setting('edit-home-page', 'testimonial2-es');
   register_setting('edit-home-page', 'testimonial2-attribution-es');
}
