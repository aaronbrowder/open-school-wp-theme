<?php get_header(); ?>

<div class="container">
   <div class="column">
      <div class="page">
      
         <?php
         if (have_posts()) : while (have_posts()) : the_post();
         
            get_template_part('content-single', get_post_format());
           
            if ( comments_open() || get_comments_number() ) :
         	   comments_template();
         	endif;
         
         endwhile; endif;
         ?>
      
      </div>
   </div>
</div>
  
<?php get_footer(); ?>