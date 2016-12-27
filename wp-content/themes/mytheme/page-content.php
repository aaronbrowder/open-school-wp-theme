<div class="page">
    
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
    
   <h1 class="page-title">
      <span class="text-light"><?php echo $title_prefix; ?></span>
      <span class="text-light-green"><?php the_title(); ?></span>
   </h1>
   
   <?php the_content(); ?>
    
</div>
