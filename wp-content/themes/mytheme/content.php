<div>
    
   <h2>
      <a href="<?php the_permalink(); ?>">
         <?php the_title(); ?>
      </a>
   </h2>
    
   <p>
      <?php 
      the_date();
      $comments_number = get_comments_number();
      if ($comments_number > 0) { ?>
         &middot;
         <a href="<?php comments_link(); ?>">
         	<?php	printf(_nx('One Comment', '%1$s Comments', $comments_number, 'comments title', 'textdomain'), number_format_i18n($comments_number)); ?>
         </a>
      <?php } ?>
   </p>
    
   <?php the_excerpt(); ?>
    
</div>