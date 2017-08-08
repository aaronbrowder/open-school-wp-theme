<?php
/*
Template Name: Home
*/

get_header(); 

function subbanner($number, $header) { 
   $note_image_attachment = get_option("subbanner$number-note-image-attachment-id");
   $caption = get_option("subbanner$number-caption");
   $note_class = "home-banner-note home-subbanner$number-note";
   $note_text_class = "home-banner-note-text home-subbanner$number-note-text";
   ?>
   <div class="home-banner">
      <div class="home-banner-image home-subbanner<?php echo $number; ?>-image"></div>
      <div class="<?php echo $note_class ?>">
         <?php echo wp_get_attachment_image($note_image_attachment, 'full'); ?>
      </div>
      <div class="<?php echo $note_text_class ?>">
         <div class="home-banner-note-mobile-header"><?php echo $header; ?></div>
         <?php echo $caption; ?>
      </div>
   </div>
<?php }

function testimonial($number) { ?>
   <div class="home-testimonial home-testimonial-<?php echo $number; ?>">
      <?php echo get_option("testimonial$number"); ?>
      <div class="home-testimonial-attribution">
         ~ <?php echo get_option("testimonial$number-attribution"); ?>
      </div>
   </div>
<?php }

function footer_testimonial($number) { ?>
   <div class="home-footer-testimonial">
      "<?php echo get_option("testimonial$number"); ?>"
      ~ <?php echo get_option("testimonial$number-attribution"); ?>
   </div>
<?php }

function get_banner_src($id) {
   return wp_get_attachment_image_src(get_option($id), "full")[0];
}

?>

<style>
   .home-main-banner-image {
      background-image: url('<?php echo get_banner_src("banner-attachment-id"); ?>');
   }
   .home-subbanner1-image {
      background-image: url('<?php echo get_banner_src("subbanner1-image-attachment-id"); ?>');
   }
   .home-subbanner2-image {
      background-image: url('<?php echo get_banner_src("subbanner2-image-attachment-id"); ?>');
   }
   .home-subbanner3-image {
      background-image: url('<?php echo get_banner_src("subbanner3-image-attachment-id"); ?>');
   }
</style>

<div class="home-container">
      
   <div class="home-banner">
      <div class="home-banner-image home-main-banner-image"></div>
      <div class="home-banner-note home-main-banner-note">
         <?php echo wp_get_attachment_image(get_option('banner-note-image-attachment-id'), 'full'); ?>
      </div>
      <div class="home-banner-note-text home-main-banner-note-text">
         <div class="home-banner-note-mobile-header">Independence. Responsibility. Compassion.</div>
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
      <?php subbanner(1, "Freedom"); ?>
   </div>
   
   <!--<div class="home-promoted-event">-->
      <?php /*echo wp_get_attachment_image(get_option('promoted-event-image-attachment-id'), 'full');*/ ?>
   <!--</div>-->
   
   <div class="home-testimonial-bar">
      <div class="home-testimonial-quote-mark">“</div>
      <?php
      testimonial(1);
      testimonial(2);
      testimonial(3);
      testimonial(4);
      ?>
   </div>
   
   <div class="home-panel">
      <?php subbanner(2, "Age Mixing"); ?>
   </div>
   
   <?php subbanner(3, "Authentic Democracy"); ?>
   
   <div class="home-footer-testimonials">
      <h2>What are parents saying about The Open School?</h2>
      <?php
      footer_testimonial(1);
      footer_testimonial(2);
      footer_testimonial(3);
      footer_testimonial(4);
      ?>
   </div>

</div>

<?php get_footer(); ?>