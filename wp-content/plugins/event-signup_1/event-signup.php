<?php
/*
Plugin Name: Event Signup
Description: Allows users to sign up for Open School events
Version: 1.2.2
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

?>