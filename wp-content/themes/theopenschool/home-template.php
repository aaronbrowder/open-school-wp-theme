<?php
/*
Template Name: Home
*/

get_header(); 

function announcement($id) { 
   $announcement = get_option($id);
   if ($announcement) { ?>
      <div class="home-announcement">
         <?php echo $announcement; ?>
      </div>
   <?php }
}

function testimonial($number) {
   $testimonial = get_option('testimonial' . $number);
   $attribution = get_option('testimonial' . $number . '-attribution');
   if ($testimonial) { ?>
      <div class="home-testimonial home-testimonial-<?php echo $number; ?>">
         <div class="icon icon-quote-left home-testimonial-quote"></div>
         <?php echo $testimonial; ?>
         <p>&mdash; <?php echo $attribution; ?></p>
      </div>
   <?php }
}

function subbanner($image_attachment_id, $caption) { ?>
   <div class="home-subbanner">
      <?php echo wp_get_attachment_image(get_option($image_attachment_id), 'medium'); ?>
      <div class="caption"><?php echo get_option($caption); ?></div>
   </div>
<?php }

?>

<div class="home">
   
   <div class="home-banner">
      <div class="home-banner-desktop">
         <?php echo wp_get_attachment_image(get_option('banner-attachment-id'), 'full'); ?>
      </div>
      <div class="home-banner-mobile">
         <?php echo wp_get_attachment_image(get_option('mobile-banner-attachment-id'), 'full'); ?>
      </div>
   </div>
   
   <div class="container">
      <div class="home-logo">
         <div class="home-logo-desktop">
            <?php echo wp_get_attachment_image(get_option('title-image-attachment-id'), 'full'); ?>
         </div>
         <div class="home-logo-mobile">
            <?php echo wp_get_attachment_image(get_option('mobile-title-image-attachment-id'), 'full'); ?>
         </div>
      </div>
      <div class="home-tagline">
         The Open School is the only school in Orange County where <em class="style1">kids are truly in charge.</em>
         We have <em class="style2">no teachers, no curriculum, no tests, and no homework.</em>
         Instead, we have the <em class="style3">freedom to be ourselves.</em>
         <!--<p>-->
         <!--   <span class="icon icon-check-square-o"></span>-->
         <!--   The Open School is the only school in Orange County where <em class="style1">kids are truly in charge.</em>-->
         <!--</p>-->
         <!--<p/>-->
         <!--<span class="icon icon-check-square-o"></span>-->
         <!--   We have <em class="style2">no teachers, no curriculum, no tests, and no homework.</em>-->
         <!--</p>-->
         <!--<p>-->
         <!--   <span class="icon icon-check-square-o"></span>-->
         <!--   Instead, we have the <em class="style3">freedom to be ourselves.</em>-->
         <!--</p>-->
      </div>
      <?php
      announcement('announcement1');
      announcement('announcement2');
      announcement('announcement3');
      ?>
   </div>

   <div class="container">
      <div class="home-video">
         <?php embed_video(get_option('video-url')); ?>
      </div>
      <div class="home-side-item">
         <?php 
         testimonial(1);
         testimonial(2);
         ?>
      </div>
   </div>
   
   <div class="home-subbanners-wrapper">
       <div class="container">
           <div class="home-subbanners">
              <?php
              subbanner('subbanner1-image-attachment-id', 'subbanner1-caption');
              subbanner('subbanner2-image-attachment-id', 'subbanner2-caption');
              subbanner('subbanner3-image-attachment-id', 'subbanner3-caption');
              ?>
          </div>
       </div>
   </div>
</div>

<?php get_footer(); ?>