      </div>
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
               <!--<div class="footer-subscribe" id="mc_embed_signup">-->
               <!--   <form id="mc-embedded-subscribe-form" class="validate" action="http://openschooloc.us5.list-manage2.com/subscribe/post?u=a49271ebde5f88b50cced6c93&amp;id=4b41a39b87" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">-->
               <!--      <label for="mce-EMAIL">Subscribe to our mailing list</label>-->
               <!--      <div style="position: absolute; left: -5000px;">-->
               <!--         <input name="b_a49271ebde5f88b50cced6c93_4b41a39b87" type="text" value="" />-->
               <!--      </div>-->
               <!--      <input id="mce-EMAIL" class="email" name="EMAIL" required="" type="email" value="" placeholder="email address" />-->
               <!--      <button id="mc-embedded-subscribe" class="button" name="subscribe" type="submit">&raquo;</button>-->
               <!--   </form>-->
               <!--</div>-->
               <div class="footer-donate">
                  <h4>Support our school</h4>
                  <?php donate_button(); ?>
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
