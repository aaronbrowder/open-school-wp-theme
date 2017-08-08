<?php

global $wpdb;
global $table_name;

$error = null;

if ($_POST['submitted']) {

   $missing_content  = 'Please supply all information.';
   $email_invalid    = 'Email address is invalid.';
   $no_adults        = 'You must be bringing at least one adult.';
   
   $total_for_first_timeslot = $wpdb->get_results(
      "SELECT SUM(adult_count) AS total FROM $table_name GROUP BY timeslot having timeslot = '6 PM'"
      )[0]->total;
      
   $total_for_second_timeslot = $wpdb->get_results(
      "SELECT SUM(adult_count) AS total FROM $table_name GROUP BY timeslot having timeslot = '6:45 PM'"
      )[0]->total;
      
   $timeslot = $total_for_first_timeslot < 9 || $total_for_first_timeslot < $total_for_second_timeslot
      ? '6 PM' : '6:45 PM';
   
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   $adult_count = intval($_POST['adult_count']);
   $child_count = intval($_POST['child_count']);
   
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = contact_form_generate_response('error', $email_invalid);
   }
   else if (empty($name)) {
      $error = contact_form_generate_response('error', $missing_content);
   }
   else if (empty($adult_count)) {
      $error = contact_form_generate_response('error', $no_adults);
   }
   else {
      
      $five_seconds_ago = date('Y-m-d H:i:s', time() - 5);
      $duplicates = $wpdb->get_results(
         "SELECT COUNT(*) AS c FROM $table_name wHERE name = '$name' AND time > '$five_seconds_ago'"
         )[0]->c;
         
      if ($duplicates == 0) {
         
         $wpdb->insert($table_name, array(
            'time' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'timeslot' => $timeslot,
            'adult_count' => $adult_count,
            'child_count' => $child_count
         ));
         
         $school_email = get_option('email');
         $address = get_option('address1') . ', ' . get_option('address2');
         
         $headers[] = 'MIME-Version: 1.0';
         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
         $headers[] = "From: The Open School <$school_email>";
         $headers[] = "Reply-to: $school_email";
         
         $subject = 'The Open School Walkthrough';
         $who = $child_count > 0 ? ($child_count > 1 ? 'you and your kids' : 'you and your child') : 'you';
         $message = "
            <html>
            <head></head>
            <body>
               <p>Hi $name,</p>
               <p>
                  This is to confirm that you've signed up to visit The Open School
                  on Tuesday, August 22nd. Please arrive at $timeslot, when your tour will
                  begin. We look forward to meeting $who!
               </p>
               <p>
                  We're located at $address (<a href=\"http://openschooloc.com/location\">map</a>).
                  Enter through the gate on Rancho Santiago, and park near the Open School
                  van. Walk past the playground toward the courtyard. Your Open School host will meet you there.
               </p>
               <p><a href=\"http://openschooloc.com\"><img src=\"https://ci5.googleusercontent.com/proxy/lgZE3sYa9StDYkzvPBISfcykHV1tTc9DKmKsUPffLhi4cLLP-48n89ZCiyaqQ7_GwhV-u0vccunt95MnpvNDYhpi0okPkTb0XfLPx_jjGpjZAjyYm1NfcvORHViQ7g22fF5ah3u0S4tDQO343Eq3NAc=s0-d-e1-ft#http://www.openschooloc.com/wp/wp-content/uploads/2016/10/OpenSchoolLogo_EmailSignature.jpg\"/></a></p>
            </body>
            </html>
         ";
         
         mail($email, $subject, $message, implode("\r\n", $headers));
      }
      
      $confirmation_message = "Thanks! We'll see you at $timeslot. You will receive a confirmation email shortly.";
      echo $confirmation_message;
   }
}

if ($error) {
   echo $error;
   echo render_event_php('event-signup-form.php');
}

?>