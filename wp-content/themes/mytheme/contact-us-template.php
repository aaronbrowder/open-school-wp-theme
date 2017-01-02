<?php
/*
Template Name: Contact Us
*/

$response = '';

if ($_POST['submitted']) {
   
   $missing_content = 'Please supply all information.';
   $email_invalid   = 'Email address is invalid.';
   $message_unsent  = 'Message was not sent. Try Again.';
   $message_sent    = 'Thanks! Your message has been sent.';
   
   $name = $_POST['message_name'];
   $email = $_POST['message_email'];
   $message = $_POST['message_text'];
   
   $to = get_option('admin_email');
   $subject = 'Someone sent a message from ' . get_bloginfo('name');
   $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response = contact_form_generate_response('error', $email_invalid);
   }
   else if (empty($name) || empty($message)) {
      $response = contact_form_generate_response('error', $missing_content);
   }
   else {
      $response = wp_mail($to, $subject, strip_tags($message), $headers)
         ? contact_form_generate_response('success', $message_sent)
         : contact_form_generate_response('error', $message_unsent);
   }
}

get_header(); ?>

<div class="container">
   <div class="page">
      <div class="column">
         <h1>Contact Us</h1>
         <?php echo $response; ?>
         <form action="<?php the_permalink(); ?>" method="post">
            <table class="contact-us-table">
               <tbody>
                  <tr>
                     <th>Your Name</th>
                     <td><input type="text" name="message_name" required/></td>
                  </tr>
                  <tr>
                     <th>Your Email</th>
                     <td><input type="email" name="message_email" required/></td>
                  </tr>
                  <tr>
                     <th>Message</th>
                     <td><textarea name="message_text" rows="10" required></textarea></td>
                  </tr>
               </tbody>
            </table>
            <input type="hidden" name="submitted" value="1">
            <button type="submit" class="contact-us-send">Send</button>
         </form>
      </div>
   </div>
</div>

<?php get_footer(); ?>