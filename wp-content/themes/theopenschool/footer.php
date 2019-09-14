      </div>
      <footer class="footer">
         <div class="container">
            <div class="footer-social">
               <?php if (!empty(get_option('facebook'))) { ?>
                  <a href="<?php echo get_option('facebook') ?>" target="_blank" class="social-link">
                     <i class="fa fa-facebook"></i>
                  </a>
               <?php }
               if (!empty(get_option('twitter'))) { ?>
                  <a href="<?php echo get_option('twitter') ?>" target="_blank" class="social-link">
                     <i class="fa fa-twitter"></i>
                  </a>
               <?php }
               if (!empty(get_option('instagram'))) { ?>
                  <a href="<?php echo get_option('instagram') ?>" target="_blank" class="social-link">
                     <i class="fa fa-instagram"></i>
                  </a>
               <?php }
               if (!empty(get_option('youtube'))) { ?>
                  <a href="<?php echo get_option('youtube') ?>" target="_blank" class="social-link">
                     <i class="fa fa-youtube"></i>
                  </a>
               <?php } ?>
               <a href="<?php bloginfo('rss2_url'); ?>" class="social-link">
                  <i class="fa fa-feed"></i>
               </a>
               <div class="footer-other-promotions">
                  <?php fb_like_box(); ?>
                  <div class="footer-donate">
                     <?php if (!empty(get_option('paypal-hosted-button-id'))) { ?>
                        <h4><?php echo custom_text('support-our-school-string') ?></h4>
                           <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                              <input name="cmd" type="hidden" value="_s-xclick" />
                              <input name="hosted_button_id" type="hidden" value="<?php echo get_option('paypal-hosted-button-id'); ?>" />
                              <button type="submit" name="submit" class="small-button donate-button">
                                 <?php echo custom_text('donate-string') ?>
                              </button>
                           </form>
                     <?php } ?>
                  </div>
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
