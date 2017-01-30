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

function subbanner($number) { 
   $image_attachment = get_option("subbanner{$number}-image-attachment-id");
   $caption = get_option("subbanner{$number}-caption");
   ?>
   <div class="container">
      <div class="home-subbanner">
         <div class="home-subbanner-image">
            <?php echo wp_get_attachment_image($image_attachment, 'large'); ?>
         </div>
         <div class="home-subbanner-caption home-subbanner-caption-<?php echo $number; ?>">
            <?php echo $caption; ?>
         </div>
      </div>
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
         <h2>Orange County's first and only democratic free school</h2>
         <p>
            The Open School is the only school in Orange County where kids are truly in charge.
            We have no teachers, no curriculum, no tests, and no homework.
            Instead, we have the freedom to be ourselves.
         </p>
         <hr/>
         <p>
            Enrollment is open for the 2017-2018 school year.
            Check out our <a href="/admissions">admissions page</a>
            or <a href="/contact">contact us</a> to arrange a visit.
         </p>
      </div>
      <?php
      // announcement('announcement1');
      // announcement('announcement2');
      // announcement('announcement3');
      ?>
   </div>

   <div class="container">
      <!--<div class="home-video">-->
      <!--   <?php embed_video(get_option('video-url')); ?>-->
      <!--</div>-->
      <div class="home-side-item">
         <?php 
         //testimonial(1);
         // testimonial(2);
         ?>
      </div>
   </div>
   
   <div class="home-subbanners">
     <?php
     subbanner(1, true);
     subbanner(2, false);
     subbanner(3, true);
     ?>
   </div>
</div>

<?php get_footer(); ?>