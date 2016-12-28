<?php
/*
Template Name: Home
*/

get_header(); 

function announcement($id) { 
   $announcement = get_option($id);
   if ($announcement) { ?>
      <div class="home-announcement-banner">
         <div class="home-narrow-container">
            <div class="home-announcement">
               <div class="home-announcement-icon">
                  <span class="icon icon-exclamation-circle"></span>
               </div>
               <div class="home-announcement-content">
                  <?php echo $announcement; ?>
               </div>
            </div>
         </div>
      </div>
   <?php }
}

function subbanner($image_attachment_id, $caption) { ?>
   <div class="home-subbanner">
      <img src="<?php echo wp_get_attachment_url(get_option($image_attachment_id)); ?>">
      <div class="caption"><?php echo get_option($caption); ?></div>
   </div>
<?php }

?>

<div class="home">
   
   <div class="home-title home-narrow-container">
      <img height="100" src="<?php echo wp_get_attachment_url(get_option('title-image-attachment-id')); ?>" alt="The Open School">
      <h2><?php echo get_option('title-tagline-header'); ?></h2>
      <p><?php echo get_option('title-tagline-text'); ?></p>
   </div>
   
   <?php
   if (get_option('announcement1')) { ?>
      <div class="home-announcements">
         <?php
         announcement('announcement1');
         announcement('announcement2');
         announcement('announcement3');
         announcement('announcement4');
         ?>
      </div>
   <?php } ?>
   
   <div class="container">
      <div class="home-video">
         <?php embed_video(get_option('video-url')); ?>
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