<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Cache-Control" content="no-store" />
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
         <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      
      <!-- Facebook Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '670072246516416'); // Insert your pixel ID here.
      fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=670072246516416&ev=PageView&noscript=1"
      /></noscript>
      <!-- DO NOT MODIFY -->
      <!-- End Facebook Pixel Code -->
      
      <!-- Global site tag (gtag.js) - Google AdWords: 846232865 -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=AW-846232865"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'AW-846232865');
      </script>
    
      <?php wp_head(); ?>
   </head>

   <body>
      
      <!-- Javascript SDK for Faceboox like box https://developers.facebook.com/docs/plugins/like-button -->
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=453699114753074";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <?php
      global $wp_query;
      $queried_object = $wp_query->get_queried_object();
   	$queried_object_id = (int) $wp_query->queried_object_id;
   	
      $menu_items = get_menu_items();
      $top_menu_items = array_filter($menu_items, function($o) { return empty($o->menu_item_parent); });
      $sub_menu_items = array_filter($menu_items, function($o) { return $o->menu_item_parent; });
      
      $current_sub_menu_items;
      ?>

      <div class="main-masthead-wrapper">
         <div class="main-masthead">
            <div class="container">
               <nav>
                  
                  <a class="header-logo" href="/">
                     <img height="30" src="<?php echo wp_get_attachment_url(get_option('header-logo-image-attachment-id')); ?>" alt="The Open School"/>
                  </a>
                  
                  <div id="hamburger" class="header-hamburger">
                     <i class="fa fa-bars"></i>
                  </div>
                  
                  <div id="search-activator" class="header-search-activator">
                     <i class="fa fa-search"></i>
                  </div>
                  
                  <ul id="main-menu" class="header-menu">
                     <?php foreach ($top_menu_items as $item):
                        
                        $id = get_page_id($item);
                        $page = get_page($id);
                        $link = get_page_link($id);
                        $children = array_filter($sub_menu_items, function($o) use ($item) { return $o->menu_item_parent == $item->ID; });
                        $children_ids = array_map('get_page_id', $children);
                        
                        $is_current = ($id == $queried_object_id) 
                           || in_array($queried_object_id, $children_ids)
                           || (endsWith($link, '/blog/') && is_single());
                        
                        if ($is_current) {
                           $current_sub_menu_items = $children;
                        }
                        ?>
                        
                        <li class="header-menu-item<?php
                                 echo ($is_current ? ' header-current-menu-item' : '');
                                 echo (!empty($children) ? ' has-children' : '');
                                 ?>">
                           <a href="<?php echo $link; ?>">
                              <?php echo $item->title; ?>
                           </a>
                           <?php if (!empty($children)) { ?>
                              <ul class="header-context-menu">
                                 <?php foreach ($children as $child) {
                                    $child_id = get_page_id($child);
                                    $child_link = get_page_link($child_id);
                                    ?>
                                    <li class="header-context-menu-item">
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
                  
                  <div id="search-area" class="header-search-area">
            			<div class="search-form">
                        <?php get_search_form(); ?>
                     </div>
                  </div>
                  
               </nav>
            </div>
         </div>
      </div>
      
      <?php if (!empty($current_sub_menu_items)) { ?>
         <div class="sub-masthead-wrapper">
            <div class="sub-masthead">
               <div class="container">
                  <nav>
                     <ul class="header-menu">
                        <?php foreach ($current_sub_menu_items as $item):
                           $id = get_page_id($item);
                           $link = get_page_link($id);
                           $is_current = $id == $queried_object_id;
                           ?>
                           <li class="header-menu-item <?php echo ($is_current ? 'header-current-menu-item' : ''); ?>">
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
      <?php } ?>
      
      <div class="nav-divider <?php empty($current_sub_menu_items) ? 'no-sub-header' : '' ?>"></div>
      
      <div class="<?php echo empty($current_sub_menu_items) ? '' : 'has-double-header'; ?>">