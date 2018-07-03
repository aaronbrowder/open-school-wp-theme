<?php

$response = '';

$atts = $GLOBALS['atts'];
$default_message = $GLOBALS['content'];

$textarea_rows = $default_message ? 5 : 8;

if ($_POST['submitted']) {
   
   ?>
   <script>
      /* global fbq */
      fbq('track', 'Lead', { value: 250, currency: 'USD' });
      /* Event snippet for Contact conversion page */
      /* global gtag */
      debugger;
      gtag('event', 'conversion', {'send_to': 'AW-846232865/irPTCOn2g3wQofrBkwM'});
   </script>
   <?php
   
   $school_email = get_option('email');
   
   $missing_content = 'Please supply all information.';
   $email_invalid   = 'Email address is invalid.';
   $message_unsent  = 'Message was not sent. Try again.';
   $message_sent    = 'Thanks! Your message has been sent.';
   
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   $phone = $_POST['message_phone'];
   $message = $_POST['message_text'];
   
   if (!empty($default_message) && empty($message)) {
      // this is necessary in case the message box is hidden
      $message = $default_message;
   }
   
   if ($phone) {
      $message = $message . ' (My phone number is ' . $phone . ')';
   }
   
   $subject = $name . ' sent a message from The Open School\'s website';
   $headers = 'From: ' . $name . ' <' . $school_email . ">\r\n" . 'Reply-To: ' . $email;

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response = contact_form_generate_response('error', $email_invalid);
   }
   else if (empty($name) || empty($message)) {
      $response = contact_form_generate_response('error', $missing_content);
   }
   else {
      log_contact($name, $email, $message);
      $response = mail($school_email, $subject, strip_tags($message), $headers)
         ? contact_form_generate_response('success', $message_sent)
         : contact_form_generate_response('error', $message_unsent);
   }
}

echo $response;

?>

<form action="<?php the_permalink(); ?>" method="post">
   <table class="contact-us-table">
      <tbody>
         <tr>
            <th>Name</th>
            <td><input type="text" name="message_name" required/></td>
         </tr>
         <tr>
            <th>Email</th>
            <td><input type="email" name="message_email" required/></td>
         </tr>
         <?php if ($atts['show-phone'] == 'true') { ?>
            <tr>
               <th>Phone</th>
               <td><input type="text" class="contact-us-phone" name="message_phone"/></td>
            </tr>
         <?php } ?>
         <?php if ($atts['show-message'] == 'true') { ?>
            <tr>
               <th>Message</th>
               <td><textarea name="message_text" rows="<?php echo $textarea_rows; ?>" required><?php echo $default_message; ?></textarea></td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <input type="hidden" name="submitted" value="1">
   <button type="submit" class="contact-us-send"><?php echo $atts['button-text'] ?></button>
</form>