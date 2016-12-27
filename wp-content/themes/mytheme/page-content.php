<div class="site-page">
    
   <?php
   
   global $wp_query;
   $queried_object_id = $wp_query->queried_object_id;
   
   $title_prefix = '';
   $menu_items = get_menu_items();
   
   $current_sub_menu_items = array_filter($menu_items, function($o) use ($queried_object_id) { 
      return $o->menu_item_parent && get_page_id($o) == $queried_object_id;
   });
   
   if (!empty($current_sub_menu_items)) {
      $current_sub_menu_item = current($current_sub_menu_items);
      $parent_id = $current_sub_menu_item->menu_item_parent;
      $parent = current(array_filter($menu_items, function($o) use ($parent_id) { return $o->ID == $parent_id; }));
      $title_prefix = $parent->title . ' &middot; ';
   }
   
   ?>
    
   <h2 class="site-page-title">
      <span class="site-text-light"><?php echo $title_prefix; ?></span>
      <?php the_title(); ?>
   </h2>
   
   <?php the_content(); ?>
    
</div>
