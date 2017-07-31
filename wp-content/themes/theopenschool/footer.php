      </div>
      <footer class="footer">
         <div class="container">
            <div class="footer-social">
               <a href="<?php echo get_option('facebook') ?>" target="_blank" class="social-link">
                  <i class="fa fa-facebook"></i>
               </a>
               <a href="<?php echo get_option('twitter') ?>" target="_blank" class="social-link">
                  <i class="fa fa-twitter"></i>
               </a>
               <a href="<?php echo get_option('pinterest') ?>" target="_blank" class="social-link">
                  <i class="fa fa-pinterest"></i>
               </a>
               <a href="<?php echo get_option('instagram') ?>" target="_blank" class="social-link">
                  <i class="fa fa-instagram"></i>
               </a>
               <a href="<?php echo get_option('youtube') ?>" target="_blank" class="social-link">
                  <i class="fa fa-youtube"></i>
               </a>
               <a href="<?php bloginfo('rss2_url'); ?>" class="social-link">
                  <i class="fa fa-feed"></i>
               </a>
               <div class="footer-other-promotions">
                  <?php fb_like_box(); ?>
                  <div class="footer-donate">
                     <h4>Support our school</h4>
                     <?php donate_button(); ?>
                  </div>
               </div>
            </div>
            <div class="footer-contact">
               <h4>The Open School</h4>
               <p>
                  <?php echo get_option('address1') ?>
                  <br/><?php echo get_option('address2') ?>
               </p>
               <p>
                  <?php echo get_option('email') ?>
                  <br/><?php echo get_option('phone') ?>
               </p>
               <p><a href="/contact-us">Contact Us</a></p>
            </div>
         </div>
      </footer>
      <?php wp_footer(); ?>
   </body>
</html>
