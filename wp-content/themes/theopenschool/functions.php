<?php

//////////////////////////////////////////////////////////////////////
// Add scripts and stylesheets
add_action('wp_enqueue_scripts', 'theopenschool_scripts');
function theopenschool_scripts() {
   wp_enqueue_style('site', get_template_directory_uri() . '/css/site.css');
	wp_enqueue_script('front-end', get_template_directory_uri() . '/js/front-end.js');
	wp_enqueue_script('font_awesome', 'https://use.fontawesome.com/6e05896b8d.js');
}

add_action('admin_enqueue_scripts', 'admin_scripts');
function admin_scripts() {
   wp_enqueue_media();
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js');
	wp_enqueue_script('media_selector', get_template_directory_uri() . '/js/media-selector.js', array('jquery'));
	
	$data = array('my_saved_attachment_post_id' => get_option('media_selector_attachment_id', 0));
   wp_localize_script( 'media_selector', 'php_vars', $data );
}

//////////////////////////////////////////////////////////////////////
// Add Google Fonts
add_action('wp_print_styles', 'mytheme_google_fonts');
function mytheme_google_fonts() {
	wp_register_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans');
	wp_register_style('OpenSansCondensedBold', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700');
	wp_register_style('Pompiere', 'https://fonts.googleapis.com/css?family=Pompiere');
	wp_register_style('Delius', 'https://fonts.googleapis.com/css?family=Delius');
	wp_enqueue_style('OpenSans');
	wp_enqueue_style('OpenSansCondensedBold');
	wp_enqueue_style('Pompiere');
	wp_enqueue_style('Delius');
}

//////////////////////////////////////////////////////////////////////
// Header

add_action('admin_menu', 'edit_header_add_menu');
function edit_header_add_menu() {
   add_menu_page('Edit_Header', 'Header', 'manage_options', 'edit_header', 'edit_header_page', null, 4);
}

function edit_header_page() { ?>
   <div class="wrap">
      <h1>Header</h1>
      <form method="post" action="options.php">
         <?php
            settings_fields('edit-header');
            do_settings_sections('edit-header');
            submit_button();
         ?>
      </form>
   </div>
<?php }

function header_logo_image_attachment_callback() { 
   $image_attachment_id = get_option('header-logo-image-attachment-id'); ?>
   <div class="image-preview-wrapper">
		<img class="image-preview" src="<?php echo wp_get_attachment_url($image_attachment_id); ?>" height="100"/>
	</div>
	<input class="upload-image-button button" type="button" value="<?php _e('Select Image'); ?>" />
	<input type="hidden" name="<?php echo $option_id; ?>" class="image-attachment-id" value="<?php echo $image_attachment_id; ?>">
<?php }

add_action('admin_init', 'edit_header_page_setup');
function edit_header_page_setup() {
   add_settings_section('content', 'Content', null, 'edit-header');
   add_settings_field('header-logo-image-attachment-id', 'Header Logo Image', 'header_logo_image_attachment_callback', 'edit-header', 'content');
   register_setting('edit-header', 'header-logo-image-attachment-id');
}

//////////////////////////////////////////////////////////////////////
// School Meta

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

function contact_us_string_callback() { ?>
  <input type="text" name="contact-us-string" size="20" value="<?php echo get_option('contact-us-string'); ?>" />
<?php }

function contact_us_string_es_callback() { ?>
  <input type="text" name="contact-us-string-es" size="20" value="<?php echo get_option('contact-us-string-es'); ?>" />
<?php }

function support_our_school_string_callback() { ?>
  <input type="text" name="support-our-school-string" size="20" value="<?php echo get_option('support-our-school-string'); ?>" />
<?php }

function support_our_school_string_es_callback() { ?>
  <input type="text" name="support-our-school-string-es" size="20" value="<?php echo get_option('support-our-school-string-es'); ?>" />
<?php }

function donate_string_callback() { ?>
  <input type="text" name="donate-string" size="20" value="<?php echo get_option('donate-string'); ?>" />
<?php }

function donate_string_es_callback() { ?>
  <input type="text" name="donate-string-es" size="20" value="<?php echo get_option('donate-string-es'); ?>" />
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

function paypal_hosted_button_id_callback() { ?>
  <input type="text" name="paypal-hosted-button-id" size="70" value="<?php echo get_option('paypal-hosted-button-id'); ?>" />
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

function contact_recipient_callback($num, $type) {
   $name = "contact-recipient-$num-$type"; ?>
   <input type="text" name="<?php echo $name; ?>" size="50" value="<?php echo get_option($name); ?>" />
<?php }

function contact_recipient_1_name_callback() {
  contact_recipient_callback(1, 'name');
}

function contact_recipient_1_name_es_callback() {
  contact_recipient_callback(1, 'name-es');
}

function contact_recipient_1_address_callback() {
  contact_recipient_callback(1, 'address');
}

function contact_recipient_2_name_callback() {
  contact_recipient_callback(2, 'name');
}

function contact_recipient_2_name_es_callback() {
  contact_recipient_callback(2, 'name-es');
}

function contact_recipient_2_address_callback() {
  contact_recipient_callback(2, 'address');
}

function contact_recipient_3_name_callback() {
  contact_recipient_callback(3, 'name');
}

function contact_recipient_3_name_es_callback() {
  contact_recipient_callback(3, 'name-es');
}

function contact_recipient_3_address_callback() {
  contact_recipient_callback(3, 'address');
}

function contact_recipient_4_name_callback() {
  contact_recipient_callback(4, 'name');
}

function contact_recipient_4_name_es_callback() {
  contact_recipient_callback(4, 'name-es');
}

function contact_recipient_4_address_callback() {
  contact_recipient_callback(4, 'address');
}

add_action('admin_init', 'school_meta_page_setup');
function school_meta_page_setup() {
   add_settings_section('content', 'Content', null, 'school-meta');
   
   add_settings_field('contact-us-string', '"Contact Us" String', 'contact_us_string_callback', 'school-meta', 'content');
   add_settings_field('contact-us-string-es', '"Contact Us" String (Spanish)', 'contact_us_string_es_callback', 'school-meta', 'content');
   add_settings_field('support-our-school-string', '"Support Our School" String', 'support_our_school_string_callback', 'school-meta', 'content');
   add_settings_field('support-our-school-string-es', '"Support Our School" String (Spanish)', 'support_our_school_string_es_callback', 'school-meta', 'content');
   add_settings_field('donate-string', '"Donate" String', 'donate_string_callback', 'school-meta', 'content');
   add_settings_field('donate-string-es', '"Donate" String (Spanish)', 'donate_string_es_callback', 'school-meta', 'content');
   add_settings_field('facebook', 'Facebook URL', 'facebook_callback', 'school-meta', 'content');
   add_settings_field('twitter', 'Twitter URL', 'twitter_callback', 'school-meta', 'content');
   add_settings_field('pinterest', 'Pinterest URL', 'pinterest_callback', 'school-meta', 'content');
   add_settings_field('instagram', 'Instagram URL', 'instagram_callback', 'school-meta', 'content');
   add_settings_field('youtube', 'YouTube URL', 'youtube_callback', 'school-meta', 'content');
   add_settings_field('paypal-hosted-button-id', 'Paypal Hosted Button ID', 'paypal_hosted_button_id_callback', 'school-meta', 'content');
   add_settings_field('address1', 'Address Line 1', 'address1_callback', 'school-meta', 'content');
   add_settings_field('address2', 'Address Line 2', 'address2_callback', 'school-meta', 'content');
   add_settings_field('email', 'Email', 'email_callback', 'school-meta', 'content');
   add_settings_field('phone', 'Phone', 'phone_callback', 'school-meta', 'content');
   add_settings_field('map', 'Map Embed Code', 'map_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-1-name', 'Contact Recipient 1 Name', 'contact_recipient_1_name_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-1-name-es', 'Contact Recipient 1 Name (Spanish)', 'contact_recipient_1_name_es_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-1-address', 'Contact Recipient 1 Address', 'contact_recipient_1_address_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-2-name', 'Contact Recipient 2 Name', 'contact_recipient_2_name_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-2-name-es', 'Contact Recipient 2 Name (Spanish)', 'contact_recipient_2_name_es_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-2-address', 'Contact Recipient 2 Address', 'contact_recipient_2_address_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-3-name', 'Contact Recipient 3 Name', 'contact_recipient_3_name_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-3-name-es', 'Contact Recipient 3 Name (Spanish)', 'contact_recipient_3_name_es_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-3-address', 'Contact Recipient 3 Address', 'contact_recipient_3_address_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-4-name', 'Contact Recipient 4 Name', 'contact_recipient_4_name_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-4-name-es', 'Contact Recipient 4 Name (Spanish)', 'contact_recipient_4_name_es_callback', 'school-meta', 'content');
   add_settings_field('contact-recipient-4-address', 'Contact Recipient 4 Address', 'contact_recipient_4_address_callback', 'school-meta', 'content');

   register_setting('school-meta', 'contact-us-string');
   register_setting('school-meta', 'contact-us-string-es');
   register_setting('school-meta', 'support-our-school-string');
   register_setting('school-meta', 'support-our-school-string-es');
   register_setting('school-meta', 'donate-string');
   register_setting('school-meta', 'donate-string-es');
   register_setting('school-meta', 'facebook');
   register_setting('school-meta', 'twitter');
   register_setting('school-meta', 'pinterest');
   register_setting('school-meta', 'instagram');
   register_setting('school-meta', 'youtube');
   register_setting('school-meta', 'paypal-hosted-button-id');
   register_setting('school-meta', 'address1');
   register_setting('school-meta', 'address2');
   register_setting('school-meta', 'email');
   register_setting('school-meta', 'phone');
   register_setting('school-meta', 'map');
   register_setting('school-meta', 'contact-recipient-1-name');
   register_setting('school-meta', 'contact-recipient-1-name-es');
   register_setting('school-meta', 'contact-recipient-1-address');
   register_setting('school-meta', 'contact-recipient-2-name');
   register_setting('school-meta', 'contact-recipient-2-name-es');
   register_setting('school-meta', 'contact-recipient-2-address');
   register_setting('school-meta', 'contact-recipient-3-name');
   register_setting('school-meta', 'contact-recipient-3-name-es');
   register_setting('school-meta', 'contact-recipient-3-address');
   register_setting('school-meta', 'contact-recipient-4-name');
   register_setting('school-meta', 'contact-recipient-4-name-es');
   register_setting('school-meta', 'contact-recipient-4-address');
}

//////////////////////////////////////////////////////////////////////
// Wordpress configuration
add_action( 'after_setup_theme', 'register_main_menu' );
function register_main_menu() {
  register_nav_menu('main-menu', __('Main Menu', 'theme-slug'));
}

//////////////////////////////////////////////////////////////////////
// Shortcodes

// [phone]
add_shortcode('phone', 'phone_shortcode_callback');
function phone_shortcode_callback() {
	return '<span style="display:inline-block;">' . get_option('phone') . '</span>';
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

// [contact-form]
add_shortcode('contact-form', 'contact_form_shortcode_callback');
function contact_form_shortcode_callback($atts = [], $content = null) {
   $atts = shortcode_atts(array(
     'button-text' => 'Send', 
     'show-phone' => 'true',
     'show-address' => 'false',
     'show-message' => 'true',
     'recipient-label' => 'Send to',
     'recipients' => '1,2,3,4'
     ),
     $atts);
	return render_php('contact-form.php', $atts, $content);
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

// [sharable]content[/sharable]
add_shortcode('sharable', 'sharable_shortcode_callback');
function sharable_shortcode_callback($atts = [], $content = null) {
	return '<blockquote class="blog-sharable">' . $content . '</blockquote>';
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

function get_menu_item_id($menu_item) {
   return $menu_item->ID;
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

function the_custom_description() {
   $description = get_post_meta(get_the_ID(), 'Custom Description', true);
   if (!empty($description)) {
       echo $description;
   }
   else {
      the_excerpt();
   }
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

function custom_text($id) {
   if (get_locale() == 'es_MX') {
      $id .= '-es';
   }
   return get_option($id);
}

function page_template($content_function) {
   get_header(); ?>
   <div class="container">
      <?php if (have_posts()) {
         while (have_posts()) {
            the_post(); ?>
            <h1 class="page-title">
               <span class="text-light-green"><?php the_title(); ?></span>
            </h1>
            <?php $content_function();
         }
      } ?>
   </div>
   <?php get_footer();
}

// https://developers.facebook.com/docs/plugins/like-button
function fb_like_box() { 
   $fb_url = get_option('facebook');
   if (!empty($fb_url)) { ?>
      <div class="fb-like" data-href="<?php echo $fb_url; ?>" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
   <?php }
}

function fb_page_plugin_large() {
   $fb_url = get_option('facebook');
   if (!empty($fb_url)) { ?>
      <div class="fb-page" data-href="<?php echo $fb_url; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo $fb_url; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $fb_url; ?>">The Open School</a></blockquote></div>
   <?php }
}

function fb_page_plugin_small() {
   $fb_url = get_option('facebook');
   if (!empty($fb_url)) { ?>
      <div class="fb-page" data-href="<?php echo $fb_url; ?>" data-width="280" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="<?php echo $fb_url; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $fb_url; ?>">The Open School</a></blockquote></div>
   <?php }
}

function fb_page_plugin_with_feed($height) {
   $fb_url = get_option('facebook');
   if (!empty($fb_url)) { ?>
      <div class="fb-page" data-href="<?php echo $fb_url; ?>" data-tabs="timeline" data-height="<?php echo $height; ?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="<?php echo $fb_url; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo $fb_url; ?>">The Open School</a></blockquote></div>
   <?php }
}

function render_php($path, $atts, $content)
{
   $GLOBALS['atts'] = $atts;
   $GLOBALS['content'] = $content;
   ob_start();
   include($path);
   $var = ob_get_contents(); 
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
add_theme_support('post-thumbnails'); 

add_filter('show_admin_bar', '__return_false');