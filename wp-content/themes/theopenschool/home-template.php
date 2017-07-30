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
   <div class="home-apply-box">
      <a href="/wp/admissions" class="home-apply-button"></a>
      <div class="home-apply-box-text">
         Enrollment is open for the 2017-2018 school year!
      </div>
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
   <div class="fb-page" data-href="https://www.facebook.com/TheOpenSchool/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TheOpenSchool/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TheOpenSchool/">The Open School</a></blockquote></div>
</div>

<div class="home-panel">
   <?php subbanner(1); ?>
</div>

<?php
subbanner(2);
subbanner(3);
?>

<?php get_footer(); ?>