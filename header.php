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
    $unwind = get_field('unwind', 'options');  
    $level_up = get_field('level_up', 'options');  
    $the_duo = get_field('the_duo', 'options'); 
    $timer = get_field('banner_timer', 'options'); 

  ?>


  <body <?php body_class(); ?> id="<?php if(get_the_title() == "Unwind"){ echo "page-wrap--dark"; } ?>" >

  <section data-time="<?php echo $timer ?>" class="page-banner" style="background-color: <?php echo $banner_background_colour ?>">
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
           <li class="js-open-cart">CART [<span>0</span>]</li>
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
        <ul style="padding-bottom: 100px">
          <li>ACCOUNT</li>
          <li class="js-open-cart">CART [<span>0</span>]</li>
      </ul>
    </div>
    <div class="animated-border animated-border--desktop-only js-visibility reveal-del-1"></div>
  </section>

  <section class="shop-fly">
    <div class="shop-fly__inner">
      <div class="shop-fly__top">
        <h2>SHOP</h2>
        <div class="shop-fly__close">
          <div class="shop-fly__close-icon"></div>
        </div>
      </div>
      
      <div class="shop-fly__body">
        
        <div class="shop-fly__singles">

          <div class="shop-fly__singles-item">
            <?php _get_template_part('templates/components/_resp-img', ['field' => $level_up['image'], 'class' => 'full-width-image__image', 'sizes' => '(max-width: 1923px) 100vw, 950px']); ?>
            <a href="" class="text-link">SEE MORE</a>
            <div class="shop-fly__singles-detals">
              <div class="shop-fly__singles-detals-top">
                <h4><?php echo $level_up['product_title'] ?></h4>
                <p><?php echo $level_up['product_detail'] ?></p>
              </div>
              <h4><?php echo $level_up['sub_title'] ?></h4>
              <a class="hero__button no-opacity" href="<?php echo $level_up['button']['url']?>">
                <button class="btn"><?php echo $level_up['button']['title']?></button>
              </a>  
            </div>
          </div>

          <div class="shop-fly__singles-item">
            <?php _get_template_part('templates/components/_resp-img', ['field' => $unwind['image_unwind'], 'class' => 'full-width-image__image', 'sizes' => '(max-width: 1923px) 100vw, 950px']); ?>
            <a href="" class="text-link">SEE MORE</a>
            <div class="shop-fly__singles-detals">
              <div class="shop-fly__singles-detals-top">
                <h4><?php echo $unwind['product_title_unwind'] ?></h4>
                <p style="width: 40%"><?php echo $unwind['product_detail_unwind'] ?></p>
              </div>
              <h4><?php echo $unwind['sub_title_unwind'] ?></h4>
              <a class="hero__button no-opacity" href="<?php echo $unwind['button_unwind']['url']?>">
                <button class="btn"><?php echo $unwind['button_unwind']['title']?></button>
              </a>    
            </div>
          </div>

        </div>
        <div class="shop-fly__divider"></div>
        <div class="shop-fly__bottom">
          
        </div>
      </div>
    </div>
  </section>


  <div class="page-wrap <?php if(get_the_title() == "Unwind"){ echo "page-wrap--dark"; } ?> ">



<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
  your browser</a> to improve your experience and security.</p>
<![endif]-->
