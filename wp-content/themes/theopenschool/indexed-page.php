<?php 

/*
Template Name: Indexed
*/

get_header(); ?>

<div class="container">
   <div class="column">
      
      <?php if (have_posts()) {
         while (have_posts()) {
            the_post();
            get_template_part('indexed-page-content', get_post_format());
         }
      } ?>
   
   </div>
</div>

<?php get_footer(); ?>