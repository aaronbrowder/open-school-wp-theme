<h2 class="page-title">
   <?php the_title(); ?>
</h2>

<blockquote>
   <?php
   the_custom_author();
   the_date();
   ?>
</blockquote>

<?php the_content(); ?>

<hr/>
<br/>

<h4>Share this</h4>

<?php
$url = urlencode(get_permalink());
$title = urlencode(get_the_title() . ' – ' . get_bloginfo('name'));
$email_body = urlencode("Hi,\n\nI thought you'd like this:\n" . get_permalink());
?>

<a class="blog-share-facebook" 
   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"
   target="_blank">
  <span class="icon icon-facebook-square"></span>
</a>

<a class="blog-share-email"
   href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $email_body; ?>"
   target="_blank">
   <span class="icon icon-envelope"></span>
</a>

<nav class="blog-paginator">
	<ul>
		<li><?php next_post_link('%link', '&laquo;&nbsp; %title'); ?></li>
		<li><?php previous_post_link('%link', '%title &nbsp;&raquo;'); ?></li>
	</ul>
</nav>