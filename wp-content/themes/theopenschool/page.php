<?php

page_template(function() {

$error = null;
$success_response = null;

if ($_POST['contact-submitted']) {
   $recipient_address = get_option('email');
   
   $missing_content = 'Recipient, name, and message are required. Please try again.';
   $email_invalid   = 'The email address you provided is invalid. Please try again.';
   $message_unsent  = 'Your message was not sent. Please try again.';
   $message_sent    = "Thank you! Your message has been sent. We'll get in touch with you shortly.";
   
   $recipient = $_POST['message_recipient'];
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   $phone = $_POST['message_phone'];
   $address = $_POST['message_address'];
   $city = $_POST['message_city'];
   $state = $_POST['message_state'];
   $zip = $_POST['message_zip'];
   $message = $_POST['message_text'];
   
   if (!empty($recipient)) {
      $recipient_address = get_option("contact-recipient-$recipient-address");
   }
   
   $subject = $name . ' sent a message from The Open School\'s website';

   $headers[] = 'MIME-Version: 1.0';
   $headers[] = 'Content-type: text/html; charset=iso-8859-1';
   $headers[] = "From: $name <$school_email>";
   $headers[] = "Reply-to: $email";
   
   $message = '<html><head></head><body><p>' . $message;
   
   if ($phone) {
      $message = $message . ' <p>Phone number: ' . $phone;
   }
   
   if ($address) {
      $message = $message . ' <p>Address:<br>' . $address;
      if ($city) {
         $message = $message . '<br>' . $city;   
      }
      if ($state) {
         $message = $message . ', ' . $state;   
      }
      if ($zip) {
         $message = $message . ' ' . $zip;   
      }
   }
   
   $message = $message . '</body></html>';

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = $email_invalid;
   }
   else if (empty($recipient) || empty($name) || empty($message)) {
      $error = $missing_content;
   }
   else {
      log_contact($name, $email, $message);
      if (mail($recipient_address, $subject, $message, implode("\r\n", $headers))) {
         $success_response = $message_sent;
      } else {
         $error = $message_unsent;
      }
   }
}
?>

   <div class="page">
      <?php
      
      if ($error) { ?>
         <div class='contact-us-error'><?php echo $error; ?></div>
      <?php }
      
      else if ($success_response) { ?>
         <div class='contact-us-success'><?php echo $success_response; ?></div>
      <?php }
      
      the_content();
      
      ?>
   </div>
   
<?php });