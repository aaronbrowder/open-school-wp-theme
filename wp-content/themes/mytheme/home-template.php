<?php
/*
Template Name: Home
*/

get_header(); ?>

<div class="site-home">
   
   <div class="site-home-title">
      <img height="100" src="<?php echo wp_get_attachment_url(get_option('title-image-attachment-id')); ?>" alt="The Open School">
      <h2><?php echo get_option('title-tagline-header'); ?></h2>
      <p><?php echo get_option('title-tagline-text'); ?></p>
   </div>
   
   <div class="container">
      <div class="site-home-video">
         <?php embed_video(get_option('video-url')); ?>
      </div>
      <div class="site-home-announcements">
         <div class="site-home-announcement"><?php echo get_option('announcement1') ?></div>
         <div class="site-home-announcement"><?php echo get_option('announcement2') ?></div>
         <div class="site-home-announcement"><?php echo get_option('announcement3') ?></div>
         <div class="site-home-announcement"><?php echo get_option('announcement4') ?></div>
      </div>
   </div>
   
   <div class="site-home-subbanners-wrapper">
       <div class="container">
           <div class="site-home-subbanners">
             <div class="site-home-subbanner">
                <img src="<?php echo wp_get_attachment_url(get_option('subbanner1-image-attachment-id')); ?>">
                <div class="caption"><?php echo get_option('subbanner1-caption'); ?></div>
             </div>
             <div class="site-home-subbanner">
                <img src="<?php echo wp_get_attachment_url(get_option('subbanner2-image-attachment-id')); ?>">
                <div class="caption"><?php echo get_option('subbanner2-caption'); ?></div>
             </div>
             <div class="site-home-subbanner">
                <img src="<?php echo wp_get_attachment_url(get_option('subbanner3-image-attachment-id')); ?>">
                <div class="caption"><?php echo get_option('subbanner3-caption'); ?></div>
             </div>
          </div>
       </div>
   </div>
</div>

get_footer(); ?>