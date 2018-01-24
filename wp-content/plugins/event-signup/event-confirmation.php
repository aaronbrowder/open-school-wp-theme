<?php

page_template(function() {
?><div class="page"><?php

global $wpdb;
global $table_name;

$error = null;

if ($_POST['submitted']) {

   $missing_content  = 'Please supply all information.';
   $email_invalid    = 'Email address is invalid.';
   
   $total_for_first_timeslot = $wpdb->get_results(
      "SELECT SUM(adult_count) AS total FROM $table_name GROUP BY timeslot having timeslot = '6 PM'"
      )[0]->total;
      
   $total_for_second_timeslot = $wpdb->get_results(
      "SELECT SUM(adult_count) AS total FROM $table_name GROUP BY timeslot having timeslot = '6:45 PM'"
      )[0]->total;
      
   // setting the max for the first timeslot to 1000 effectively means there is no second timeslot
   $timeslot = $total_for_first_timeslot < 1000 || $total_for_first_timeslot < $total_for_second_timeslot
      ? '6 PM' : '6:45 PM';
   
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = contact_form_generate_response('error', $email_invalid);
   }
   else if (empty($name)) {
      $error = contact_form_generate_response('error', $missing_content);
   }
   else {
      $wpdb->insert($table_name, array(
         'time' => date('Y-m-d H:i:s'),
         'name' => $name,
         'email' => $email,
         'timeslot' => $timeslot
      ));
      
      $school_email = get_option('email');
      $address = get_option('address1') . ', ' . get_option('address2');
      
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=iso-8859-1';
      $headers[] = "From: The Open School <$school_email>";
      $headers[] = "Reply-to: $school_email";
      
      $subject = 'Being a Teen at The Open School';

      $message = "
         <html>
         <head></head>
         <body>
            <p>Hi $name,</p>
            <p>
               This is to confirm that you've signed up for our event, <em>Being a Teen at The Open School</em>,
               on Monday, October 30th, at 5:00 PM. We look forward to meeting you!
            </p>
            <p>
               The event will take place at Peet's Coffee in Tustin
               (<a href=\"https://www.google.com/maps/place/12932+Newport+Ave+%2314,+Tustin,+CA+92780/@33.7495385,-117.8119448,17z/data=!3m1!4b1!4m5!3m4!1s0x80dcdbc71651220d:0x41eb34e6c019598c!8m2!3d33.7495385!4d-117.8097561\">12932 Newport Ave Suite 14, Tustin, CA 92780</a>).
               You'll be able to find us in the patio area.
            </p>
            <p>
               In the meantime, you can learn about our school at <a href=\"openschooloc.com\">our website</a>.
            </p>
            <p><a href=\"http://openschooloc.com\"><img src=\"https://ci5.googleusercontent.com/proxy/lgZE3sYa9StDYkzvPBISfcykHV1tTc9DKmKsUPffLhi4cLLP-48n89ZCiyaqQ7_GwhV-u0vccunt95MnpvNDYhpi0okPkTb0XfLPx_jjGpjZAjyYm1NfcvORHViQ7g22fF5ah3u0S4tDQO343Eq3NAc=s0-d-e1-ft#http://www.openschooloc.com/wp/wp-content/uploads/2016/10/OpenSchoolLogo_EmailSignature.jpg\"/></a></p>
         </body>
         </html>
      ";
      
      mail($email, $subject, $message, implode("\r\n", $headers));
   }
   
   $confirmation_message = "Thanks! A confirmation email has been sent.";
   echo $confirmation_message;
}

if ($error) {
   echo $error;
   echo render_event_php('event-signup-form.php');
}

?></div><?php });

?>