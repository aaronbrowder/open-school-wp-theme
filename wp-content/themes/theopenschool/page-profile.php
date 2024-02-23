<?php 

/*
Template Name: Profile
*/

page_template(function() { 

   $content = get_the_content();
   $content = apply_filters('the_content', $content);
   
   $items = explode('<p><img', $content);
   
   foreach ($items as &$item) {
      if (empty($item)) continue;
      $split = explode('/></p>', $item);
      $image_content = $split[0];
      $text_content = $split[1];
      $image_part = "<div class='page-profile-pic'><img{$image_content}/></div>";
      $text_part = "<div class='page-profile-bio'>{$text_content}</div>";
      $item = "<div class='page-profile'>{$image_part}{$text_part}</div>";
   }
   
   $content = implode('', $items);

   ?>

   <div class="page">
      <?php echo $content; ?>
   </div>
   
<?php });