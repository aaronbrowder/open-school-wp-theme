<?php
/*
Template Name: Home
*/

get_header(); 

function subbanner($number) { 
   $image_attachment = get_option("subbanner$number-image-attachment-id");
   $caption = get_option("subbanner$number-caption");
   ?>
   <div class="home-subbanner">
      <div class="home-subbanner-image home-subbanner-image-<?php echo $number; ?>">
         <?php echo wp_get_attachment_image($image_attachment, 'large'); ?>
      </div>
      <div class="home-subbanner-caption home-subbanner-caption-<?php echo $number; ?>">
         <?php echo $caption; ?>
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
         <h2 class="home-tagline-desktop"><?php echo get_option('tagline'); ?></h2>
         <h2 class="home-tagline-mobile"><?php echo get_option('mobile-tagline'); ?></h2>
         <p><?php echo get_option('school-intro-line1'); ?></p>
      </div>
      
      <div class="home-middle">
         
         <div class="home-middle-texts">
            <div class="home-calls-to-action">
               <div class="home-apply">
                  Enrollment is open for the 2017-2018 school year!<br/>
                  <a href="/admissions" class="home-apply-button">Apply Now</a>
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
            <div class="home-testimonial">
               "I've seen so much growth in my kids in all the important things in life, what really matters.
               They are loving being able to make their own decisions, and they are more well-behaved at home
               and do their chores without being told. They are all just happy and feel proud of themselves."
               <div class="home-testimonial-attribution">&mdash; Tania</div>
            </div>
         </div>
         
         <div class="home-middle-image">
            <?php subbanner(1, true); ?>
         </div>
         
      </div>
      
   </div>
   
   <div class="home-subbanners">
      <div class="container">
         <a class="home-promoted-event" href="/event-walkthrough">
            <?php echo wp_get_attachment_image(get_option('promoted-event-image-attachment-id'), 'full'); ?>
         </a>
         <?php
         subbanner(2, false);
         subbanner(3, true);
         ?>
      </div>
   </div>
</div>

<?php get_footer(); ?>