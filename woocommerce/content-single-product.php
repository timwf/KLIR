<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
  global $woocommerce, $product, $post, $WC_Subscriptions_Product;
  $product_id = $product->id; 
  $subscription_plansagain = get_post_meta($product->id, '_wcsatt_schemes');


  $attachment_ids = $product->get_gallery_image_ids();
  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
  $price =  get_woocommerce_currency_symbol() . $product->get_regular_price();
  $product_display_title = get_field('product_display_title');
  $product_icon = get_field('product_icon');
  $ingredients = get_field('ingredients');
  $usps = get_field('usp');
  $suited_to = get_field('suited_to');
  $why_they_work = get_field('why_they_work');
  $how_to_use = get_field('how_to_use');
  $full_width_image = get_field('full_width_image');

  if(get_the_title() == "Klir Duo"){
    $level_up = get_product(181);
    $unwind = get_product(208);
    $duo = true;
  };
?>

<section class="product-breadcrumbs desktop-only">
  <p> <a href="">NOOTROPICS &nbsp; ></a> &nbsp;<?php echo the_title() ?></p>
</section>

<div class="animated-border js-visibility desktop-only"></div>
<section class="product-main">
  <div class="product-main__inner">
    <div class="product-main__mobile-title mobile-only container">
      <h1 > <?php echo the_title() ?>
        <span><?php echo $product_icon ?></span>        
      </h1>
      <h2 ><?php echo $product_display_title ?></h2>
    </div>
    <div class="product-main__left">
      <div class="product-main__left-inner swiper-wrapper">
        <?php foreach( $attachment_ids as $attachment_id  ) { ?>
          <div class="product-main__card swiper-slide">
            <img src="<?php  echo wp_get_attachment_url( $attachment_id ) ?>" data-id="<?php echo $loop->post->ID; ?>">
          </div>
        <?php }unset($attachment_id); ?>
      </div>
      <div class="product-main__nav">
        <?php _get_template_part('templates/components/_swipe-left'); ?>
        <?php _get_template_part('templates/components/_swipe-right'); ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="animated-border js-visibility"></div>
    </div>
    <div class="product-main__right">
    <div class="animated-border-vert js-visibility reveal-del-1 desktop-only"></div>  
      <div class="product-main__right-inner">
          <?php if ($duo) { ?>
              <?php $product = get_product(339); ?>  
              <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'mobile-form']); ?>                    
            <?php } else{ ?>
              <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'mobile-form']); ?>   
              <?php
            }          
          ?>
         <div class="product-main__right-top">
          <h1 class="desktop-only"> <?php echo the_title() ?>
          <span><?php echo $product_icon ?></span>
          </h1>
          <h2 class="desktop-only"><?php echo $product_display_title ?></h2>

          <div class="" style="margin-top: 1px">reviews will go here  </div>
                  
          <?php if ($duo) { ?>
            <div class="product-main__description level-up-data">
              <?php echo $level_up->get_description() ?>
            </div>
            <div class="product-main__description unwind-data">
              <?php echo $unwind->get_description() ?>
            </div>
            <?php                    
            } else{ ?>
              <div class="product-main__description">
                <?php echo $product->get_description() ?>
              </div>
            <?php
            }          
            ?>
        </div>
        <div class="product-main__right-bottom">
          <div class="wyswyg">
            <div class="product-main__exerpt" >
              <?php the_excerpt() ?>
            </div>   
            <?php if ($duo) { ?>
              <?php $product = get_product(339); ?>  
              <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'desktop-form']); ?>
            
            <?php $product = get_product(338); ?>
            <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'bundle-dummy']); ?> 
            
            <?php } else{ ?>
              <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'desktop-form']); ?>   
              <?php
            }          
            ?>
            <div class="mobile-only">
               <h4 style="font-family: 'founders-grotesk-web-regular';"><?php echo $how_to_use?></h4>
            </div>
          </div>       
        </div> 
      </div>
      <?php if ($duo) { ?>
        <div class="product-main__duo-selection js-visibility reveal-slide">
          <button class="btn js-duo-btn-select active" data-duo-select="levelup">LEVEL UP</button>
          <button class="btn js-duo-btn-select" data-duo-select="unwind">UNWIND</button>
        </div>
      <?php
      }          
      ?>
      <div class="product-main__ingredients desktop-only">
        <div class="product-main__ingredients-title">
          <p>KEY INGREDIENTS</p>
          <?php _get_template_part('templates/components/_icon-plus'); ?>
        </div>
        <?php if ($duo) { ?>
          <div class="product-main__ingredients-hidden level-up-data">
            <div class="product-main__ingredients-hidden-title">
              <p>INGREDIENT</p>
              <p>DAILY SERVING(NRV*))</p>
            </div>
            <?php foreach( get_field( 'ingredients', 181 ) as $ingredient  ) { ?>
              <div class="product-main__ingredient-row">
                <p><?php echo $ingredient['ingredient'] ?></p>
                <p><?php echo $ingredient['daily_serving'] ?></p>
              </div>
            <?php } ?>
              <div class="product-main__ingredient-row">
                <p></p>
                <p>**Nutrient Reference Value</p>
              </div>
          </div>  
          <div class="product-main__ingredients-hidden unwind-data">
            <div class="product-main__ingredients-hidden-title">
              <p>INGREDIENT</p>
              <p>DAILY SERVING(NRV*))</p>
            </div>
            <?php foreach( get_field( 'ingredients', 208 ) as $ingredient  ) { ?>
              <div class="product-main__ingredient-row">
                <p><?php echo $ingredient['ingredient'] ?></p>
                <p><?php echo $ingredient['daily_serving'] ?></p>
              </div>
            <?php } ?>
              <div class="product-main__ingredient-row">
                <p></p>
                <p>**Nutrient Reference Value</p>
              </div>
          </div>  
          <?php
            } else{ ?>

              <div class="product-main__ingredients-hidden">
                <div class="product-main__ingredients-hidden-title">
                  <p>INGREDIENT</p>
                  <p>DAILY SERVING(NRV*))</p>
                </div>
                <?php foreach( $ingredients as $ingredient  ) { ?>   
                  <div class="product-main__ingredient-row">
                    <p><?php echo $ingredient['ingredient'] ?></p>
                    <p><?php echo $ingredient['daily_serving'] ?></p>
                  </div>
                <?php } ?>
                  <div class="product-main__ingredient-row">
                    <p></p>
                    <p>**Nutrient Reference Value</p>
                  </div>
              </div>  


            <?php
            }          
            ?>  
      
      </div>
      <div class="animated-border js-visibility"></div>
    </div>
  </div>
</section>






<section class="product-extra">
  <div class="product-extra__inner">

    <div class="product-extra__left">
    <div class="animated-border-vert js-visibility reveal-del-1 " ></div> 
    
      <div class="product-extra__accordian">











        

        <div class="product-extra__accordian-item mobile-only">   

          <div class="product-extra__accordian-title">
            <h2>KEY INGREDIENTS</h2>
            <?php _get_template_part('templates/components/_icon-plus'); ?>
          </div>
          <?php if ($duo) { ?>

            <div class="product-extra__accordian-hidden level-up-data">
              <div class="product-main__ingredients-hidden-title">
                <p>INGREDIENT</p>
                <p>DAILY SERVING(NRV*))</p>
              </div>
              <?php foreach( get_field( 'ingredients', 181 ) as $ingredient  ) { ?>
                <div class="product-main__ingredient-row">
                  <p><?php echo $ingredient['ingredient'] ?></p>
                  <p><?php echo $ingredient['daily_serving'] ?></p>
                </div>
              <?php } ?>
                <div class="product-main__ingredient-row">
                  <p></p>
                  <p>**Nutrient Reference Value</p>
                </div>
            </div> 
            <div class="product-extra__accordian-hidden unwind-data">
              <div class="product-main__ingredients-hidden-title">
                <p>INGREDIENT</p>
                <p>DAILY SERVING(NRV*))</p>
              </div>
              <?php foreach( get_field( 'ingredients', 208 ) as $ingredient  ) { ?>
                <div class="product-main__ingredient-row">
                  <p><?php echo $ingredient['ingredient'] ?></p>
                  <p><?php echo $ingredient['daily_serving'] ?></p>
                </div>
              <?php } ?>
                <div class="product-main__ingredient-row">
                  <p></p>
                  <p>**Nutrient Reference Value</p>
                </div>
              </div> 
            
            <?php                    
            } else{ ?>
          
            <div class="product-extra__accordian-hidden">
              <div class="product-main__ingredients-hidden-title">
                <p>INGREDIENT</p>
                <p>DAILY SERVING(NRV*))</p>
              </div>
              <?php foreach( $ingredients as $ingredient  ) { ?>   
                <div class="product-main__ingredient-row">
                  <p><?php echo $ingredient['ingredient'] ?></p>
                  <p><?php echo $ingredient['daily_serving'] ?></p>
                </div>
              <?php } ?>
                <div class="product-main__ingredient-row">
                  <p></p>
                  <p>**Nutrient Reference Value</p>
                </div>
            </div>  
          
          <?php
          }          
          ?>  
        </div>
        <div class="animated-border js-visibility reveal-del-1 mobile-only"></div>  
        <div class="product-extra__accordian-item">          
          <div class="product-extra__accordian-title">
            <h2>SUITED TO</h2>
            <?php _get_template_part('templates/components/_icon-plus'); ?>
          </div>
          <?php if ($duo) { ?>
            <div class="product-extra__accordian-hidden level-up-data"> 
              <p><?php echo get_field('suited_to', 181); ?></p>
            </div> 
            <div class="product-extra__accordian-hidden unwind-data"> 
              <p><?php echo get_field('suited_to', 208); ?></p>
            </div> 
            <?php                    
            } else{ ?>          
              <div class="product-extra__accordian-hidden"> 
                <p><?php echo  $suited_to ?></p>
              </div>   
            <?php
            }          
            ?>  
          <div class="animated-border js-visibility reveal-del-1 "></div>  
        </div>
        <div class="product-extra__accordian-item">          
          <div class="product-extra__accordian-title">
            <h2>WHY THEY WORK</h2>
            <?php _get_template_part('templates/components/_icon-plus'); ?>
          </div>
          <?php if ($duo) { ?>
            <div class="product-extra__accordian-hidden level-up-data">             
              <p><?php echo get_field('why_they_work', 181); ?></p>
            </div> 
            <div class="product-extra__accordian-hidden unwind-data"> 
              <p><?php echo get_field('why_they_work', 208); ?></p>
            </div> 
            <?php                    
            } else{ ?>          
              <div class="product-extra__accordian-hidden">
                <p><?php echo $why_they_work ?></p>
              </div>   
            <?php
            }          
            ?>  
          <div class="animated-border js-visibility reveal-del-1 "></div>  
        </div>

        <div class="product-extra__accordian-item desktop-only">          
          <div class="product-extra__accordian-title">
            <h2>HOW TO USE</h2>
            <?php _get_template_part('templates/components/_icon-plus'); ?>
          </div>
          <?php if ($duo) { ?>
            <div class="product-extra__accordian-hidden level-up-data">             
              <p><?php echo get_field('how_to_use', 181); ?></p>
            </div> 
            <div class="product-extra__accordian-hidden unwind-data"> 
              <p><?php echo get_field('how_to_use', 208); ?></p>
            </div> 
            <?php                    
            } else{ ?>          
          <div class="product-extra__accordian-hidden">
              <p><?php echo $how_to_use?></p>
          </div>   
            <?php
            }          
          ?>
          <div class="animated-border js-visibility reveal-del-1"></div>  
        </div>  
      </div>
    </div>




    <div class="product-extra__right">  
      <div class="product-extra__right-grid">     
          <?php if ($duo) { ?>
            <?php foreach( get_field( 'usp', 181 ) as $usp  ) { ?>
              <div class="product-extra__grid-item-wrap level-up-data">     
                <div class="product-extra__grid-item-inner">
                  <div class="product-extra__grid-svg-wrap">
                    <?php echo $usp['svg'] ?>
                  </div>  
                  <p><?php echo $usp['usp_copy'] ?></p>
                </div>
                <div class="animated-border js-visibility"></div>
                <div class="animated-border-vert js-visibility reveal-del-1"></div>  
              </div>
            <?php } ?>
            <?php foreach( get_field( 'usp', 208 ) as $usp  ) { ?>
              <div class="product-extra__grid-item-wrap unwind-data">     
                <div class="product-extra__grid-item-inner">
                  <div class="product-extra__grid-svg-wrap">
                    <?php echo $usp['svg'] ?>
                  </div>  
                  <p><?php echo $usp['usp_copy'] ?></p>
                </div>
                <div class="animated-border js-visibility"></div>
                <div class="animated-border-vert js-visibility reveal-del-1"></div>  
              </div>
            <?php } ?>
            <?php                    
            } else{ ?>
              <?php foreach( $usps as $usp  ) { ?>
                <div class="product-extra__grid-item-wrap">     
                  <div class="product-extra__grid-item-inner">
                    <div class="product-extra__grid-svg-wrap">
                      <?php echo $usp['svg'] ?>
                    </div>  
                    <p><?php echo $usp['usp_copy'] ?></p>
                  </div>
                  <div class="animated-border js-visibility"></div>
                  <div class="animated-border-vert js-visibility reveal-del-1"></div>  
                </div>
              <?php } ?>
            <?php
            }          
            ?>  
        </div>   
      
      

      </div>
    </div>

  </div>
</section>

<section class="full-width-image js-visibility reveal-slide">
  <?php _get_template_part('templates/components/_resp-img', ['field' => $full_width_image, 'class' => 'full-width-image__image', 'sizes' => '(max-width: 1923px) 100vw, 950px']); ?>
</section>


<?php 
  $complete_the_set_section_header = get_field('complete_the_set_section_header', 'options');
  $complete_the_set_image = get_field('complete_the_set_image', 'options');
  $complete_the_set_section_copy = get_field('complete_the_set_section_copy', 'options');
?>


<?php if (!$duo) { ?>
<div class="animated-border js-visibility"></div>
<section class="complete-the-set ">
  <div class="complete-the-set__section-header">
    <h2><?php echo $complete_the_set_section_header ?></h2>
  </div>
  <div class="complete-the-set__inner">
    <div class="complete-the-set__copy complete-the-set__copy--mobile">
      <?php echo $complete_the_set_section_copy?>
    </div>
    
    <div class="complete-the-set__left js-visibility reveal-slide">
    <?php _get_template_part('templates/components/_resp-img', ['field' => $complete_the_set_image, 'class' => '', 'sizes' => '(max-width: 1023px) 100vw, 950px']); ?>
    </div>
    <div class="complete-the-set__right js-visibility reveal-slide reveal-del-1">
      <div class="complete-the-set__copy complete-the-set__copy--desktop ">
        <?php echo $complete_the_set_section_copy?>
      </div>      
      <a href="" class="desktop-only"><h5>MORE INFORMATION</h5> </a>


              <?php $product = get_product(339); ?>  




              <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'desktop-form']); ?>
            
            <?php $product = get_product(338); ?>
            <?php _get_template_part('templates/components/_add-to-cart-form', ['product' => $product, 'id' => 'bundle-dummy']); ?> 
            


      <div class="complete-the-set__copy complete-the-set__copy--mobile ">
        <?php echo $complete_the_set_section_copy?>
        <a href="" class="mobile-only" style="text-decoration: underline;"><h5>MORE INFO</h5> </a>
      </div>
    </div>
  </div>
</section>
<div class="animated-border js-visibility"></div>
<?php
}
?>

<?php wp_footer(); ?>     





  




