<?php
/*
Template Name: Home
*/

get_header(); 

function imageLoader($image_id, $placeholder_image_id) { ?>
   <img class="home-banner-placeholder" src="<?php echo get_banner_src($placeholder_image_id); ?>">
   <img class="home-banner-loader" data-src="<?php echo get_banner_src($image_id); ?>">
<?php }

function get_banner_src($id) {
   return wp_get_attachment_image_src(get_option($id), "full")[0];
}

?>

<div class="home-container">
   
   <div class="home-greenscreen home-greenscreen-1">
      <div class="home-greenscreen-text home-greenscreen-text-right">
         <div class="home-logo">
            <img src="<?php echo wp_get_attachment_image_src(get_option("logo-image-attachment-id"), "full")[0]; ?>">
         </div>
         <h1 class="home-title">
            The Open School
         </h1>
         <p class="home-title-caption">
            is Orange County's first and only democratic free school. Instead of curriculum and classes, we learn through life and democracy. Instead of teachers, we learn from everyone.
         </p>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php imageLoader("greenscreen-1-image-attachment-id", "greenscreen-1-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-2">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-left">
         <h2>Freedom</h2>
         Students are responsible for their own learning. They learn by playing, conversing, and pursuing their passions. We don't judge them or try to fit them into a box. Students come to truly know themselves, and chart their own pathways through education and life.
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php imageLoader("greenscreen-2-image-attachment-id", "greenscreen-2-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-1">
         <?php imageLoader("new-banner-1-image-attachment-id", "new-banner-1-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-3">
      <div class="home-greenscreen-text home-greenscreen-text-left">
         <div class="home-apply-and-subscribe">
            <div class="home-apply-block">
               Enrollment is open
               <a href="/admissions">Apply Now <span class="home-link-arrow">&raquo;</span></a>
            </div>
            <div class="home-subscribe" id="mc_embed_signup">
               <form id="mc-embedded-subscribe-form" class="validate" action="http://openschooloc.us5.list-manage2.com/subscribe/post?u=a49271ebde5f88b50cced6c93&amp;id=4b41a39b87" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
                  <label for="mce-EMAIL">Subscribe to our mailing list</label>
                  <div style="position: absolute; left: -5000px;">
                     <input name="b_a49271ebde5f88b50cced6c93_4b41a39b87" type="text" value="" />
                  </div>
                  <input id="mce-EMAIL" class="email" name="EMAIL" required="" type="email" value="" placeholder="email address" />
                  <button id="mc-embedded-subscribe" class="button" name="subscribe" type="submit">&raquo;</button>
               </form>
            </div>
         </div>
         <div class="home-events-block">
            <h2>Upcoming Events</h2>
            <div class="home-event">
               <a href="/under-5-friday">Under 5 Friday <span class="home-link-arrow">&raquo;</span></a>
               Let your little ones try out The<br>Open School for 2 hours a week.
            </div>
            <div class="home-event">
               <a href="/">Super Fun Event <span class="home-link-arrow">&raquo;</span></a>
               This event will knock your<br>socks off. Better be there!
            </div>
         </div>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php imageLoader("greenscreen-3-image-attachment-id", "greenscreen-3-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-2">
         <?php imageLoader("new-banner-2-image-attachment-id", "new-banner-2-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-4">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-right">
         “When we were looking at education options, one of our biggest fears was that she would have to change who she was to “make it” in a standard school or would be one of those kids who is constantly in trouble for talking too much. I remember searching and searching for a school until we found out about The Open School and democratic education, and then breathing that sigh of relief, “This is the place.””
         <br><br><br>&nbsp; &nbsp; ~ Ingrid, Open School mom
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php imageLoader("greenscreen-4-image-attachment-id", "greenscreen-4-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-3">
         <?php imageLoader("new-banner-3-image-attachment-id", "new-banner-3-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-5">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-left">
         “Our children are screaming for freedom, for movement, for free expression. As a mother, I'd rather have a happy kid who learns at his own pace, whose self esteem isn’t dependent on grades or test scores, who is motivated to learn because he’s curious and not because he’s being told that this is what he needs to know. This is why I love The Open School.”
         <br><br><br>&nbsp; &nbsp; ~ Heather, Open School mom
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php imageLoader("greenscreen-5-image-attachment-id", "greenscreen-5-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
</div>

<?php get_footer(); ?>