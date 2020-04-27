<?php
/*
Template Name: Home
*/

get_header();

$container_class = get_locale() == 'es_MX' ? 'spanish' : '';
$learn_more_about_text = get_locale() == 'es_MX' ? 'Aprenda más sobre' : 'Learn more about';

function get_image_src_data($id, $size = "full")
{
   $src = wp_get_attachment_image_src(get_option($id), $size)[0];
   $image = file_get_contents($src);
   $finfo = finfo_open(FILEINFO_MIME_TYPE);
   $data = base64_encode($image);
   return 'data: ' . finfo_buffer($finfo, $image) . ';base64,' . $data;
}

function render_logo($image_id) { ?>
   <img class="home-banner-preloaded" alt="Open School leaf logo" src="<?php echo get_image_src_data($image_id); ?>">
<?php }

function get_banner($image_id) {
   return wp_get_attachment_image(get_option($image_id), 'full');
}

function get_banner_with_locale($image_id) {
   return wp_get_attachment_image(get_option(get_image_id_with_locale($image_id)), 'full');
}

function get_image_id_with_locale($image_id) {
   if (get_locale() == 'es_MX') {
      return $image_id . '-es';
   }
   return $image_id;
}

function promoted_event() {
   $url = get_option('promoted-event-url');
   if (!empty($url) && get_locale() != 'es_MX') { ?>
      <div class="home-new-banner-container">
         <div class="home-promoted-event">
            <a href="<?php echo $url; ?>">
               <?php echo get_banner("promoted-event-image-attachment-id"); ?>
            </a>
         </div>
      </div>
   <?php }
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

<div class="home-container <?php echo $container_class; ?>">
   
   <div class="home-greenscreen home-greenscreen-1">
      <div class="home-greenscreen-text home-greenscreen-text-right">
         <div class="home-logo">
            <?php render_logo("logo-image-attachment-id"); ?>
         </div>
         <h1 class="home-title">
            The Open School
         </h1>
         <p class="home-title-caption">
            <?php echo custom_text('school-description'); ?>
         </p>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php echo get_banner("greenscreen-1-image-attachment-id"); ?>
      </div>
   </div>

   <?php promoted_event(); ?>
   
   <div class="home-greenscreen home-greenscreen-2">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-left">
         <h2><?php echo custom_text('second-banner-header'); ?></h2>
         <?php echo custom_text('second-banner-text'); ?>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php echo get_banner("greenscreen-2-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-1">
         <?php echo get_banner_with_locale("new-banner-1-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-3" id="apply-subscribe">
      <div class="home-greenscreen-text home-greenscreen-text-left">
         <div class="home-apply-and-subscribe">
            <a class="home-apply-block" href="<?php echo custom_text('admissions-url') ?>">
               <?php echo custom_text('enrollment-message'); ?>
               <div class="home-apply-button">
                  <?php echo custom_text('apply-button-text'); ?> <span class="home-link-arrow">&raquo;</span>
               </div>
            </a>
            <a class="home-subscribe" href="<?php echo get_option('subscribe-url'); ?>">
               <?php echo custom_text('subscribe-message'); ?>
               <div class="home-subscribe-button">
                  <?php echo custom_text('subscribe-button-text'); ?> <span class="home-link-arrow">&raquo;</span>
               </div>
            </a>
         </div>
         <div class="home-events-block">
            <h2><?php echo custom_text('events-header'); ?></h2>
            <?php event(1); event(2); ?>
         </div>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php echo get_banner("greenscreen-3-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-2">
         <?php echo get_banner_with_locale("new-banner-2-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-4">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-right">
         <?php echo custom_text('testimonial1'); ?>
         <br><br><br>&nbsp; &nbsp; ~ <?php echo custom_text('testimonial1-attribution'); ?>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php echo get_banner("greenscreen-4-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-new-banner-container">
      <div class="home-new-banner home-new-banner-3">
         <?php echo get_banner_with_locale("new-banner-3-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-greenscreen home-greenscreen-5">
      <div class="home-greenscreen-testimonial home-greenscreen-text home-greenscreen-text-left">
         <?php echo custom_text('testimonial2'); ?>
         <br><br><br>&nbsp; &nbsp; ~ <?php echo custom_text('testimonial2-attribution'); ?>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-right">
         <?php echo get_banner("greenscreen-5-image-attachment-id"); ?>
      </div>
   </div>
   
   <div class="home-learn-more">
      <a href="<?php echo custom_text('introduction-url') ?>">
         <?php echo $learn_more_about_text; ?><br>The Open School <span class="home-link-arrow">&raquo;</span>
      </a>
   </div>
   
   <div class="home-nonprofit-badge">
      <a href="https://www.ocnonprofitcentral.org/organizations/the-open-school">
         <?php echo get_banner("nonprofit-image-attachment-id"); ?>
      </a>
   </div>
   
</div>

<?php get_footer(); ?>