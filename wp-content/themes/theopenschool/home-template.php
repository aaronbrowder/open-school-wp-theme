<?php
/*
Template Name: Home
*/

get_header();

$is_spanish = get_locale() == "es_MX";
$container_class = $is_spanish ? 'spanish' : '';
$learn_more_about_text = $is_spanish ? 'Aprenda más sobre' : 'Learn more about';

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

function check_mark() { ?>
   <img class="home-check-mark" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAdCAYAAAC9pNwMAAAAAXNSR0IArs4c6QAABDlJREFUSEull1uIVWUUx3//vfccJ01Cs6yRsHsZXQh7KmLqKcQg6GpGWkGFgRZEFGXYWBhBBdnFYqKXtBxHglJ67UGihyArCjLtZsloFw1qHJ2Z/a1Ye3/bOXNmTufofHBe9l57/dflv/7fOqLJMTM1e9fquSRzmzofcyC/EXQZ2A5Itzd1PlXguu/nQ7gTbDHoFLBfIV05DtiN66LtgpHTgAQ6DEbaqEBHAE4C9gIDwAIIy4AbgGleBOAo5A9NAAZqMNoNSTfY6SCV9m3gYinoN0h6gVkQ7ge6gRQIYD+CPoXk3UmA85uAB0Dz4wdJjLRVaxPQHgivQdgPyYOgq4EMOAzsgLANsp3AwQK4KrGZnQf566BzgRHQH2VpPF2v4mQnMQie0RFI3wB+gfAw4KD+fAj4AJItwG734O2sgBNJwWz0btDTZVm0C/Qe5INln9OCqRNP7o8ysH8g2xtBr492w8D7kPTHnh9pAjyyGpKlMdINkLway9wEtHDvwQsOz4XOR4DFdd/0QbIZ8u5ihKQDVeANGec9wO2RCM9IWb+ZE2aszhXrG+Z0BoSVwF0xkA5gGySvQLgZtAh0j6SBqq0NwCM9kDjwKNhzUtbXCFyVajw3Rm8BPRlHyZn9LegJyC8tW6e/QEsl/d4KOAdbK2VbohDMAM6GoUPS9H3jQY8ugI4XwC6M3DgAWgPsBNsIdgnoB9ByL/XxAPvg3wbhOggDkG+UOneNBRRWAz6CTnsPeL2UvW12eB7UtoJOBf0EWtYu8LNlqYfOgWm9YGeVI2afQPqSpJ/NbBHYOrBayfzwMWTPS/ozAveB5oJcONoG9h5vNrOLIGwCpke2uiDEEQmPAtfGTHdD+hiwywloNtgF0/pBrn7HBRwztpkQngJuLUXCM9MghC9AC4GTS2VK1knaamZRE04cuCKXS+YFEB4HrinL7eDF/Lp61CB8CNla4N9SmFyMpg6cSsrNhq+AdFWUQieS/2qgfaBVkr7xbL0dUy11lXEhIKUzuzxKomfu2Y4Cb0GyoZrvMd2fesaxZ+VdbTZ8JaRLwGaDvi+uOGl/3UUT7cYBtz3Hrlw9UuZkcRZ7dt7T6mLuAmYDLiaHov5Wel71+MzIah+nlsBrILmjBLGXpax3EsksHFdiX/W17taKwHY+5JtAs+qAm0lmvgJwAnl2n0HyDgz/DbWkJHOr43dDUZW0VDruK1cefQm6V/IxLE/DIjC8ELL1YHOAQTAvkS8Daemv1Sm64YYewcVlts583pTSF+t3umOrT9Re1+UVEJYDnWO7UivACe8rvy44X0HSI2lPU+A4MmdAWAJcBeqC0AHFetPOtufaUtkeBH0N+UdS7fPG0CY4i5nPLEuVz4M0KUnt49zOKVYhQeps/05ygZl4JgWOmR/bsduBa7SpFvr6jaXe5n//STT7qJ1AThi4HedTsfkPuvS7oxNkagoAAAAASUVORK5CYII=" />
<?php }

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

function long_key_message($number) {
   $message = custom_text('long-key-message-' . $number);
   if (!empty($message)) { ?>
      <p class="home-long-key-message">
         <?php check_mark(); ?>
         <span class="home-long-key-message-text"><?php echo $message; ?></span>
      </p>
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
         <p class="home-title-caption">
            <?php echo custom_text('key-message-1'); ?>
         </p>
         <a href="<?php echo custom_text('key-message-1-link'); ?>" class="home-call-to-action">
            <?php echo custom_text('key-message-1-link-text'); ?>
         </a>
      </div>
      <div class="home-greenscreen-image home-greenscreen-image-left">
         <?php echo get_banner("greenscreen-1-image-attachment-id"); ?>
      </div>
   </div>

   <?php promoted_event(); ?>
   
   <div class="home-greenscreen home-greenscreen-2">
      <div class="home-greenscreen-text">
         <h2><?php echo custom_text('second-banner-header'); ?></h2>
         <?php
            echo long_key_message(1);
            echo long_key_message(2);
            echo long_key_message(3);
            echo long_key_message(4);
            echo long_key_message(5);
            $open_house_url = get_option('open-house-url');
            $open_house_text = get_option('open-house-text');
            if (!empty($open_house_url)) { ?>
               <a class="home-open-house-link" href="<?php echo $open_house_url; ?>">
                  <?php echo $open_house_text; ?>
                  <span class="home-link-arrow">&nbsp;&raquo;</span>
               </a>
            <?php }
         ?>
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