<?php

$atts = $GLOBALS['atts'];
$default_message = $GLOBALS['content'];

$is_spanish = get_locale() == 'es_MX';

$action = $is_spanish
   ? 'https://openschooloc.dm.networkforgood.com/forms/prospective-parent-spanish/submissions'
   : 'https://openschooloc.dm.networkforgood.com/forms/prospective-parent/submissions';

$name_label = $is_spanish ? 'Nombre' : 'Name';
$email_label = $is_spanish ? 'Email' : 'Email';
$phone_label = $is_spanish ? 'Celular' : 'Phone';
$text_label = $is_spanish ? 'Texto' : 'Text';
$address_label = $is_spanish ? 'Dirección' : 'Address';
$city_label = $is_spanish ? 'Cuidad' : 'City';
$state_label = $is_spanish ? 'Estado' : 'State';
$zip_label = $is_spanish ? 'Codigo postal' : 'Zip';
$campus_label = $is_spanish ? 'Campus' : 'Campus';
$children_label = $is_spanish ? "Los nombres<br>y edades de<br>los niños" : "Children's<br>names & ages";

$oc_text = $is_spanish ? 'Condado de Orange' : 'Orange County';
$tv_text = $is_spanish ? 'Temecula Valley' : 'Temecula Valley';

$button_text = $is_spanish ? 'Mandar' : 'Send';

$language_value = $is_spanish ? 'ffo-109411' : 'ffo-109410';

?>

<form method="post" action="<?php echo $action; ?>">
   <input type="hidden" name="authenticity_token" value="GOKMfFzGB1G2A0jTqEI0l55vNsYSIL5gl8N9dkcM2ymgGcxWPYOL9CE3iv/uX6RJbpY8Qgn/wTxhryoqSn2HuQ==">
   <table class="contact-us-table">
      <tbody>
         <tr>
            <th><?php echo $name_label; ?></th>
            <td><input type="text" name="form_submission[values_hash][78518]" id="form_submission_values_hash_78518" required placeholder="First Last"></td>
         </tr>
         <tr>
            <th><?php echo $email_label; ?></th>
            <td><input type="email" name="form_submission[values_hash][78519]" id="form_submission_values_hash_78519" required></td>
         </tr>
         <tr>
            <th><?php echo $phone_label; ?></th>
            <td><input type="tel" class="contact-us-short" name="form_submission[values_hash][78520]" id="form_submission_values_hash_78520" placeholder="123-456-7890"></td>
         </tr>
         <tr>
            <th><?php echo $address_label; ?></th>
            <td><input type="text" name="form_submission[values_hash][78521]" id="form_submission_values_hash_78521" required placeholder="123 Main St"></td>
         </tr>
         <tr>
            <th><?php echo $city_label; ?></th>
            <td><input type="text" class="contact-us-short" name="form_submission[values_hash][78522]" id="form_submission_values_hash_78522" required></td>
         </tr>
         <tr>
            <th><?php echo $state_label; ?></th>
            <td>
               <select name="form_submission[values_hash][78523]" id="form_submission_values_hash_78523" required class="contact-us-state-select">
                  <option value="">Select option...</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AS">American Samoa</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="AE">Armed Forces Africa, Canada, Europe, Middle East</option>
                  <option value="AA">Armed Forces Americas (except Canada)</option>
                  <option value="AP">Armed Forces Pacific</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District of Columbia</option>
                  <option value="FM">Federated States of Micronesia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="GU">Guam</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PW">Palau</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VI">Virgin Islands</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
               </select>
            </td>
         </tr>
         <tr>
            <th><?php echo $zip_label; ?></th>
            <td><input type="text" class="contact-us-short" name="form_submission[values_hash][78524]" id="form_submission_values_hash_78524" required></td>
         </tr>
         <tr>
            <th><?php echo $campus_label; ?></th>
            <td>
               <select name="form_submission[values_hash][79207]" id="form_submission_values_hash_79207" required>
                  <option value=""></option>
                  <option data-value="Orange County" value="ffo-109414"><?php echo $oc_text; ?></option>
                  <option data-value="Temecula Valley" value="ffo-109415"><?php echo $tv_text; ?></option>
               </select>
            </td>
         </tr>
         <tr>
            <th class="contact-us-compact-label"><?php echo $children_label; ?></th>
            <td><input type="text" name="form_submission[values_hash][78525]" id="form_submission_values_hash_78525"></td>
         </tr>
      </tbody>
   </table>
   <input type="hidden" name="form_submission[values_hash][79205]" id="form_submission_values_hash_79205" value="<?php echo $language_value; ?>">
   <button type="submit" class="contact-us-send"><?php echo $button_text; ?></button>
</form>