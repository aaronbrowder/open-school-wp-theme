<?php

global $wpdb;
global $table_name;

$response = '';

if ($_POST['submitted']) {

   $missing_content = 'Please supply all information.';
   $email_invalid   = 'Email address is invalid.';
   $no_adults       = 'You must be bringing at least one adult.';
   
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   $timeslot = $_POST['timeslot'];
   $adult_count = $_POST['adult_count'];
   $child_count = $_POST['child_count'];
   
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response = contact_form_generate_response('error', $email_invalid);
   }
   else if (empty($name) || empty($timeslot)) {
      $response = contact_form_generate_response('error', $missing_content);
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
      $response = contact_form_generate_response('success', 'Thanks! We\'ll see you at ' . $timeslot . '.');
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
            <th>What time will you be coming?</th>
            <td>
               <label><input type="radio" name="timeslot" value="6 PM" required/> 6-7 PM</label><br/>
               <label><input type="radio" name="timeslot" value="7 PM" required/> 7-8 PM</label>
            </td>
         </tr>
         <tr>
            <th>How many adults are coming?</th>
            <td><input type="number" name="adult_count" value="<?php echo $adult_count ?>" required/></td>
         </tr>
         <tr>
            <th>How many children?</th>
            <td><input type="number" name="child_count" value="<?php echo $child_count ?>" required/></td>
         </tr>
      </tbody>
   </table>
   <input type="hidden" name="submitted" value="1">
   <button type="submit" class="contact-us-send">Sign Up</button>
</form>