<?php

$atts = $GLOBALS['atts'];
$default_message = $GLOBALS['content'];

$textarea_rows = $default_message ? 5 : 8;

$show_phone = $atts['show-phone'] == 'true';
$show_address = $atts['show-address'] == 'true';
$show_message = $atts['show-message'] == 'true';

?>

<form action="<?php echo get_the_permalink(); ?>" method="post">
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
         <?php if ($show_phone) { ?>
            <tr>
               <th>Phone</th>
               <td><input type="text" class="contact-us-short" name="message_phone"/></td>
            </tr>
         <?php } ?>
         <?php if ($show_address) { ?>
            <tr>
               <th>Address</th>
               <td><input type="text" name="message_address"/></td>
            </tr>
            <tr>
               <th>City</th>
               <td><input type="text" class="contact-us-short" name="message_city"/></td>
            </tr>
            <tr>
               <th>State</th>
               <td><input type="text" class="contact-us-short" name="message_state"/></td>
            </tr>
            <tr>
               <th>Zip</th>
               <td><input type="text" class="contact-us-short" name="message_zip"/></td>
            </tr>
         <?php } ?>
         <?php if ($show_message) { ?>
            <tr>
               <th>Message</th>
               <td><textarea name="message_text" rows="<?php echo $textarea_rows; ?>" required><?php echo $default_message; ?></textarea></td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <?php if (!$show_message) { ?>
      <input type="hidden" name="message_text" value="<?php echo $default_message; ?>">
   <?php } ?>
   <input type="hidden" name="contact-submitted" value="1">
   <button type="submit" class="contact-us-send"><?php echo $atts['button-text'] ?></button>
</form>