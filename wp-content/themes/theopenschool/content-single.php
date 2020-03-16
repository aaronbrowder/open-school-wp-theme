<h1 class="post-title">
   <?php the_title(); ?>
</h1>

<?php
$is_product_page = false;
global $wp;
$current_slug = add_query_arg(array(), $wp->request);
$pieces = explode("/", $current_slug);
if (sizeof($pieces) > 0 && $pieces[0] == 'product') {
   $is_product_page = true;
}
?>

<?php if (!$is_product_page) { ?>
   <blockquote class="post-meta">
      <?php
      the_custom_author();
      the_date();
      ?>
   </blockquote>
<?php } ?>

<?php the_content(); ?>

<hr/>
<br/>

<?php if (!$is_product_page) { ?>
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
           <i class="fab fa-facebook-square"></i>
         </a>
         <a class="blog-share-twitter" 
            href="https://twitter.com/share"
            target="_blank">
           <i class="fab fa-twitter"></i>
         </a>
         <a class="blog-share-email"
            href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $email_body; ?>"
            target="_blank">
            <i class="fas fa-envelope"></i>
         </a>
      </div>
      
      <div class="blog-buttons">
         <div class="blog-apply">
            <h4>Join our school</h4>
            <a href="/wp/admissions" class="small-button">Apply Now</a>
         </div>
         <?php fb_like_box(); ?>
<!--          <div class="blog-subscribe">
            <h4>Get notified about new posts by email</h4>
            <?php es_subbox($namefield = "NO", $desc = "", $group = "Blog"); ?>
         </div> -->
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
<?php } ?>