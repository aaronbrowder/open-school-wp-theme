<?php
/*
Plugin Name: OC Home Page
Description: 
Version: 1.1.6
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

function greenscreen_1_image_attachment_callback() { 
   image_attachment_callback('greenscreen-1-image-attachment-id');
}

function greenscreen_2_image_attachment_callback() { 
   image_attachment_callback('greenscreen-2-image-attachment-id');
}

function greenscreen_3_image_attachment_callback() { 
   image_attachment_callback('greenscreen-3-image-attachment-id');
}

function metrics_image_attachment_callback() { 
   image_attachment_callback('metrics-image-attachment-id');
}

function testimonials_image_attachment_callback() { 
   image_attachment_callback('testimonials-image-attachment-id');
}

function announcements_image_attachment_callback() { 
   image_attachment_callback('announcements-image-attachment-id');
}

function notice_text_callback() {
   custom_text_callback('notice-text', 1);
}

function notice_url_callback() { ?>
   <input type="text" name="notice-url" size="50" value="<?php echo get_option('notice-url'); ?>" />
<?php }

function key_message_1_callback() {
   custom_text_callback('key-message-1', 2);
}

function key_message_2_callback() {
   custom_text_callback('key-message-2', 2);
}

function key_message_3_callback() {
   custom_text_callback('key-message-3', 2);
}

function key_message_link_callback() {
   custom_text_callback('key-message-link', 1);
}

function key_message_link_text_callback() {
   custom_text_callback('key-message-link-text', 1);
}

function long_key_message_1_callback() {
   custom_text_callback('long-key-message-1', 3);
}

function long_key_message_2_callback() {
   custom_text_callback('long-key-message-2', 3);
}

function long_key_message_3_callback() {
   custom_text_callback('long-key-message-3', 3);
}

function long_key_message_4_callback() {
   custom_text_callback('long-key-message-4', 3);
}

function long_key_message_5_callback() {
   custom_text_callback('long-key-message-5', 3);
}

function open_house_url_callback() {
   custom_text_callback('open-house-url', 1);
}

function open_house_text_callback() {
   custom_text_callback('open-house-text', 1);
}

function metric_1_number_callback() {
   custom_text_callback('metric-1-number', 1);
}

function metric_1_text_callback() {
   custom_text_callback('metric-1-text', 1);
}

function metric_2_number_callback() {
   custom_text_callback('metric-2-number', 1);
}

function metric_2_text_callback() {
   custom_text_callback('metric-2-text', 1);
}

function metric_3_number_callback() {
   custom_text_callback('metric-3-number', 1);
}

function metric_3_text_callback() {
   custom_text_callback('metric-3-text', 1);
}

function metric_4_number_callback() {
   custom_text_callback('metric-4-number', 1);
}

function metric_4_text_callback() {
   custom_text_callback('metric-4-text', 1);
}

function second_banner_header_callback() {
   custom_text_callback('second-banner-header', 1);
}

function enrollment_message_callback() {
   custom_text_callback('enrollment-message', 1);
}

function apply_button_text_callback() {
   custom_text_callback('apply-button-text', 1);
}

function subscribe_message_callback() {
   custom_text_callback('subscribe-message', 1);
}

function subscribe_button_text_callback() {
   custom_text_callback('subscribe-button-text', 1);
}

function subscribe_url_callback() {
   custom_text_callback('subscribe-url', 1);
}

function events_header_callback() {
   custom_text_callback('events-header', 1);
}

function event1_title_callback() {
   custom_text_callback('event1-title', 1);
}

function event1_url_callback() {
   custom_text_callback('event1-url', 1);
}

function event1_line1_callback() {
   custom_text_callback('event1-line1', 1);
}

function event1_line2_callback() {
   custom_text_callback('event1-line2', 1);
}

function event2_title_callback() {
   custom_text_callback('event2-title', 1);
}

function event2_url_callback() {
   custom_text_callback('event2-url', 1);
}

function event2_line1_callback() {
   custom_text_callback('event2-line1', 1);
}

function event2_line2_callback() {
   custom_text_callback('event2-line2', 1);
}

function promoted_event_url_callback() {
   custom_text_callback('promoted-event-url', 1);
}

function promoted_event_image_attachment_callback() { 
   image_attachment_callback('promoted-event-image-attachment-id');
}

function testimonial1_callback() {
   custom_text_callback('testimonial1', 3);
}

function testimonial2_callback() {
   custom_text_callback('testimonial2', 3);
}

function testimonial3_callback() {
   custom_text_callback('testimonial3', 3);
}

function testimonial4_callback() {
   custom_text_callback('testimonial4', 3);
}

function testimonial5_callback() {
   custom_text_callback('testimonial5', 3);
}

add_action('admin_init', 'edit_home_page_page_setup');
function edit_home_page_page_setup() {
   wp_enqueue_media();
   add_settings_section('content', 'Content', null, 'edit-home-page');
   
   add_settings_field('greenscreen-1-image-attachment-id', 'Greenscreen 1', 'greenscreen_1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-2-image-attachment-id', 'Greenscreen 2', 'greenscreen_2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('greenscreen-3-image-attachment-id', 'Greenscreen 3', 'greenscreen_3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('metrics-image-attachment-id', 'Metrics Image', 'metrics_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('testimonials-image-attachment-id', 'Testimonials Image', 'testimonials_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('announcements-image-attachment-id', 'Announcements Image', 'announcements_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('key-message-1', 'Key Message 1', 'key_message_1_callback', 'edit-home-page', 'content');
   add_settings_field('key-message-2', 'Key Message 2', 'key_message_2_callback', 'edit-home-page', 'content');
   add_settings_field('key-message-3', 'Key Message 3', 'key_message_3_callback', 'edit-home-page', 'content');
   add_settings_field('key-message-link', 'Key Message Link', 'key_message_link_callback', 'edit-home-page', 'content');
   add_settings_field('key-message-link-text', 'Key Message Link Text', 'key_message_link_text_callback', 'edit-home-page', 'content');
   add_settings_field('second-banner-header', '2nd Banner Header', 'second_banner_header_callback', 'edit-home-page', 'content');
   add_settings_field('long-key-message-1', 'Long Key Message 1', 'long_key_message_1_callback', 'edit-home-page', 'content');
   add_settings_field('long-key-message-2', 'Long Key Message 2', 'long_key_message_2_callback', 'edit-home-page', 'content');
   add_settings_field('long-key-message-3', 'Long Key Message 3', 'long_key_message_3_callback', 'edit-home-page', 'content');
   add_settings_field('long-key-message-4', 'Long Key Message 4', 'long_key_message_4_callback', 'edit-home-page', 'content');
   add_settings_field('long-key-message-5', 'Long Key Message 5', 'long_key_message_5_callback', 'edit-home-page', 'content');
   add_settings_field('open-house-url', 'Open House URL', 'open_house_url_callback', 'edit-home-page', 'content');
   add_settings_field('open-house-text', 'Open House Text', 'open_house_text_callback', 'edit-home-page', 'content');
   add_settings_field('metric-1-number', 'Metric 1 Number', 'metric_1_number_callback', 'edit-home-page', 'content');
   add_settings_field('metric-1-text', 'Metric 1 Text', 'metric_1_text_callback', 'edit-home-page', 'content');
   add_settings_field('metric-2-number', 'Metric 2 Number', 'metric_2_number_callback', 'edit-home-page', 'content');
   add_settings_field('metric-2-text', 'Metric 2 Text', 'metric_2_text_callback', 'edit-home-page', 'content');
   add_settings_field('metric-3-number', 'Metric 3 Number', 'metric_3_number_callback', 'edit-home-page', 'content');
   add_settings_field('metric-3-text', 'Metric 3 Text', 'metric_3_text_callback', 'edit-home-page', 'content');
   add_settings_field('metric-4-number', 'Metric 4 Number', 'metric_4_number_callback', 'edit-home-page', 'content');
   add_settings_field('metric-5-text', 'Metric 4 Text', 'metric_4_text_callback', 'edit-home-page', 'content');
   add_settings_field('notice-text', 'Notice Text', 'notice_text_callback', 'edit-home-page', 'content');
   add_settings_field('notice-url', 'Notice URL', 'notice_url_callback', 'edit-home-page', 'content');
   add_settings_field('enrollment-message', 'Enrollment Message', 'enrollment_message_callback', 'edit-home-page', 'content');
   add_settings_field('apply-button-text', 'Apply Button Text', 'apply_button_text_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-message', 'Subscribe Message', 'subscribe_message_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-button-text', 'Subscribe Button Text', 'subscribe_button_text_callback', 'edit-home-page', 'content');
   add_settings_field('subscribe-url', 'Subscribe URL', 'subscribe_url_callback', 'edit-home-page', 'content');
   add_settings_field('events-header', 'Events Header', 'events_header_callback', 'edit-home-page', 'content');
   add_settings_field('event1-title', 'Event 1 Title', 'event1_title_callback', 'edit-home-page', 'content');
   add_settings_field('event1-url', 'Event 1 URL', 'event1_url_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line1', 'Event 1 Line 1', 'event1_line1_callback', 'edit-home-page', 'content');
   add_settings_field('event1-line2', 'Event 1 Line 2', 'event1_line2_callback', 'edit-home-page', 'content');
   add_settings_field('event2-title', 'Event 2 Title', 'event2_title_callback', 'edit-home-page', 'content');
   add_settings_field('event2-url', 'Event 2 URL', 'event2_url_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line1', 'Event 2 Line 1', 'event2_line1_callback', 'edit-home-page', 'content');
   add_settings_field('event2-line2', 'Event 2 Line 2', 'event2_line2_callback', 'edit-home-page', 'content');
   add_settings_field('promoted-event-url', 'Promoted Event URL', 'promoted_event_url_callback', 'edit-home-page', 'content');
   add_settings_field('promoted-event-image-attachment-id', 'Promoted Event Image', 'promoted_event_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial1', 'Testimonial 1', 'testimonial1_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2', 'Testimonial 2', 'testimonial2_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial3', 'Testimonial 3', 'testimonial3_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial4', 'Testimonial 4', 'testimonial4_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial5', 'Testimonial 5', 'testimonial5_callback', 'edit-home-page', 'content');

   register_setting('edit-home-page', 'greenscreen-1-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-2-image-attachment-id');
   register_setting('edit-home-page', 'greenscreen-3-image-attachment-id');
   register_setting('edit-home-page', 'metrics-image-attachment-id');
   register_setting('edit-home-page', 'testimonials-image-attachment-id');
   register_setting('edit-home-page', 'announcements-image-attachment-id');
   register_setting('edit-home-page', 'notice-text');
   register_setting('edit-home-page', 'notice-url');
   register_setting('edit-home-page', 'key-message-1');
   register_setting('edit-home-page', 'key-message-2');
   register_setting('edit-home-page', 'key-message-3');
   register_setting('edit-home-page', 'key-message-link');
   register_setting('edit-home-page', 'key-message-link-text');
   register_setting('edit-home-page', 'second-banner-header');
   register_setting('edit-home-page', 'long-key-message-1');
   register_setting('edit-home-page', 'long-key-message-2');
   register_setting('edit-home-page', 'long-key-message-3');
   register_setting('edit-home-page', 'long-key-message-4');
   register_setting('edit-home-page', 'long-key-message-5');
   register_setting('edit-home-page', 'open-house-url');
   register_setting('edit-home-page', 'open-house-text');
   register_setting('edit-home-page', 'metric-1-number');
   register_setting('edit-home-page', 'metric-1-text');
   register_setting('edit-home-page', 'metric-2-number');
   register_setting('edit-home-page', 'metric-2-text');
   register_setting('edit-home-page', 'metric-3-number');
   register_setting('edit-home-page', 'metric-3-text');
   register_setting('edit-home-page', 'metric-4-number');
   register_setting('edit-home-page', 'metric-4-text');
   register_setting('edit-home-page', 'enrollment-message');
   register_setting('edit-home-page', 'apply-button-text');
   register_setting('edit-home-page', 'subscribe-message');
   register_setting('edit-home-page', 'subscribe-button-text');
   register_setting('edit-home-page', 'subscribe-url');
   register_setting('edit-home-page', 'events-header');
   register_setting('edit-home-page', 'event1-title');
   register_setting('edit-home-page', 'event1-url');
   register_setting('edit-home-page', 'event1-line1');
   register_setting('edit-home-page', 'event1-line2');
   register_setting('edit-home-page', 'event2-title');
   register_setting('edit-home-page', 'event2-url');
   register_setting('edit-home-page', 'event2-line1');
   register_setting('edit-home-page', 'event2-line2');
   register_setting('edit-home-page', 'promoted-event-url');
   register_setting('edit-home-page', 'promoted-event-image-attachment-id');
   register_setting('edit-home-page', 'testimonial1');
   register_setting('edit-home-page', 'testimonial2');
   register_setting('edit-home-page', 'testimonial3');
   register_setting('edit-home-page', 'testimonial4');
   register_setting('edit-home-page', 'testimonial5');
}
