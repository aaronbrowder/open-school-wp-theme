<?php
/*
Template Name: Home
*/

get_header(); 

function subbanner($number) { 
   $image_attachment = get_option("subbanner$number-image-attachment-id");
   $note_image_attachment = get_option("subbanner$number-note-image-attachment-id");
   $caption = get_option("subbanner$number-caption");
   $note_class = "home-banner-note home-subbanner$number-note";
   $note_text_class = "home-banner-note-text home-subbanner$number-note-text";
   ?>
   <div class="home-banner">
   <?php echo wp_get_attachment_image($image_attachment, 'full'); ?>
   <div class="<?php echo $note_class ?>">
      <?php echo wp_get_attachment_image($note_image_attachment, 'full'); ?>
   </div>
   <div class="<?php echo $note_text_class ?>">
      <?php echo $caption; ?>
   </div>
</div>
<?php }

?>

<div class="home-container">
      
   <div class="home-banner">
      <?php echo wp_get_attachment_image(get_option('banner-attachment-id'), 'full'); ?>
      <div class="home-banner-note home-main-banner-note">
         <?php echo wp_get_attachment_image(get_option('banner-note-image-attachment-id'), 'full'); ?>
      </div>
      <div class="home-banner-note-text home-main-banner-note-text">
         <?php echo get_option('school-intro-line1'); ?>
      </div>
   </div>
   
   <div class="home-cta-bar">
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
      <div class="home-facebook-small">
         <?php fb_page_plugin_small(); ?>
      </div>
      <div class="home-apply-box">
         <a href="/wp/admissions" class="home-apply-button"></a>
         <div class="home-apply-box-text">
            Enrollment is open for the 2017-2018 school year!
         </div>
      </div>
      <div class="home-facebook-full">
         <?php fb_page_plugin_with_feed(490); ?>
      </div>
   </div>
   
   <div class="home-panel">
      <?php subbanner(1); ?>
   </div>
   
   <div class="home-testimonial-bar">
      <div class="home-testimonial-quote-mark">“</div>
      <div class="home-testimonial home-testimonial-1">
         I've seen so much growth in my kids in all the important things in life, what really matters.
         They are loving being able to make their own decisions, and they are more well-behaved at home
         and do their chores without being told. They are all just happy and feel proud of themselves.
         <div class="home-testimonial-attribution">~ Tania</div>
      </div>
      <div class="home-testimonial home-testimonial-2">
         When we were looking at education options, one of our biggest fears was that she would have to
         change who she was to “make it” in a standard school or would be one of those kids who is constantly
         in trouble for talking too much. I remember searching and searching for a school until we found out
         about The Open School and democratic education, and then breathing that sigh of relief, “This is the place.”
         <div class="home-testimonial-attribution">~ Ingrid</div>
      </div>
      <div class="home-testimonial home-testimonial-3">
         My kids are learning so much about life and how things work in the real world.
         They are learning what they are passionate about and how to make anything they want to learn possible.
         <div class="home-testimonial-attribution">~ Heidi</div>
      </div>
      <div class="home-testimonial home-testimonial-4">
         The experience has been strange and wonderful. This year, [my son] is making decisions for himself.
         I see him involved in school and learning how to balance great freedom with deeper responsibility.
         <div class="home-testimonial-attribution">~ Scott</div>
      </div>
   </div>
   
   <div class="home-panel">
      <?php subbanner(2); ?>
   </div>
   
   <?php subbanner(3); ?>

</div>

<?php get_footer(); ?>