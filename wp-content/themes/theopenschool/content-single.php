<h2 class="page-title">
   <?php the_title(); ?>
</h2>

<blockquote>
   from The Open School blog
   <?php
      $author = get_post_meta(get_the_ID(), 'Custom Author', true);
      if (!empty($author)) {
         ?> <br/>by <?php
         echo $author;
      } ?>
   <br/>
   <?php the_date(); ?>
</blockquote>

<?php the_content(); ?>

<nav class="blog-paginator">
	<ul>
		<li><?php next_post_link('%link', '&#9666;&nbsp; %title'); ?></li>
		<li><?php previous_post_link('%link', '%title &nbsp;&#9658;'); ?></li>
	</ul>
</nav>