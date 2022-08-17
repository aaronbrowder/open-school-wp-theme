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
      
      <div class="blog-book-promo">
         <div class="blog-book-promo-image">
            <a href="https://www.openschooloc.com/empowered-kids-liberated-parents/">
               <img src="https://www.openschooloc.com/wp-content/uploads/2022/08/blog-footer-book-promo.png">
            </a>
         </div>
         <div class="blog-book-promo-text">
            Like this blog post? Why not check out the book we wrote:
            <a href="https://www.openschooloc.com/empowered-kids-liberated-parents/">Empowered Kids, Liberated Parents</a>
         </div>
      </div>
      <div class="blog-promo-divider"></div>
      
      <div class="blog-buttons">
         <div class="blog-other-promo">
            <h4>Join our school</h4>
            <a href="/wp/admissions" class="small-button">Apply Now</a>
            <h4>Share this</h4>
            <?php
            $url = urlencode(get_permalink());
            $title = get_the_title();
            $span_str = '<span class="entry-title-primary">';
            if (startsWith($title, $span_str)) {
               $span_length = strlen($span_str);
               $title = substr($title, $span_length);
               $end_span_pos = strpos($title, '</span>');
               $title = substr($title, 0, $end_span_pos);
            }
            $subject = urlencode($title . ' – ' . get_bloginfo('name'));
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
               href="mailto:?subject=<?php echo $subject; ?>&body=<?php echo $email_body; ?>"
               target="_blank">
               <i class="fas fa-envelope"></i>
            </a>
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
<?php } ?>