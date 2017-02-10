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

<div class="blog-footer">
   
   <div class="blog-share">
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
   </div>
   
   <div class="blog-buttons">
      
      <div class="blog-apply">
         <h4>Join our school</h4>
         <a href="/admissions" class="blog-button">Apply Now</a>
      </div>
      
      <div class="blog-donate">
         <h4>Support our school</h4>
         <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input name="cmd" type="hidden" value="_s-xclick" />
            <input name="hosted_button_id" type="hidden" value="6UHSFSZE64B4C" />
            <button type="submit" name="submit" class="blog-button blog-donate-button">Donate</button>
         </form>
      </div>
      
   </div>
      
</div>

<nav class="blog-paginator">
	<ul>
	   <?php
	   $next_post_link = get_next_post_link('%link', '&laquo;&nbsp; %title');
	   if (!empty($next_post_link)) { ?>
	      <li><?php echo $next_post_link ?></li>
	   <?php } ?>
		<li><?php previous_post_link('%link', '%title &nbsp;&raquo;'); ?></li>
	</ul>
</nav>