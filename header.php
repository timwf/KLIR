<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="is-observer">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <script>
      // Picture element HTML5 shiv
      document.createElement('picture');
    </script>

    <?php wp_head(); ?>
  </head>

  <?php
    $banner_on = get_field('banner_on', 'options');
    $banner_background_colour = get_field('banner_background_colour', 'options');
    $banner_text = get_field('banner_text', 'options');
    $banner_text_colour = get_field('banner_text_colour', 'options');    
  ?>


  <body <?php body_class(); ?>>

  <section class="page-banner" style="background-color: <?php echo $banner_background_colour ?>">
    <div class="page-banner__inner">      
    <?php foreach ($banner_text as $text):?>
      <p style="color: <?php echo $banner_text_colour ?>"><?php echo $text['add_a_sentence'] ?></p>
    <?php endforeach; ?>  
    </div>
  </section>

  <section class="header">
    <div class="header__main">
      <div class="header__main-inner container">
        <div class="header__hamburger">
          <div class="header__hambuger-line"></div>
          <div class="header__hambuger-line"></div>
          <div class="header__hambuger-line"></div>
        </div>
        <div class="header__logo">
          <a href="">
            <?php _get_template_part('templates/components/_logo'); ?>
          </a>        
        </div>     
        <div class="header__main-nav">
          <ul>
           <a href=""><li>ACCOUNT</li></a> 
           <a href=""><li>CART [0]</a> 
          </ul>
        </div>
      </div>
    </div>
    <div class="animated-border js-visibility"></div>
    <div class="header__nav active">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'header-menu'
        ) )
        ?>
    </div>
    <div class="header__mobile">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'header-menu'
        ) )
        ?>
        <ul>
          <li>ACCOUNT</li>
          <li>CART [0]</li>
      </ul>
    </div>
    <div class="animated-border animated-border--desktop-only js-visibility reveal-del-1"></div>
  </section>

  <div class="page-wrap">



<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
  your browser</a> to improve your experience and security.</p>
<![endif]-->
