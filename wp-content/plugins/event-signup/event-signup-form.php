<form action="/event-confirmation-2" method="post">
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