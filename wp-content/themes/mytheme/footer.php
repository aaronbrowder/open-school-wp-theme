      <footer class="footer">
         <div class="container">
            <div class="footer-social">
               <a href="<?php echo get_option('facebook') ?>" target="_blank" class="social-link">
                  <span class="icon icon-facebook"></span>
               </a>
               <a href="<?php echo get_option('twitter') ?>" target="_blank" class="social-link">
                  <span class="icon icon-twitter"></span>
               </a>
               <a href="<?php echo get_option('pinterest') ?>" target="_blank" class="social-link">
                  <span class="icon icon-pinterest"></span>
               </a>
               <a href="<?php echo get_option('instagram') ?>" target="_blank" class="social-link">
                  <span class="icon icon-instagram"></span>
               </a>
               <a href="<?php echo get_option('youtube') ?>" target="_blank" class="social-link">
                  <span class="icon icon-youtube"></span>
               </a>
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
