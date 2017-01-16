<h2 class="page-title">
   <?php the_title(); ?>
</h2>

<blockquote>
   <?php
      $author = get_post_meta(get_the_ID(), 'Custom Author', true);
      if (!empty($author)) { ?>
         by <?php echo $author; ?><br/>
      <?php } ?>
   <?php the_date(); ?>
</blockquote>

<?php the_content(); ?>

<nav class="blog-paginator">
	<ul>
		<li><?php next_post_link('%link', '&#9668;&nbsp; %title'); ?></li>
		<li><?php previous_post_link('%link', '%title &nbsp;&#9658;'); ?></li>
	</ul>
</nav>