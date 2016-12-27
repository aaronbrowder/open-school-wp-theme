<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    
      <?php wp_head(); ?>
   </head>

   <body>

      <?php
      global $wp_query;
      $queried_object = $wp_query->get_queried_object();
   	$queried_object_id = (int) $wp_query->queried_object_id;
   	
      $menu_items = get_menu_items();
      $top_menu_items = array_filter($menu_items, function($o) { return empty($o->menu_item_parent); });
      $sub_menu_items = array_filter($menu_items, function($o) { return $o->menu_item_parent; });
      
      $current_sub_menu_items;
      ?>

      <div class="site-masthead-wrapper">
         <div class="site-main-masthead">
            <div class="container">
               <nav class="site-nav">
                  
                  <a class="header-logo" href="/">
                     <img height="30" src="<?php echo wp_get_attachment_url(get_option('header-logo-image-attachment-id')); ?>" alt="The Open School"/>
                  </a>
                  
                  <ul class="menu">
                     <?php foreach ($top_menu_items as $item):
                        
                        $id = get_page_id($item);
                        $page = get_page($id);
                        $link = get_page_link($id);
                        $children = array_filter($sub_menu_items, function($o) use ($item) { return $o->menu_item_parent == $item->ID; });
                        $children_ids = array_map('get_page_id', $children);
                        $is_current = ($id == $queried_object_id) || in_array($queried_object_id, $children_ids);
                        if ($is_current) {
                           $current_sub_menu_items = $children;
                        }
                        ?>
                        
                        <li class="menu-item<?php
                                 echo ($is_current ? ' current-menu-item' : '');
                                 echo (!empty($children) ? ' has-children' : '');
                                 ?>">
                           <a href="<?php echo $link; ?>">
                              <?php echo $item->title; ?>
                           </a>
                           <?php if (!empty($children)) { ?>
                              <ul class="context-menu">
                                 <?php foreach ($children as $child) {
                                    $child_id = get_page_id($child);
                                    $child_link = get_page_link($child_id);
                                    ?>
                                    <li class="context-menu-item">
                                       <a href="<?php echo $child_link; ?>">
                                          <?php echo $child->title; ?>
                                       </a>
                                    </li>
                                 <?php } ?>
                              </ul>
                           <?php } ?>
                        </li>
                           
                     <?php endforeach; ?>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
      
      <?php if (!empty($current_sub_menu_items)) { ?>
         <div class="site-masthead-wrapper">
            <div class="site-sub-masthead">
               <div class="container">
                  <nav class="site-nav">
                     <ul class="menu">
                        <?php foreach ($current_sub_menu_items as $item):
                           $id = get_page_id($item);
                           $link = get_page_link($id);
                           $is_current = $id == $queried_object_id;
                           ?>
                           <li class="menu-item <?php echo ($is_current ? 'current-menu-item' : ''); ?>">
                              <a href="<?php echo $link; ?>">
                                 <?php echo $item->title; ?>
                              </a>
                           </li>
                           
                        <?php endforeach; ?>
                     </ul>   
                  </nav>
               </div>
            </div>
         </div>
      <?php }
      
      if (empty($current_sub_menu_items)) { ?>
         <div class="site-nav-divider"></div>
      <?php } ?>
   