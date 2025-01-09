<?php

$atts = $GLOBALS['atts'];
$default_message = $GLOBALS['content'];

$textarea_rows = 5;

$button_text = $atts['button-text'];

$show_phone = $atts['show-phone'] == 'true';
$show_address = $atts['show-address'] == 'true';
$show_message = $atts['show-message'] == 'true';
$show_preference = $atts['show-preference'] == 'true';
$show_recipients = $atts['show-recipients'] == 'true';

$recipient_label = $atts['recipient-label'];
$recipients = explode(',', $atts['recipients']);

$success_url = $atts['success-url'];
if (empty($success_url)) {
   $success_url = get_the_permalink();
}

$is_spanish = get_locale() == 'es_MX';
$name_label = $is_spanish ? 'Nombre' : 'Name';
$email_label = $is_spanish ? 'Email' : 'Email';
$phone_label = $is_spanish ? 'Celular' : 'Phone';
$text_label = $is_spanish ? 'Texto' : 'Text';
$address_label = $is_spanish ? 'Dirección' : 'Address';
$city_label = $is_spanish ? 'Cuidad' : 'City';
$state_label = $is_spanish ? 'Estado' : 'State';
$zip_label = $is_spanish ? 'Codigo postal' : 'Zip';
$message_label = $is_spanish ? 'Mensaje' : 'Message';
$preference_label = $is_spanish ? 'Preferencia' : 'Preference';
$program_label = $is_spanish ? 'Programa' : 'Program';
$in_person_label = $is_spanish ? 'en Persona' : 'In-Person';
$virtual_label = $is_spanish ? 'Virtual' : 'Virtual';

?>

<form action="<?php echo $success_url ?>" method="post">
   <table class="contact-us-table">
      <tbody>
         <tr>
            <th><label for="name"><?php echo $name_label; ?></label></th>
            <td><input type="text" name="message_name" id="name" required/></td>
         </tr>
         <tr>
            <th><label for="email"><?php echo $email_label; ?></label></th>
            <td><input type="email" name="message_email" id="email" required/></td>
         </tr>
         <?php if ($show_phone) { ?>
            <tr>
               <th><label for="phone"><?php echo $phone_label; ?></label></th>
               <td><input type="text" class="contact-us-short" name="message_phone" id="phone" required/></td>
            </tr>
         <?php } ?>
         <?php if ($show_address) { ?>
            <tr>
               <th><label for="address"><?php echo $address_label; ?></label></th>
               <td><input type="text" name="message_address" id="address"/></td>
            </tr>
            <tr>
               <th><label for="city"><?php echo $city_label; ?></label></th>
               <td><input type="text" class="contact-us-short" name="message_city" id="city"/></td>
            </tr>
            <tr>
               <th><label for="state"><?php echo $state_label; ?></label></th>
               <td><input type="text" class="contact-us-short" name="message_state" id="state"/></td>
            </tr>
            <tr>
               <th><label for="zip"><?php echo $zip_label; ?></zip></th>
               <td><input type="text" class="contact-us-short" name="message_zip" id="zip"/></td>
            </tr>
         <?php } ?>
         <tr>
            <th><label for="program"><?php echo $program_label; ?></label></th>
            <td>
               <select name="message_program" id="program" required>
                  <option></option>
                  <option value="In-Person"><?php echo $in_person_label; ?></option>
                  <option value="Virtual"><?php echo $virtual_label; ?></option>
               </select>
            </td>
         </tr>
         <?php if ($show_message) { ?>
            <tr>
               <th><label for="message"><?php echo $message_label; ?></label></th>
               <td><textarea name="message_text" id="message" rows="<?php echo $textarea_rows; ?>" required><?php echo $default_message; ?></textarea></td>
            </tr>
         <?php } ?>
         <?php if ($show_preference) { ?>
            <tr>
               <th><label for="preference"><?php echo $preference_label; ?></label></th>
               <td>
                  <select name="message_preference" id="preference" required>
                     <option value="Email"><?php echo $email_label; ?></option>
                     <option value="Text"><?php echo $text_label; ?></option>
                     <option value="Phone"><?php echo $phone_label; ?></option>
                  </select>
               </td>
            </tr>
         <?php } ?>
         <?php if ($show_recipients) { ?>
            <tr>
               <th><label for="recipient"><?php echo $recipient_label; ?></label></th>
               <td>
                  <select name="message_recipient" id="recipient" required>
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
         <?php } ?>
         <?php if ($show_phone) { ?>
            <tr>
               <td colspan="2">
                  <input type="radio" id="optin-yes" name="message_optin" value="optin-yes" checked>
                  <label for="optin-yes">Yes, I agree to receive text messages from The Open School to the number listed above.</label>
                  <p class="contact-us-optin-notice"><em>Messaging frequency may vary and may include appointment reminders, informational messages, and promotional messages. Message and data rates apply. You may opt out at any time by replying "STOP". For help, reply "HELP".</em></p>
                  <input type="radio" id="optin-no" name="message_optin" value="optin-no">
                  <label for="optin-no">No, I do not want to receive text messages from The Open School.</label>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
   <?php if (!$show_message) { ?>
      <input type="hidden" name="message_text" value="<?php echo $default_message; ?>">
   <?php } ?>
   <input type="hidden" name="contact-submitted" value="1">
   <button type="submit" class="contact-us-send"><?php echo $button_text; ?></button>
   <p class="contact-us-optin-notice"><em>Read about our privacy policy <a href="/privacypolicy" target="_blank">here</a>.</em></p>
</form>