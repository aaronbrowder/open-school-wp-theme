<?php 

/*
Template Name: Indexed
*/

page_template(function() {

   $content = get_the_content();
   $content = apply_filters('the_content', $content);
   
   $contents_list_items_array = array();
   $sections = explode('<h2>', $content);
   $intro = array_shift($sections);
   
   foreach ($sections as &$section) {
      if (empty($section)) continue;
      $split = explode('</h2>', $section);
      $header_text = $split[0];
      $content = $split[1];
      $content = $content . '<a href="#">Go to top &nbsp;&#9652;</a>';
      $header_id = str_replace(' ', '_', $header_text);
      $section = "<h2 id='{$header_id}'>{$header_text}</h2>{$content}";
      $contents_list_item = "<li><a href='#{$header_id}'>{$header_text}</a></li>";
      array_push($contents_list_items_array, $contents_list_item);
   }
   
   $content = implode('', $sections);
   $contents_list_items = implode('', $contents_list_items_array);
   
   ?>

   <div class="page">
      
      <?php echo $intro; ?>
      
      <div class="page-table-of-contents">
         <h3>Contents</h3>
         <ul><?php echo $contents_list_items; ?></ul>
      </div>
      
      <?php echo $content; ?>
      
   </div>
   
<?php });