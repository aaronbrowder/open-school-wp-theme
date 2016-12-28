<?php

//////////////////////////////////////////////////////////////////////
// Add scripts and stylesheets
add_action('wp_enqueue_scripts', 'mytheme_scripts');
function mytheme_scripts() {
   //wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6');
	wp_enqueue_style('site', get_template_directory_uri() . '/css/site.css');
	wp_enqueue_script('context-menu', get_template_directory_uri() . '/js/context-menu.js');
}

add_action('admin_enqueue_scripts', 'admin_scripts');
function admin_scripts() {
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js');
	wp_enqueue_script('media_selector', get_template_directory_uri() . '/js/media-selector.js', array('jquery'));
	
	$data = array('my_saved_attachment_post_id' => get_option('media_selector_attachment_id', 0));
   wp_localize_script( 'media_selector', 'php_vars', $data );
}

//////////////////////////////////////////////////////////////////////
// Add Google Fonts
add_action('wp_print_styles', 'mytheme_google_fonts');
function mytheme_google_fonts() {
	wp_register_style('RobotoCondensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed');
	wp_register_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans');
	wp_enqueue_style( 'RobotoCondensed');
	wp_enqueue_style( 'OpenSans');
}

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

function header_logo_image_attachment_callback() { 
   image_attachment_callback('header-logo-image-attachment-id');
}

function title_image_attachment_callback() { 
   image_attachment_callback('title-image-attachment-id');
}

function title_tagline_header_callback() { ?>
   <input type="text" size="50" name="title-tagline-header" value="<?php echo get_option('title-tagline-header'); ?>"/>
<?php }

function title_tagline_text_callback() { ?>
   <textarea rows="6" cols="70" name="title-tagline-text"><?php echo get_option('title-tagline-text'); ?></textarea>
<?php }

function video_url_callback() { ?>
   <input type="text" size="50" name="video-url" value="<?php echo get_option('video-url'); ?>"/>
<?php }

function announcement_callback($option_id) { ?>
   <textarea rows="5" cols="50" name="<?php echo $option_id; ?>"><?php echo get_option($option_id); ?></textarea>
<?php }

function announcement1_callback() {
   announcement_callback('announcement1');
}

function announcement2_callback() {
   announcement_callback('announcement2');
}

function announcement3_callback() {
   announcement_callback('announcement3');
}

function announcement4_callback() {
   announcement_callback('announcement4');
}

function subbanner_caption_callback($option_id) { ?>
   <textarea rows="7" cols="70" name="<?php echo $option_id; ?>"><?php echo get_option($option_id); ?></textarea>
<?php }

function subbanner1_image_attachment_callback() { 
   image_attachment_callback('subbanner1-image-attachment-id');
}

function subbanner2_image_attachment_callback() { 
   image_attachment_callback('subbanner2-image-attachment-id');
}

function subbanner3_image_attachment_callback() { 
   image_attachment_callback('subbanner3-image-attachment-id');
}

function subbanner1_caption_callback() {
   subbanner_caption_callback('subbanner1-caption');
}

function subbanner2_caption_callback() {
   subbanner_caption_callback('subbanner2-caption');
}

function subbanner3_caption_callback() {
   subbanner_caption_callback('subbanner3-caption');
}

add_action('admin_init', 'edit_home_page_page_setup');
function edit_home_page_page_setup() {
   wp_enqueue_media();
   add_settings_section('content', 'Content', null, 'edit-home-page');
   
   add_settings_field('header-logo-image-attachment-id', 'Header Logo Image', 'header_logo_image_attachment_callback', 'edit-home-page', 'content');

   add_settings_field('title-image-attachment-id', 'Title Image', 'title_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('title-tagline-header', 'Tagline Header', 'title_tagline_header_callback', 'edit-home-page', 'content');
   add_settings_field('title-tagline-text', 'Tagline Text', 'title_tagline_text_callback', 'edit-home-page', 'content');
   
   add_settings_field('video-url', 'Video URL', 'video_url_callback', 'edit-home-page', 'content');
   add_settings_field('announcement1', 'Announcement 1', 'announcement1_callback', 'edit-home-page', 'content');
   add_settings_field('announcement2', 'Announcement 2', 'announcement2_callback', 'edit-home-page', 'content');
   add_settings_field('announcement3', 'Announcement 3', 'announcement3_callback', 'edit-home-page', 'content');
   add_settings_field('announcement4', 'Announcement 4', 'announcement4_callback', 'edit-home-page', 'content');
   
   add_settings_field('subbanner1-image-attachment-id', 'Sub-Banner 1', 'subbanner1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner1-caption', 'Caption 1', 'subbanner1_caption_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner2-image-attachment-id', 'Sub-Banner 2', 'subbanner2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner2-caption', 'Caption 2', 'subbanner2_caption_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner3-image-attachment-id', 'Sub-Banner 3', 'subbanner3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner3-caption', 'Caption 3', 'subbanner3_caption_callback', 'edit-home-page', 'content');
   
   register_setting('edit-home-page', 'header-logo-image-attachment-id');
   register_setting('edit-home-page', 'title-image-attachment-id');
   register_setting('edit-home-page', 'title-tagline-header');
   register_setting('edit-home-page', 'title-tagline-text');
   register_setting('edit-home-page', 'video-url');
   register_setting('edit-home-page', 'announcement1');
   register_setting('edit-home-page', 'announcement2');
   register_setting('edit-home-page', 'announcement3');
   register_setting('edit-home-page', 'announcement4');
   register_setting('edit-home-page', 'subbanner1-image-attachment-id');
   register_setting('edit-home-page', 'subbanner2-image-attachment-id');
   register_setting('edit-home-page', 'subbanner3-image-attachment-id');
   register_setting('edit-home-page', 'subbanner1-caption');
   register_setting('edit-home-page', 'subbanner2-caption');
   register_setting('edit-home-page', 'subbanner3-caption');
}

//////////////////////////////////////////////////////////////////////
// Edit footer
add_action('admin_menu', 'edit_footer_add_menu');
function edit_footer_add_menu() {
   add_menu_page('Edit_Footer', 'Footer', 'manage_options', 'edit_footer', 'edit_footer_page', null, 4);
}

function edit_footer_page() { ?>
   <div class="wrap">
      <h1>Edit Footer</h1>
      <form method="post" action="options.php">
         <?php
            settings_fields('edit-footer');
            do_settings_sections('edit-footer');
            submit_button();
         ?>
      </form>
   </div>
<?php }

function facebook_callback() { ?>
  <input type="text" name="facebook" size="70" value="<?php echo get_option('facebook'); ?>" />
<?php }

function twitter_callback() { ?>
  <input type="text" name="twitter" size="70" value="<?php echo get_option('twitter'); ?>" />
<?php }

function pinterest_callback() { ?>
  <input type="text" name="pinterest" size="70" value="<?php echo get_option('pinterest'); ?>" />
<?php }

function instagram_callback() { ?>
   <input type="text" name="instagram" size="70" value="<?php echo get_option('instagram') ?>"/>
<?php }

function youtube_callback() { ?>
  <input type="text" name="youtube" size="70" value="<?php echo get_option('youtube'); ?>" />
<?php }

add_action('admin_init', 'edit_footer_page_setup');
function edit_footer_page_setup() {
   add_settings_section('content', 'Content', null, 'edit-footer');
   
   add_settings_field('facebook', 'Facebook URL', 'facebook_callback', 'edit-footer', 'content');
   add_settings_field('twitter', 'Twitter URL', 'twitter_callback', 'edit-footer', 'content');
   add_settings_field('pinterest', 'Pinterest URL', 'pinterest_callback', 'edit-footer', 'content');
   add_settings_field('instagram', 'Instagram URL', 'instagram_callback', 'edit-footer', 'content');
   add_settings_field('youtube', 'YouTube URL', 'youtube_callback', 'edit-footer', 'content');

   register_setting('edit-footer', 'facebook');
   register_setting('edit-footer', 'twitter');
   register_setting('edit-footer', 'pinterest');
   register_setting('edit-footer', 'instagram');
   register_setting('edit-footer', 'youtube');
}

//////////////////////////////////////////////////////////////////////
// Menu
add_action( 'after_setup_theme', 'register_main_menu' );
function register_main_menu() {
  register_nav_menu('main-menu', __('Main Menu', 'theme-slug'));
}

// Wordpress Titles
add_theme_support('title-tag');

// Embed video
function embed_video($video_url) {
   $supported = wp_get_video_extensions();
   $video_pathinfo = pathinfo($video_url);
   $video_ext = $video_pathinfo['extension'];
   if (in_array($video_ext, $supported)) {
      wp_video_shortcode(array('src'=>$video_url));
   } else {
      $video = wp_oembed_get($video_url);
      echo $video;
   }
}

// Helpers
function get_menu_items() {
   $locations = get_nav_menu_locations();
   $menu = wp_get_nav_menu_object($locations['main-menu']);
   return wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC'));
}

function get_page_id($menu_item) {
   return get_post_meta($menu_item->ID, '_menu_item_object_id', true);
}

function page_number() {
   global $paged;
   if ($paged > 1) { ?>
      <span class="text-light">
         &middot; Page <?php echo $paged; ?>
      </span>
   <?php }
}