<?php get_header(); ?>

<div class="container">
   <div class="row">
      <div class="col-sm-8">
      
         <?php if (have_posts()) {
            
            while (have_posts()) {
               the_post();
               get_template_part('page-content', get_post_format());
            }
            
         } ?>
      
      </div>
   </div>
</div>

<?php get_footer(); ?>