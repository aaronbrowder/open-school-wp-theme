      </div>
      <footer class="footer">
         <div class="container">
            <div class="footer-social">
               <?php if (!empty(get_option('facebook'))) { ?>
                  <a href="<?php echo get_option('facebook') ?>" target="_blank" class="social-link" title="facebook">
                     <i class="fab fa-facebook-f"></i>
                  </a>
               <?php }
               if (!empty(get_option('twitter'))) { ?>
                  <a href="<?php echo get_option('twitter') ?>" target="_blank" class="social-link" title="twitter">
                     <i class="fab fa-twitter"></i>
                  </a>
               <?php }
               if (!empty(get_option('instagram'))) { ?>
                  <a href="<?php echo get_option('instagram') ?>" target="_blank" class="social-link" title="instagram">
                     <i class="fab fa-instagram"></i>
                  </a>
               <?php }
               if (!empty(get_option('youtube'))) { ?>
                  <a href="<?php echo get_option('youtube') ?>" target="_blank" class="social-link" title="youtube">
                     <i class="fab fa-youtube-square"></i>
                  </a>
               <?php } ?>
               <?php if (get_locale() == 'en_US') { ?>
                  <div class="footer-links">
                     <a href="<?php echo custom_text('speaker-url') ?>"><i class="fas fa-comment"></i>&nbsp; Request a Speaker</a>
                  </div>
               <?php } ?>
               <!-- ConvertKit newsletter subscribe inline form -->
               <div class="footer-subscribe">
                  <script async data-uid="f68ef86dff" src="https://fierce-leader-3919.ck.page/f68ef86dff/index.js"></script>
               </div>
            </div>
            <div class="footer-contact">
               <h4><?php echo get_bloginfo('name'); ?></h4>
               <p>
                  <?php echo get_option('address1') ?>
                  <br/><?php echo get_option('address2') ?>
               </p>
               <p>
                  <?php echo get_option('email') ?>
                  <br/><?php echo get_option('phone') ?>
               </p>
               <p><a href="<?php echo custom_text('contact-us-url') ?>"><?php echo custom_text('contact-us-string') ?></a></p>
            </div>
         </div>
      </footer>
      <?php wp_footer(); ?>
   </body>
</html>
