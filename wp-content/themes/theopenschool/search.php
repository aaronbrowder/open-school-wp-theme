<head>
<meta name="robots" content="noindex">

<?php get_header(); ?>

	<div class="container">
	   <div class="page">
	      
	      <h1>
	      	Search Results for "<?php echo get_search_query(); ?>"
         </h1>
	      
         <div class="search-form">
            <?php //get_search_form(); ?>
         </div>
		      
   		<?php if (have_posts()) { ?>
		      
   			<?php while (have_posts()) { 
   			   the_post();
   				get_template_part('search-content', get_post_format());
   			}
			} else { ?>
			   <div class="search-no-results">
			      No results for "<?php echo get_search_query(); ?>".
		      </div>
			<?php } ?>
   		
		</div>
	</div>

<?php get_footer(); ?>
