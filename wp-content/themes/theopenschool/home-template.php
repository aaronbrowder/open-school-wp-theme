<?php
/*
Template Name: Home
*/

get_header(); 

function banner_loader($alt, $image_id, $placeholder_image_id = null) {
   if (get_locale() == 'es_MX') {
      $image_id .= '-es';
      $placeholder_image_id .= '-es'; 
   }
   image_loader($alt, $image_id, $placeholder_image_id);
}

function image_loader($alt, $image_id, $placeholder_image_id = null) { 
   if (empty($placeholder_image_id)) { ?>
      <img class="home-banner-preloaded" alt="<?php echo $alt; ?>" src="<?php echo get_image_src_data($image_id); ?>">
   <?php }
   else { ?>
      <img class="home-banner-placeholder" alt="<?php echo $alt; ?>" src="<?php echo get_image_src_data($placeholder_image_id); ?>">
      <img class="home-banner-loader" alt="<?php echo $alt; ?>"
         data-src-large="<?php echo get_image_src($image_id, "large"); ?>"
         data-src-full="<?php echo get_image_src($image_id, "full"); ?>">
   <?php }
}

function get_image_src($id, $size = "full") {
   return wp_get_attachment_image_src(get_option($id), $size)[0];
}

function get_image_src_data($id, $size = "full")
{
   $src = wp_get_attachment_image_src(get_option($id), $size)[0];
   $image = file_get_contents($src);
   $finfo = finfo_open(FILEINFO_MIME_TYPE);
   $data = base64_encode($image);
   return 'data: ' . finfo_buffer($finfo, $image) . ';base64,' . $data;
}

function custom_text($id) {
   if (get_locale() == 'es_MX') {
      $id .= '-es';
   }
   return get_option($id);
}

function event($number) {
   $suffix = get_locale() == 'es_MX' ? '-es' : '';
   $title = get_option('event' . $number . '-title' . $suffix);
   if (!empty($title)) {
      $url = get_option('event' . $number . '-url' . $suffix);
      $line1 = get_option('event' . $number . '-line1' . $suffix);
      $line2 = get_option('event' . $number . '-line2' . $suffix);
      ?>
      <div class="home-event">
         <a href="<?php echo $url; ?>">
            <?php echo $title; ?>
            <span class="home-link-arrow">&raquo;</span>
         </a>
         <?php echo $line1; ?><br>
         <?php if (!empty($line2)) {
            echo $line2;
         } ?>
      </div>
   <?php }
} ?>

<div class="home-container">
   
   <div class="home-greenscreen home-greenscreen-1">
      <div class="home-greenscreen-text home-greenscreen-text-right">
         <div class="home-logo">
            <?php image_loader("Open School leaf logo", "logo-image-attachment-id"); ?>
         </div>
         <h1 class="home-title">
            The Open School
         </h1>
         <p class="home-title-caption">
            <?php echo custom_text('school-description'); ?>
         </p>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php image_loader("Two girls laughing", "greenscreen-1-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-2">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-left">
         <h2><?php echo custom_text('second-banner-header'); ?></h2>
         <?php echo custom_text('second-banner-text'); ?>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php image_loader("A girl holding a stuffed elephant", "greenscreen-2-image-attachment-id", "greenscreen-2-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-1">
         <?php banner_loader("Follow your passions", "new-banner-1-image-attachment-id", "new-banner-1-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-3">
      <div class="home-greenscreen-text home-greenscreen-text-left">
         <div class="home-apply-and-subscribe">
            <div class="home-apply-block">
               <?php echo custom_text('enrollment-message'); ?>
               <a href="/wp/admissions"><?php echo custom_text('apply-button-text'); ?> <span class="home-link-arrow">&raquo;</span></a>
            </div>
            <div class="home-subscribe" id="mc_embed_signup">
               <form id="mc-embedded-subscribe-form" class="validate" action="http://openschooloc.us5.list-manage2.com/subscribe/post?u=a49271ebde5f88b50cced6c93&amp;id=4b41a39b87" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
                  <label for="mce-EMAIL"><?php echo custom_text('subscribe-message'); ?></label>
                  <div style="position: absolute; left: -5000px;">
                     <input name="b_a49271ebde5f88b50cced6c93_4b41a39b87" type="text" value="" />
                  </div>
                  <input id="mce-EMAIL" class="email" name="EMAIL" required="" type="email" value="" placeholder="<?php echo custom_text('email-placeholder'); ?>" />
                  <button id="mc-embedded-subscribe" class="button" name="subscribe" type="submit">&raquo;</button>
               </form>
            </div>
         </div>
         <div class="home-events-block">
            <h2><?php echo custom_text('events-header'); ?></h2>
            <?php event(1); event(2); ?>
         </div>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php image_loader("Two boys laughing while playing a Nintendo Switch video game", "greenscreen-3-image-attachment-id", "greenscreen-3-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-2">
         <?php banner_loader("Go outside", "new-banner-2-image-attachment-id", "new-banner-2-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-4">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-right">
         <?php echo custom_text('testimonial1'); ?>
         <br><br><br>&nbsp; &nbsp; ~ <?php echo custom_text('testimonial1-attribution'); ?>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php image_loader("A little girl showing off her drawing", "greenscreen-4-image-attachment-id", "greenscreen-4-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-3">
         <?php banner_loader("Age mixing", "new-banner-3-image-attachment-id", "new-banner-3-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-5">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-left">
         <?php echo custom_text('testimonial2'); ?>
         <br><br><br>&nbsp; &nbsp; ~ <?php echo custom_text('testimonial2-attribution'); ?>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php image_loader("A boy doing a skateboard trick", "greenscreen-5-image-attachment-id", "greenscreen-5-tiny-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-learn-more">
      <a href="/wp/introduction">Learn more about<br>The Open School <span class="home-link-arrow">&raquo;</span></a>
   </div>
   
   <div class="home-nonprofit-badge">
      <a href="https://www.ocnonprofitcentral.org/profile/1162992/the-open-school/">
         <?php image_loader("OC Nonprofit Central Badge", "nonprofit-image-attachment-id"); ?>
      </a>
   </div>
   
</div>

<?php get_footer(); ?>