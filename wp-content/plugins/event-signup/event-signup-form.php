<?php

global $wpdb;
global $table_name;

$response = '';

if ($_POST['submitted']) {

   $missing_content  = 'Please supply all information.';
   $email_invalid    = 'Email address is invalid.';
   $timeslot_invalid = 'Time slot is invalid.';
   $no_adults        = 'You must be bringing at least one adult.';
   
   $accepted_timeslots = array('6 PM', '6:30 PM', '7 PM');
   
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   $timeslot = $_POST['timeslot'];
   $adult_count = intval($_POST['adult_count']);
   $child_count = intval($_POST['child_count']);
   
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response = contact_form_generate_response('error', $email_invalid);
   }
   else if (empty($name) || empty($timeslot)) {
      $response = contact_form_generate_response('error', $missing_content);
   }
   else if (!in_array($timeslot, $accepted_timeslots)) {
      $response = contact_form_generate_response('error', $timeslot_invalid);
   }
   else if (empty($adult_count)) {
      $response = contact_form_generate_response('error', $no_adults);
   }
   else {
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
               on Thursday, March 16, at $timeslot. We look forward to meeting $who!
            </p>
            <p>
               We're located at $address (<a href=\"http://openschooloc.com/location\">map</a>).
               Enter through the gate on Rancho Santiago, and park when you see the Open School
               van. Walk past the playground toward the courtyard and look for the balloons.
               Your Open School host will meet you there.
            </p>
            <p><a href=\"http://openschooloc.com\"><img src=\"https://ci5.googleusercontent.com/proxy/lgZE3sYa9StDYkzvPBISfcykHV1tTc9DKmKsUPffLhi4cLLP-48n89ZCiyaqQ7_GwhV-u0vccunt95MnpvNDYhpi0okPkTb0XfLPx_jjGpjZAjyYm1NfcvORHViQ7g22fF5ah3u0S4tDQO343Eq3NAc=s0-d-e1-ft#http://www.openschooloc.com/wp/wp-content/uploads/2016/10/OpenSchoolLogo_EmailSignature.jpg\"/></a></p>
         </body>
      </html>
      ";
      
      mail($email, $subject, $message, implode("\r\n", $headers));
      
      $confirmation_message = "Thanks! We'll see you at $timeslot.";
      $response = contact_form_generate_response('success', $confirmation_message);
   }
}

echo $response;

?>

<form action="<?php the_permalink(); ?>" method="post">
   <table class="contact-us-table">
      <tbody>
         <tr>
            <th>Your Name</th>
            <td><input type="text" name="message_name" value="<?php echo $name ?>" required/></td>
         </tr>
         <tr>
            <th>Your Email</th>
            <td><input type="email" name="message_email" value="<?php echo $email ?>" required/></td>
         </tr>
      </tbody>
   </table>
   <table class="contact-us-table">
      <tbody>
         <tr>
            <th>Which time slot<br/>would you like?</th>
            <td>
               <label><input type="radio" name="timeslot" value="6 PM" required/> 6-7 PM</label><br/>
               <label><input type="radio" name="timeslot" value="6:30 PM" required/> 6:30-7:30 PM</label><br/>
               <label><input type="radio" name="timeslot" value="7 PM" required/> 7-8 PM</label>
            </td>
         </tr>
         <tr>
            <th>How many adults?</th>
            <td><input type="number" name="adult_count" value="<?php echo $adult_count ?>" required/></td>
         </tr>
         <tr>
            <th>How many children?</th>
            <td><input type="number" name="child_count" value="<?php echo $child_count ?>"/></td>
         </tr>
      </tbody>
   </table>
   <input type="hidden" name="submitted" value="1">
   <button type="submit" class="contact-us-send">Sign Up</button>
</form>