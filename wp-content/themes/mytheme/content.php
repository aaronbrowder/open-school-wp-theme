<div>
    
   <h2>
      <a href="<?php the_permalink(); ?>">
         <?php the_title(); ?>
      </a>
   </h2>
    
   <p>
      <?php 
      the_date();
      //blog_post_meta();
      ?>
   </p>
    
   <?php the_excerpt(); ?>
    
</div>

<?php function blog_post_meta() { ?>
   by <a href="#"><?php the_author(); ?></a>
   &middot;
   <a href="<?php comments_link(); ?>">
   	<?php	printf(_nx('One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'textdomain'), number_format_i18n(get_comments_number())); ?>
   </a>
<?php } ?>