<?php 

/*
Template Name: Blog Subset
*/

page_template(function() { ?>

   <div class="page">
      <?php
      global $post;
      $category_id = get_the_content();
      $args = array('category' => $category_id, 'order' => 'ASC');
      $myposts = get_posts($args);
      
      foreach ($myposts as $post) {
         setup_postdata($post);
		   ?>
		   <div class="blog-excerpt-container">
            <h2>
               <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
               </a>
            </h2>
            <?php the_custom_description(); ?>
         </div>
		   <?php
      }
      
      wp_reset_postdata();
      ?>
   </div>
   
<?php });