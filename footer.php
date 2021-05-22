<?php
/**
 * The template for displaying the footer
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */

?>



  <section class="footer">
    <div class="footer__inner container">
      <div class="footer__top ">
        <div class="footer__top-column">
          <h3 class="footer__mobile-h3">Optimise your mind</h3>
          <p>Sign up to stay updated on all things Klir</p>
          <div class="footer__sign-up-wrap">
            <input type="text" placeholder="Enter your email address">
            <button class="btn-oval">SIGN UP</button>
          </div>
        </div>
        <div class="footer__top-column">  
          <h3>More Info</h3>     
          <?php
          wp_nav_menu( array(
            'theme_location' => 'footer-menu-more-info'
          ) )
          ?>
        </div>
        <div class="footer__top-column">  
          <h3>Follow us</h3>    
          <?php
          wp_nav_menu( array(
            'theme_location' => 'footer-menu-social'
          ) )
          ?>   
          <div class="footer__mobile-ecology">
            <?php _get_template_part('templates/components/_ecology'); ?>
          </div>
          
        </div>
      </div>
      <div class="footer__bottom container">
        <div class="footer__bottom-column">   
          <p>© <?php echo date("Y"); ?> ALL RIGHTS RESERVED KLIR</p>   
        </div>
        <div class="footer__bottom-column footer__bottom-column--desktop"> 
          <p>Restoring our planet</p>    
          <a href="">
            <?php _get_template_part('templates/components/_ecology'); ?>
          </a> 
        </div>
      </div>
    </div>
  </section>

</div>
  <?php wp_footer(); ?>



  </body>
</html>
