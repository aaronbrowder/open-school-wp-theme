<?php
/*
Plugin Name: Event Signup
Description: Allows users to sign up for Open School events
Version: 1.0
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

// [event-signup-form]
add_shortcode('event-signup-form', 'event_signup_form_shortcode_callback');
function event_signup_form_shortcode_callback() {
   $GLOBALS['content'] = $content;
   ob_start();
   include('event-signup-form.php');
   $var = ob_get_contents(); 
   ob_end_clean();
   return $var;
}

// [event-signup-results]
add_shortcode('event-signup-results', 'event_signup_results_shortcode_callback');
function event_signup_results_shortcode_callback() {
	global $wpdb;
   global $table_name;
   $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY timeslot");
   $totals = $wpdb->get_results("SELECT timeslot, SUM(adult_count) AS total_adults, SUM(child_count) AS total_children FROM $table_name GROUP BY timeslot ORDER BY timeslot");
   ?>
   <table class="results-table">
      <tr>
         <th>name</th>
         <th>email</th>
         <th>time slot</th>
         <th># of adults</th>
         <th># of children</th>
      </tr>
      <?php
      foreach ($results as $result)
      { ?>
         <tr>
            <td><?php echo $result->name; ?></td>
            <td><?php echo $result->email; ?></td>
            <td><?php echo $result->timeslot; ?></td>
            <td><?php echo $result->adult_count; ?></td>
            <td><?php echo $result->child_count; ?></td>
         </tr>
      <?php } ?>
   </table>
   <table class="results-table">
      <tr>
         <th>time slot</th>
         <th>total adults</th>
         <th>total children</th>
      </tr>
      <?php
      foreach ($totals as $result)
      { ?>
         <tr>
            <td><?php echo $result->timeslot; ?></td>
            <td><?php echo $result->total_adults; ?></td>
            <td><?php echo $result->total_children; ?></td>
         </tr>
      <?php } ?>
   </table>
<?php }

?>