<?php
/*
Plugin Name: Event Signup
Description: Allows users to sign up for Open School events
Version: 1.3
Author: Aaron Browder
*/

global $wpdb;
global $table_name;

$table_name = $wpdb->prefix . 'event_signup';

register_activation_hook(__FILE__, 'event_signup_install');
register_uninstall_hook(__FILE__, 'event_signup_uninstall');

add_action('wp_enqueue_scripts', 'event_signup_scripts');
function event_signup_scripts() {
   wp_enqueue_style('event-signup', plugins_url('/event-signup.css', __FILE__));
}

function event_signup_install() {
   
   global $wpdb;
   global $table_name;
   
   error_log('Installing table: ' . $table_name);

   $charset_collate = $wpdb->get_charset_collate();
   
   $sql = "CREATE TABLE $table_name (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
     name tinytext NOT NULL,
     email tinytext NOT NULL,
     timeslot varchar(20) DEFAULT '' NOT NULL,
     adult_count tinyint NOT NULL,
     child_count tinyint NOT NULL,
     PRIMARY KEY  (id)
   ) $charset_collate;";
   
   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   dbDelta($sql);
   
   add_option('event_signup_db_version', '1.0');
}

function event_signup_uninstall() {
   global $wpdb;
   global $table_name;
   $sql = "DROP TABLE IF EXISTS $table_name;";
   $wpdb->query($sql);
   delete_option("event_signup_db_version");
}

function render_event_php($path)
{
   ob_start();
   include($path);
   $var = ob_get_contents(); 
   ob_end_clean();
   return $var;
}

// [event-signup-form]
add_shortcode('event-signup-form', 'event_signup_form_shortcode_callback');
function event_signup_form_shortcode_callback() {
   return render_event_php('event-signup-form.php');
}

// [event-confirmation]
add_shortcode('event-confirmation', 'event_confirmation_shortcode_callback');
function event_confirmation_shortcode_callback() {
   return render_event_php('event-confirmation.php');
}

// [event-signup-results]
add_shortcode('event-signup-results', 'event_signup_results_shortcode_callback');
function event_signup_results_shortcode_callback() {
	return render_event_php('event-signup-results.php');
}


/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
// http://www.wpexplorer.com/wordpress-page-templates-plugin

class PageTemplater {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

	/**
	 * Returns an instance of this class. 
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new PageTemplater();
		} 

		return self::$instance;

	} 

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {

		$this->templates = array();


		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);

		} else {

			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);

		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data', 
			array( $this, 'register_project_templates' ) 
		);


		// Add a filter to the template include to determine if the page has our 
		// template assigned and return it's path
		add_filter(
			'template_include', 
			array( $this, 'view_project_template') 
		);


		// Add your templates to this array.
		$this->templates = array(
			'event-confirmation.php' => 'Event Confirmation',
			'event-signup-results.php' => 'Event Signup Results'
		);
			
	} 

	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list. 
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		} 

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	} 

	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {
		
		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta( 
			$post->ID, '_wp_page_template', true 
		)] ) ) {
			return $template;
		} 

		$file = plugin_dir_path( __FILE__ ). get_post_meta( 
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

} 
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );

?>