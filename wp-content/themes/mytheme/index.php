<?php get_header(); ?>

	<div class="container">
		<div class="row">
		   <div class="col-sm-8">
		      
      		<?php if (have_posts()) {
   		      
      			while (have_posts()) { 
      			   the_post();
      				get_template_part('content', get_post_format());
      			} ?>
      			
               <nav>
               	<ul>
               		<li><?php next_posts_link('Earlier Posts'); ?></li>
               		<li><?php previous_posts_link('Later Posts'); ?></li>
               	</ul>
               </nav>
      
      		<?php } ?>
      		
         </div>
		</div>
	</div>


<?php get_footer(); ?>
