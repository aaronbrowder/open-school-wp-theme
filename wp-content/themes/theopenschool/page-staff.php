<?php 

/*
Template Name: Staff
*/

page_template(function() { 

   $content = get_the_content();
   $content = apply_filters('the_content', $content);

   ?>
   
   <div class="page">
      <?php echo $content; ?>
   </div>
   
<?php });