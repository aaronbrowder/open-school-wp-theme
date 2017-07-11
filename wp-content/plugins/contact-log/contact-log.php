<?php
/*
Plugin Name: Contact Log
Description: Keeps a record of every time a user submits a contact form
Version: 1.0
Author: Aaron Browder
*/

global $wpdb;
global $contact_log_table_name;

$contact_log_table_name = $wpdb->prefix . 'contact_log';

register_activation_hook(__FILE__, 'contact_log_install');
register_uninstall_hook(__FILE__, 'contact_log_uninstall');

function contact_log_install() {
   
   global $wpdb;
   global $contact_log_table_name;
   
   error_log('Installing table: ' . $contact_log_table_name);

   $charset_collate = $wpdb->get_charset_collate();
   
   $sql = "CREATE TABLE $contact_log_table_name (
     id mediumint(9) NOT NULL AUTO_INCREMENT,
     time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
     name tinytext NOT NULL,
     email tinytext NOT NULL,
     message varchar(1000) DEFAULT '' NOT NULL,
     PRIMARY KEY  (id)
   ) $charset_collate;";
   
   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   dbDelta($sql);
   
   add_option('contact_log_db_version', '1.0');
}

function contact_log_uninstall() {
   global $wpdb;
   global $contact_log_table_name;
   $sql = "DROP TABLE IF EXISTS $contact_log_table_name;";
   $wpdb->query($sql);
   delete_option("contact_log_db_version");
}

function log_contact($name, $email, $message) {
   global $wpdb;
   global $contact_log_table_name;
   $wpdb->insert($contact_log_table_name, array(
      'time' => date('Y-m-d H:i:s'),
      'name' => $name,
      'email' => $email,
      'message' => $message
   ));
}

?>