<?php
/*
Template Name: Contact Us
*/

get_header(); ?>

<div class="container">
   <div class="page">
      <div class="column">
         <h1>Contact Us</h1>
         <form>
            <table class="contact-us-table">
               <tbody>
                  <tr>
                     <th>Your Name *</th>
                     <td><input type="text" name="name"/></td>
                  </tr>
                  <tr>
                     <th>Your Email *</th>
                     <td><input type="email" name="email"/></td>
                  </tr>
                  <tr>
                     <th>Subject</th>
                     <td><input type="text" name="subject"/></td>
                  </tr>
                  <tr>
                     <th>Message</th>
                     <td><textarea name="message" rows="10"></textarea></td>
                  </tr>
               </tbody>
            </table>
            <button type="submit" class="contact-us-send">Send</button>
         </form>
      </div>
   </div>
</div>

<?php get_footer(); ?>