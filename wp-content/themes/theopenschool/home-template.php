<?php
/*
Template Name: Home
*/

get_header(); 

function subbanner($number, $header) { 
   banner(
      "subbanner$number", 
      "subbanner$number-image-attachment-id",
      "subbanner$number-tiny-image-attachment-id",
      $header,
      get_option("subbanner$number-caption"));
}

function banner($class_part, $image_id, $placeholder_image_id, $header, $caption) { 
   $note_image_attachment = get_option("banner-note-image-attachment-id");
   $note_class = "home-banner-note home-$class_part-note";
   $note_text_class = "home-banner-note-text home-$class_part-note-text";
   ?>
   <div class="home-banner">
      <div class="home-banner-image home-<?php echo $class_part; ?>-image">
         <?php imageLoader($image_id, $placeholder_image_id); ?>
      </div>
      <div class="<?php echo $note_class ?>">
         <?php echo wp_get_attachment_image($note_image_attachment, 'full'); ?>
      </div>
      <div class="<?php echo $note_text_class ?>">
         <div class="home-banner-note-header"><?php echo $header; ?></div>
         <?php echo $caption; ?>
      </div>
   </div>
<?php }

function promotion($image_id, $placeholder_image_id, $href) { ?>
   <a class="home-promoted-event" href="<?php echo $href; ?>">
      <?php imageLoader($image_id, $placeholder_image_id); ?>
   </a>
<?php }

function imageLoader($image_id, $placeholder_image_id) { ?>
   <img class="home-banner-placeholder" src="<?php echo get_banner_src($placeholder_image_id); ?>">
   <img class="home-banner-loader" data-src="<?php echo get_banner_src($image_id); ?>">
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

function get_banner_base64_src($id) {
   $image_file = get_banner_src($id);
   $image_data = base64_encode(file_get_contents($image_file));
   return "data: " . mime_content_type($image_file) . ";base64," . $image_data;
}

?>

<div class="home-container">
      
   <?php
   banner(
      "main-banner",
      "banner-attachment-id",
      "banner-tiny-image-attachment-id",
      "Independence. Responsibility. Compassion.",
      get_option("school-intro-line1"));
   ?>
   
   <div class="home-cta-bar">
      <div class="home-subscribe" id="mc_embed_signup">
         <form id="mc-embedded-subscribe-form" class="validate" action="http://openschooloc.us5.list-manage2.com/subscribe/post?u=a49271ebde5f88b50cced6c93&amp;id=4b41a39b87" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
            <label for="mce-EMAIL">Subscribe to our mailing list:</label>
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
      <blockquote class="home-hiring">
         We're hiring! <a href="/wp/jobs">Find out more &raquo;</a>
      </blockquote>
      <div class="home-facebook-full">
         <?php fb_page_plugin_with_feed(442); ?>
      </div>
   </div>
   
   <div class="home-panel">
      <?php subbanner(1, "Freedom"); ?>
   </div>
   
   <a class="home-promoted-event" href="/wp/event-walkthrough">
      <?php imageLoader("promoted-event-image-attachment-id", "promoted-event-tiny-image-attachment-id"); ?>
   </a>
   
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