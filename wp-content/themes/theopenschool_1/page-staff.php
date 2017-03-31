<?php 

/*
Template Name: Staff
*/

page_template(function() { 

   $content = get_the_content();
   $content = apply_filters('the_content', $content);
   
   $items = explode('<p><a', $content);
   
   foreach ($items as &$item) {
      if (empty($item)) continue;
      $split = explode('></p>', $item);
      $image_content = $split[0];
      $text_content = $split[1];
      $image_part = "<div class='page-staff-pic'><a{$image_content}></div>";
      $text_part = "<div class='page-staff-bio'>{$text_content}</div>";
      $item = "<div class='page-staff'>{$image_part}{$text_part}</div>";
   }
   
   $content = implode('', $items);

   ?>

   <div class="page">
      <?php echo $content; ?>
   </div>
   
<?php });