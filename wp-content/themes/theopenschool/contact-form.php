<?php

$atts = $GLOBALS['atts'];
$default_message = $GLOBALS['content'];

$textarea_rows = $default_message ? 5 : 7;

$button_text = $atts['button-text'];

$show_phone = $atts['show-phone'] == 'true';
$show_address = $atts['show-address'] == 'true';
$show_message = $atts['show-message'] == 'true';

$recipient_label = $atts['recipient-label'];
$recipients = explode(',', $atts['recipients']);  

$is_spanish = get_locale() == 'es_MX';
$name_label = $is_spanish ? 'Name Es' : 'Name';
$email_label = $is_spanish ? 'Email Es' : 'Email';
$phone_label = $is_spanish ? 'Phone Es' : 'Phone';
$address_label = $is_spanish ? 'Address Es' : 'Address';
$city_label = $is_spanish ? 'City Es' : 'City';
$state_label = $is_spanish ? 'State Es' : 'State';
$zip_label = $is_spanish ? 'Zip Es' : 'Zip';
$message_label = $is_spanish ? 'Message Es' : 'Message';

?>

<form action="<?php echo get_the_permalink(); ?>" method="post">
   <table class="contact-us-table">
      <tbody>
         <tr>
            <th><?php echo $name_label; ?></th>
            <td><input type="text" name="message_name" required/></td>
         </tr>
         <tr>
            <th><?php echo $email_label; ?></th>
            <td><input type="email" name="message_email" required/></td>
         </tr>
         <?php if ($show_phone) { ?>
            <tr>
               <th><?php echo $phone_label; ?></th>
               <td><input type="text" class="contact-us-short" name="message_phone"/></td>
            </tr>
         <?php } ?>
         <?php if ($show_address) { ?>
            <tr>
               <th><?php echo $address_label; ?></th>
               <td><input type="text" name="message_address"/></td>
            </tr>
            <tr>
               <th><?php echo $city_label; ?></th>
               <td><input type="text" class="contact-us-short" name="message_city"/></td>
            </tr>
            <tr>
               <th><?php echo $state_label; ?></th>
               <td><input type="text" class="contact-us-short" name="message_state"/></td>
            </tr>
            <tr>
               <th><?php echo $zip_label; ?></th>
               <td><input type="text" class="contact-us-short" name="message_zip"/></td>
            </tr>
         <?php } ?>
         <?php if ($show_message) { ?>
            <tr>
               <th><?php echo $message_label; ?></th>
               <td><textarea name="message_text" rows="<?php echo $textarea_rows; ?>" required><?php echo $default_message; ?></textarea></td>
            </tr>
         <?php } ?>
         <tr>
            <th><?php echo $recipient_label; ?></th>
            <td>
               <select name="message_recipient" required>
                  <?php if (sizeof($recipients) > 1) { ?>
                     <option></option>
                  <?php } ?>
                  <?php foreach ($recipients as $recipient) {
                     $name_id = "contact-recipient-$recipient-name";
                     if (get_locale() == 'es_MX') {
                        $name_id .= '-es';
                     }
                     $name = get_option($name_id);
                     if (!empty($name)) { ?>
                        <option value="<?php echo $recipient; ?>"><?php echo $name; ?></option> 
                     <?php }
                  } ?>
               </select>
            </td>
         </tr>
      </tbody>
   </table>
   <?php if (!$show_message) { ?>
      <input type="hidden" name="message_text" value="<?php echo $default_message; ?>">
   <?php } ?>
   <input type="hidden" name="contact-submitted" value="1">
   <button type="submit" class="contact-us-send"><?php echo $button_text; ?></button>
</form>