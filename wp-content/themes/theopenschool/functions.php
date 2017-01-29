<?php

//////////////////////////////////////////////////////////////////////
// Add scripts and stylesheets
add_action('wp_enqueue_scripts', 'theopenschool_scripts');
function theopenschool_scripts() {
   wp_enqueue_style('site', get_template_directory_uri() . '/css/site.css');
	wp_enqueue_script('context-menu', get_template_directory_uri() . '/js/context-menu.js');
	wp_enqueue_script('hamburger-menu', get_template_directory_uri() . '/js/hamburger-menu.js');
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
	wp_register_style('CabinSketch', 'https://fonts.googleapis.com/css?family=Cabin+Sketch');
	wp_enqueue_style( 'RobotoCondensed');
	wp_enqueue_style( 'OpenSans');
	wp_enqueue_style( 'CabinSketch');
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

function mobile_title_image_attachment_callback() { 
   image_attachment_callback('mobile-title-image-attachment-id');
}

function banner_attachment_callback() { 
   image_attachment_callback('banner-attachment-id');
}

function mobile_banner_attachment_callback() { 
   image_attachment_callback('mobile-banner-attachment-id');
}

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

function testimonial1_callback() { ?>
   <textarea rows="5" cols="70" name="testimonial1"><?php echo get_option('testimonial1'); ?></textarea>
<?php }

function testimonial2_callback() { ?>
   <textarea rows="5" cols="70" name="testimonial2"><?php echo get_option('testimonial2'); ?></textarea>
<?php }

function testimonial1_attribution_callback() { ?>
   <textarea rows="1" cols="70" name="testimonial1-attribution"><?php echo get_option('testimonial1-attribution'); ?></textarea>
<?php }

function testimonial2_attribution_callback() { ?>
   <textarea rows="1" cols="70" name="testimonial2-attribution"><?php echo get_option('testimonial2-attribution'); ?></textarea>
<?php }

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
   add_settings_field('mobile-title-image-attachment-id', 'Title Image (Mobile)', 'mobile_title_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('banner-attachment-id', 'Banner', 'banner_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('mobile-banner-attachment-id', 'Banner (Mobile)', 'mobile_banner_attachment_callback', 'edit-home-page', 'content');
   
   add_settings_field('video-url', 'Video URL', 'video_url_callback', 'edit-home-page', 'content');
   add_settings_field('announcement1', 'Announcement 1', 'announcement1_callback', 'edit-home-page', 'content');
   add_settings_field('announcement2', 'Announcement 2', 'announcement2_callback', 'edit-home-page', 'content');
   add_settings_field('announcement3', 'Announcement 3', 'announcement3_callback', 'edit-home-page', 'content');
   
   add_settings_field('testimonial1', 'Testimonial 1', 'testimonial1_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial1-attribution', 'Testimonial 1 Attribution', 'testimonial1_attribution_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2', 'Testimonial 2', 'testimonial2_callback', 'edit-home-page', 'content');
   add_settings_field('testimonial2-attribution', 'Testimonial 2 Attribution', 'testimonial2_attribution_callback', 'edit-home-page', 'content');
   
   add_settings_field('subbanner1-image-attachment-id', 'Sub-Banner 1', 'subbanner1_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner1-caption', 'Caption 1', 'subbanner1_caption_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner2-image-attachment-id', 'Sub-Banner 2', 'subbanner2_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner2-caption', 'Caption 2', 'subbanner2_caption_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner3-image-attachment-id', 'Sub-Banner 3', 'subbanner3_image_attachment_callback', 'edit-home-page', 'content');
   add_settings_field('subbanner3-caption', 'Caption 3', 'subbanner3_caption_callback', 'edit-home-page', 'content');
   
   register_setting('edit-home-page', 'header-logo-image-attachment-id');
   register_setting('edit-home-page', 'title-image-attachment-id');
   register_setting('edit-home-page', 'mobile-title-image-attachment-id');
   register_setting('edit-home-page', 'banner-attachment-id');
   register_setting('edit-home-page', 'mobile-banner-attachment-id');
   register_setting('edit-home-page', 'video-url');
   register_setting('edit-home-page', 'announcement1');
   register_setting('edit-home-page', 'announcement2');
   register_setting('edit-home-page', 'announcement3');
   register_setting('edit-home-page', 'testimonial1');
   register_setting('edit-home-page', 'testimonial2');
   register_setting('edit-home-page', 'testimonial1-attribution');
   register_setting('edit-home-page', 'testimonial2-attribution');
   register_setting('edit-home-page', 'subbanner1-image-attachment-id');
   register_setting('edit-home-page', 'subbanner2-image-attachment-id');
   register_setting('edit-home-page', 'subbanner3-image-attachment-id');
   register_setting('edit-home-page', 'subbanner1-caption');
   register_setting('edit-home-page', 'subbanner2-caption');
   register_setting('edit-home-page', 'subbanner3-caption');
}

//////////////////////////////////////////////////////////////////////
// Edit footer
add_action('admin_menu', 'school_meta_add_menu');
function school_meta_add_menu() {
   add_menu_page('School_Meta', 'School Meta', 'manage_options', 'school_meta', 'school_meta_page', null, 4);
}

function school_meta_page() { ?>
   <div class="wrap">
      <h1>School Meta Information</h1>
      <form method="post" action="options.php">
         <?php
            settings_fields('school-meta');
            do_settings_sections('school-meta');
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

function address1_callback() { ?>
  <input type="text" name="address1" size="50" value="<?php echo get_option('address1'); ?>" />
<?php }

function address2_callback() { ?>
  <input type="text" name="address2" size="50" value="<?php echo get_option('address2'); ?>" />
<?php }

function email_callback() { ?>
  <input type="text" name="email" size="50" value="<?php echo get_option('email'); ?>" />
<?php }

function phone_callback() { ?>
  <input type="text" name="phone" size="50" value="<?php echo get_option('phone'); ?>" />
<?php }

function map_callback() { ?>
  <input type="text" name="map" size="50" value="<?php echo htmlentities(get_option('map')); ?>" />
<?php }

function base_tuition_callback() { ?>
  <input type="text" name="base-tuition" size="10" value="<?php echo get_option('base-tuition'); ?>" />
<?php }

function current_year_callback() { ?>
  <input type="text" name="current-year" size="10" value="<?php echo get_option('current-year'); ?>" />
<?php }

add_action('admin_init', 'school_meta_page_setup');
function school_meta_page_setup() {
   add_settings_section('content', 'Content', null, 'school-meta');
   
   add_settings_field('facebook', 'Facebook URL', 'facebook_callback', 'school-meta', 'content');
   add_settings_field('twitter', 'Twitter URL', 'twitter_callback', 'school-meta', 'content');
   add_settings_field('pinterest', 'Pinterest URL', 'pinterest_callback', 'school-meta', 'content');
   add_settings_field('instagram', 'Instagram URL', 'instagram_callback', 'school-meta', 'content');
   add_settings_field('youtube', 'YouTube URL', 'youtube_callback', 'school-meta', 'content');
   add_settings_field('address1', 'Address Line 1', 'address1_callback', 'school-meta', 'content');
   add_settings_field('address2', 'Address Line 2', 'address2_callback', 'school-meta', 'content');
   add_settings_field('email', 'Email', 'email_callback', 'school-meta', 'content');
   add_settings_field('phone', 'Phone', 'phone_callback', 'school-meta', 'content');
   add_settings_field('map', 'Map Embed Code', 'map_callback', 'school-meta', 'content');
   add_settings_field('base-tuition', 'Base Tuition', 'base_tuition_callback', 'school-meta', 'content');
   add_settings_field('current-year', 'Current School Year Start Year', 'current_year_callback', 'school-meta', 'content');

   register_setting('school-meta', 'facebook');
   register_setting('school-meta', 'twitter');
   register_setting('school-meta', 'pinterest');
   register_setting('school-meta', 'instagram');
   register_setting('school-meta', 'youtube');
   register_setting('school-meta', 'address1');
   register_setting('school-meta', 'address2');
   register_setting('school-meta', 'email');
   register_setting('school-meta', 'phone');
   register_setting('school-meta', 'map');
   register_setting('school-meta', 'base-tuition');
   register_setting('school-meta', 'current-year');
}

//////////////////////////////////////////////////////////////////////
// Menu
add_action( 'after_setup_theme', 'register_main_menu' );
function register_main_menu() {
  register_nav_menu('main-menu', __('Main Menu', 'theme-slug'));
}

//////////////////////////////////////////////////////////////////////
// Shortcodes

// [phone]
add_shortcode('phone', 'phone_shortcode_callback');
function phone_shortcode_callback() {
	return get_option('phone');
}

// [email]
add_shortcode('email', 'email_shortcode_callback');
function email_shortcode_callback() {
	return get_option('email');
}

// [address]
add_shortcode('address', 'address_shortcode_callback');
function address_shortcode_callback() {
	return get_option('address1') . '<br/>' . get_option('address2');
}

// [map]
add_shortcode('map', 'map_shortcode_callback');
function map_shortcode_callback() {
	return get_option('map');
}

// [contactform]
add_shortcode('contactform', 'contactform_shortcode_callback');
function contactform_shortcode_callback() {
	return render_php('contact-form.php');
}

// [base-tuition]
add_shortcode('base-tuition', 'base_tuition_shortcode_callback');
function base_tuition_shortcode_callback() {
	return get_option('base-tuition');
}

// [next-year-start-year]
add_shortcode('next-year-start-year', 'next_year_start_year_shortcode_callback');
function next_year_start_year_shortcode_callback() {
	$current_year = intval(get_option('current-year'));
	return $current_year + 1;
}

// [current-year-span]
add_shortcode('current-year-span', 'current_year_span_shortcode_callback');
function current_year_span_shortcode_callback() {
	$current_year = intval(get_option('current-year'));
	return $current_year . '-' . ($current_year + 1);
}

// [next-year-span]
add_shortcode('next-year-span', 'next_year_span_shortcode_callback');
function next_year_span_shortcode_callback() {
	$current_year = intval(get_option('current-year'));
	return ($current_year + 1) . '-' . ($current_year + 2);
}

//////////////////////////////////////////////////////////////////////
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

function see_comments() {
   $comments_number = get_comments_number();
   if ($comments_number > 0) { ?>
      &middot;
      <a href="<?php comments_link(); ?>">
      	<?php	printf(_nx('One Comment', '%1$s Comments', $comments_number, 'comments title', 'textdomain'), number_format_i18n($comments_number)); ?>
      </a>
   <?php }
}

function the_custom_author() {
   $author = get_post_meta(get_the_ID(), 'Custom Author', true);
   if (!empty($author)) { ?>
      by <?php echo $author; ?><br/>
   <?php }
}

function get_page_title_prefix() {
   global $wp_query;
   $queried_object_id = $wp_query->queried_object_id;
   
   $title_prefix = '';
   $menu_items = get_menu_items();
   
   $current_sub_menu_items = array_filter($menu_items, function($o) use ($queried_object_id) { 
      return $o->menu_item_parent && get_page_id($o) == $queried_object_id;
   });
   
   if (!empty($current_sub_menu_items)) {
      $current_sub_menu_item = current($current_sub_menu_items);
      $parent_id = $current_sub_menu_item->menu_item_parent;
      $parent = current(array_filter($menu_items, function($o) use ($parent_id) { return $o->ID == $parent_id; }));
      if ($parent->title != get_the_title()) {
         $title_prefix = $parent->title . ' &middot; ';  
      }
   }
   
   return $title_prefix;
}

function contact_form_generate_response($type, $message){
   if ($type == 'success') return "<div class='contact-us-success'>{$message}</div>";
   else return "<div class='contact-us-error'>{$message}</div>";
}

function page_template($content_function) {
   get_header(); ?>
   <div class="container">
      <?php if (have_posts()) {
         while (have_posts()) {
            the_post(); ?>
            <h1 class="page-title">
               <span class="text-light"><?php echo get_page_title_prefix(); ?></span>
               <span class="text-light-green"><?php the_title(); ?></span>
            </h1>
            <?php $content_function();
         }
      } ?>
   </div>
   <?php get_footer();
}

function render_php($path)
{
    ob_start();
    include($path);
    $var=ob_get_contents(); 
    ob_end_clean();
    return $var;
}

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

function endsWith($haystack, $needle) {
   $length = strlen($needle);
   if ($length == 0) {
      return true;
   }
   return (substr($haystack, -$length) === $needle);
}

add_theme_support('title-tag');

add_filter('show_admin_bar', '__return_false');