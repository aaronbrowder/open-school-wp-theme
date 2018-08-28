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
        <i class="fa fa-facebook-square"></i>
      </a>
      <a class="blog-share-twitter" 
         href="https://twitter.com/share"
         target="_blank">
        <i class="fa fa-twitter"></i>
      </a>
      <a class="blog-share-email"
         href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $email_body; ?>"
         target="_blank">
         <i class="fa fa-envelope"></i>
      </a>
   </div>
   
   <div class="blog-buttons">
      <div class="blog-apply">
         <h4>Join our school</h4>
         <a href="/wp/admissions" class="small-button">Apply Now</a>
      </div>
      <?php fb_like_box(); ?>
      <div class="blog-subscribe">
         <h4>Get notified about new posts</h4>
         <form class="es_shortcode_form" data-es_form_id="es_shortcode_form">
            <input type="email" class="email" placeholder="email address" id="es_txt_email" name="es_txt_email" value="" maxlength="60" required="">
            <button id="es_txt_button" class="button" name="subscribe" type="submit">&raquo;</button>
            <div class="es_msg">
               <span id="es_msg" class="blog-subscribe-confirmation"></span>
            </div>
            <input type="hidden" id="es_txt_name" name="es_txt_name" value="">
            <input type="hidden" id="es_txt_group" name="es_txt_group" value="Blog">
            <input type="hidden" name="es-subscribe" id="es-subscribe" value="d2ebde32ba">
         </form>
      </div>
   </div>
   
   <div class="blog-fb-like-full">
      <?php fb_page_plugin_large(); ?>
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