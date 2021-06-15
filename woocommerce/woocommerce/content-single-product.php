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
$title = the_title();
$attachment_ids = $product->get_gallery_image_ids();
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );
$price =  get_woocommerce_currency_symbol() . $product->get_regular_price();
$subTitle = get_field('test_box');
$benefits = get_field('benefits');
?>

<div class="product__wrap" >
  <div class="product__inner container">
  <div class="product__mobile-header">
  <h1><?php echo the_title();?></h1>


  <?php if ( has_excerpt() ) { the_excerpt(); } else { echo ''; } ?>
      
      

      <p class="product__subtitle"><?php echo $subTitle; ?></p>
      
      <div class="product__text-description">
        <div class="product__subscription-options">
          <div class="product__subscription-item">
            <input name="collection" type="radio" id="pricemobile" value="" checked>
            <label data="" for="pricemobile"><?php echo $price ?> <span>- one off</span></label>
          </div>

         <?php if( $subscription_plansagain[0]){ ?>
          <?php foreach ($subscription_plansagain[0] as $key=>$item):?>
            <?php $discounted_price = $product->get_price() - (number_format((float)($product->get_price() * $item['subscription_discount'] / 100), 2, '.', '')) ?>
            <div class="product__subscription-item">
              <input name="collection" type="radio" id="<?php echo $key ?>mobile" value="<?php echo $item['subscription_period_interval'] . "_" . $item['subscription_period'] ?>">
              <label data="" for="<?php echo $key ?>mobile">  <?php echo get_woocommerce_currency_symbol() . $discounted_price . " <span>- every " . $item['subscription_period_interval'] . " " . $item['subscription_period'] ?>s </span> </label> 
            </div>
          <?php endforeach; ?>   
        <?php } ?>
        </div>

        <div class="product__benefts">
            <ul>
            <?php if ($benefits): ?>
              <?php foreach ($benefits as $benefit):?>
                <li><?php echo $benefit['benefit'] ?></li>
              <?php endforeach; ?>  
            <?php endif ?>   
            </ul>
          </div>
        
        <div class="product__more-info">
          <div class="product__more-info-btn">
            <p><span>+ </span>MORE PRODUCT INFO</p>
          </div>
          <div class="product__more-info-text-wrap">
           <?php echo $product->get_description();  ?>
          </div>          
        </div>
      </div>  
    
  </div>
    <div class="product__image-wrap">
    <div class="slider-nav__controls">
          <svg class="slider-nav__left" xmlns="http://www.w3.org/2000/svg" width="27" height="51" viewBox="0 0 27 51"><g><g transform="rotate(-90 14 26)"><g><path fill="none" stroke="#000" stroke-linecap="square" stroke-miterlimit="20" d="M-10.2 38.35L15 13.15"/></g><g><path fill="none" stroke="#000" stroke-linecap="square" stroke-miterlimit="20" d="M15 13.15l23.4 25.2"/></g></g></g></svg>
          <svg class="slider-nav__right" xmlns="http://www.w3.org/2000/svg" width="28" height="51" viewBox="0 0 28 51"><g><g transform="rotate(-270 14 25.5)"><g><path fill="none" stroke="#000" stroke-linecap="square" stroke-miterlimit="20" d="M-10.97 38.35l25.2-25.2"/></g><g><path fill="none" stroke="#000" stroke-linecap="square" stroke-miterlimit="20" d="M14.23 13.15l23.4 25.2"/></g></g></g></svg>
        </div>
      <div class="slider-nav">
      <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        <?php foreach( $attachment_ids as $attachment_id  ) { ?>
          <img src="<?php  echo wp_get_attachment_url( $attachment_id ) ?>" data-id="<?php echo $loop->post->ID; ?>">
        <?php }unset($attachment_id);
        ?> 
      </div>
      <div class="product__carousel">
        <div class="product__carousel-item">
          <img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>
        <?php foreach( $attachment_ids as $attachment_id  ) { ?>
        <div class="product__carousel-item">
          <img src="<?php  echo wp_get_attachment_url( $attachment_id ) ?>" data-id="<?php echo $loop->post->ID; ?>">
        </div>
        <?php }
        ?>         
      </div>    
    </div>
    <div class="product__text-wrap">
      <h1><?php echo the_title();?></h1>
      <div class="excerpt">
        <?php the_excerpt();?>
      </div>
      <p class="product__subtitle"><?php echo $subTitle; ?></p>
      
      <div class="product__text-description">

        <div class="product__subscription-options">
          <div class="product__subscription-item">
            <input name="collection" type="radio" id="price" value="" checked>
            <label data="" for="price"><?php echo $price ?> <span> - one off</span></label>
          </div>

          <?php if( $subscription_plansagain[0]){ ?>
            <?php foreach ($subscription_plansagain[0] as $key=>$item):?>
              <?php $discounted_price = $product->get_price() - (number_format((float)($product->get_price() * $item['subscription_discount'] / 100), 2, '.', '')) ?>
              <div class="product__subscription-item">
                <input name="collection" type="radio" id="<?php echo $key ?>" value="<?php echo $item['subscription_period_interval'] . "_" . $item['subscription_period'] ?>">
                <label data="" for="<?php echo $key ?>">  <?php echo get_woocommerce_currency_symbol() . $discounted_price . "<span> - every " . $item['subscription_period_interval'] . " " . $item['subscription_period'] ?>s</span> </label> 
              </div>
            <?php endforeach; ?>   
          <?php } ?>
         </div>

          <div class="product__benefts">
            <ul>
            <?php if ($benefits): ?>
              <?php foreach ($benefits as $benefit):?>
                <li><?php echo $benefit['benefit'] ?></li>
              <?php endforeach; ?>  
            <?php endif ?>   
            </ul>
          </div>
          
          <div class="product__more-info">
            <div class="product__more-info-btn">
              <p><span>+ </span>MORE PRODUCT INFO</p>
            </div>
            <div class="product__more-info-text-wrap">
            <?php echo $product->get_description();  ?>
            </div>          
          </div>
        


      </div>
      <?php
        $product_attributes = $product->get_attributes();
        foreach ( $product_attributes as $attribute ) { ?>
        <?php $product_var = get_the_terms( $post, $attribute['name'] ); ?>
        <?php 
          // strips pa_ and characters for option title
          $attrnames = str_replace("pa_", "", $attribute['name']);       
        ?>
        <div class="product__option-wrap">
          <div class="product__attribute-title">
            <h4>Choose your <?php echo str_replace("-", " ", $attrnames);   ?></h4>
            <?php 
            $description = false;
            foreach ( $product_var as $item) {  ?>
              <?php if ( $item->description ) { 
                $description = true;
              }          
            }             
            if ($description) {
              ?>              
              <h4 class="js-open-attr-info"><span>+ </span>More Info</h4>
            <?php } ?>
          </div>
          
          <div class="product__attribute-description">
          <?php foreach ( $product_var as $item) {  ?>
            <?php if ( $item->description ) { ?>
            <div class="product__attribute-description-wrap">
              <h5 class="js-open-attr-details"><span>+  </span><?php echo str_replace("-", " ", ($item->slug)); ?></h5>
              <p><?php echo $item->description; ?></p>
            </div>

          <?php }} ?>
          </div>          
          <div class="product__options">   
          <?php foreach ( $product_var as $item) {  ?>
            <?php 
                if( (strpos($attrnames, 'link') !== false) && $item->description){ ?>
                  <a href="../<?php echo $item->description; ?>"><?php
                }           
              ?>
            <div class="product__option-item" 
              data-choice="<?php echo ($item->slug); ?>"
              data-name="<?php echo $attribute['name']?>"
              >
              <?php _get_template_part('templates/components/_product-icons', [
              'icon' => ($item->slug)
              ]); ?>

              <p class="product__options-option"><?php echo ($item->name); ?></p>
            </div>
            <?php 
                if( strpos($attrnames, 'link') !== false){ ?>
                 </a> <?php
                }           
              ?>
        <?php       
        }
          ?>
        </div>
        </div>
        <?php  
        }  
        ?>

      <?php
     //} ?>
      <div class="product__quantity">
        <h4>Quantity</h4>
        <p>HOW MANY WOULD YOU LIKE?</p>
        <div class="product__qty-selector">
          <p class="product__qty-minus">-</p>
          <p class="product__qty-total">1</p>
          <p class="product__qty-plus">+</p>
        </div>
      </div>
      <form method="post" id="add-to-cart-form"> 
        <input id="prod-id" type="hidden" name="prod_id" value="<?php echo $product_id ?>">
        <input id="subscription" type="hidden" name="subscription" value="">
        <input id="qty-num" type="hidden" name="qty" value="1">
        <input id="varArry" type="hidden" name="var_new">
        <button id="add-to-cart-btn" type="submit" name="button1" value="BUY NOW - ">
        BUY NOW - <?php echo $price ?>
      </button>
      </form> 
    </div>
  </div>
</div>

  
<?php

  $variableProduct = new WC_Product_Variable($product_id);
  $subscription_plans = $variableProduct->get_available_variations();
  $subscription_plansagain = get_post_meta($product->id, '_wcsatt_schemes');  
   


  if(isset($_POST['button1'])) { 

    function redirect($url){
      $string = '<script type="text/javascript">';
      $string .= 'window.location = "' . $url . '"';
      $string .= '</script>';
      echo $string;
    };

    redirect('./cart');   

    //TODO - add security
    $quantity = $_POST['qty'];
    $varChoiceNew = $_POST['var_new'];
    $subscriptionChoice = $_POST['subscription'];
    $tempData = preg_replace("/\\\\/", "", $varChoiceNew);
    $cleanData = json_decode($tempData);


    $match_attributes =  array(
      "attribute_" . $cleanData[0] ->varAttr  => $cleanData[0]->varChoice,
      "attribute_" . $cleanData[1]->varAttr => $cleanData[1]->varChoice,
      "attribute_" . $cleanData[2]->varAttr => $cleanData[2]->varChoice,
      "attribute_" . $cleanData[3]->varAttr => $cleanData[3]->varChoice,
      "attribute_" . $cleanData[4]->varAttr => $cleanData[4]->varChoice,
      "attribute_" . $cleanData[5]->varAttr => $cleanData[5]->varChoice,
      "attribute_" . $cleanData[6]->varAttr => $cleanData[6]->varChoice,
      "attribute_" . $cleanData[7]->varAttr => $cleanData[7]->varChoice,
      "attribute_" . $cleanData[8]->varAttr => $cleanData[8]->varChoice,
      "attribute_" . $cleanData[9]->varAttr => $cleanData[9]->varChoice,
      "attribute_" . $cleanData[10]->varAttr => $cleanData[10]->varChoice,
      "attribute_" . $cleanData[11]->varAttr => $cleanData[11]->varChoice,
      "attribute_" . $cleanData[12]->varAttr => $cleanData[12]->varChoice,
    ); 

    $meta_data = array(
      'Line One'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[0]->varAttr) . ": " . $cleanData[0]->varChoice,
      'Line Two'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[1]->varAttr) . ": " . $cleanData[1]->varChoice,
      'Line Three'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[2]->varAttr) . ": " . $cleanData[2]->varChoice,
      'Line Four'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[3]->varAttr) . ": " . $cleanData[3]->varChoice,
      'Line Five'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[4]->varAttr) . ": " . $cleanData[4]->varChoice,
      'Line Six'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[5]->varAttr) . ": " . $cleanData[5]->varChoice,
      'Line Seven'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[6]->varAttr) . ": " . $cleanData[6]->varChoice,
      'Line Eight'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[7]->varAttr) . ": " . $cleanData[7]->varChoice,
      'Line Nine'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[7]->varAttr) . ": " . $cleanData[7]->varChoice,
      'Line Ten'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[7]->varAttr) . ": " . $cleanData[7]->varChoice,
      'Line Eleven'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[7]->varAttr) . ": " . $cleanData[7]->varChoice,
      'Line Twelve'=>str_replace(['pa_', '-', '/', '*'], ' ', $cleanData[7]->varAttr) . ": " . $cleanData[7]->varChoice,
    );

    array_push($meta_data, "Line One", "this");

    $data_store   = WC_Data_Store::load( 'product' );
    $variation_id = $data_store->find_matching_product_variation(
      new \WC_Product( $product_id),$match_attributes
    );  

    $variation  = array();

    WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation, array('add_size' => $meta_data, 'tim_id' => "here", "tim_months" => $subscriptionChoice)); 
  } 
?> 

<?php wp_footer(); ?>     





  




