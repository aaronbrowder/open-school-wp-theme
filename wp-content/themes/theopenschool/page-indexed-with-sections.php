<?php 

/*
Template Name: Indexed With Sections
*/

page_template(function() {

   $content = get_the_content();
   $content = apply_filters('the_content', $content);
   
   $toc_sections_array = array();
   $sections = explode('<h2>', $content);
   $intro = array_shift($sections);
   
   foreach ($sections as &$section) {

      if (empty($section)) continue;
      $split = explode('</h2>', $section);
      $section_title = $split[0];
      $content = $split[1];

      $toc_list_items_array = array();
      $sub_sections = explode('<h3>', $content);
      $section_intro = array_shift($sub_sections);

      foreach ($sub_sections as &$sub_section) {
         if (empty($sub_section)) continue;
         $sub_split = explode('</h3>', $sub_section);
         $sub_title = $sub_split[0];
         $sub_content = $sub_split[1];
         $sub_content = $sub_content . '<a href="#">Go to top &nbsp;&#9652;</a>';
         $header_id = str_replace(' ', '_', $sub_title);
         $sub_section = "<h3 id='{$header_id}'>{$sub_title}</h3>{$sub_content}";
         $toc_list_item = "<li><a href='#{$header_id}'>{$sub_title}</a></li>";
         array_push($toc_list_items_array, $toc_list_item);
      }

      $section = "<h2 class='page-indexed-section-header'>{$section_title}</h2>" . $section_intro . implode('', $sub_sections);

      $toc_section_start = "<div class='page-table-of-contents'><h3>{$section_title}</h3>{$sub_intro}<ul>";
      $toc_section_end = "</ul></div>";
      $toc_section = $toc_section_start . implode('', $toc_list_items_array) . $toc_section_end;
      array_push($toc_sections_array, $toc_section);
   }
   
   $content = implode('', $sections);
   $toc_sections = implode('', $toc_sections_array);
   
   ?>

   <div class="page">
      <?php echo $intro; ?>
      <?php echo $toc_sections; ?>
      <?php echo $content; ?>
   </div>
   
<?php });