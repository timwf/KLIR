<?php
  $product = $template_args['product'];
  $subscription_plansagain = get_post_meta($product->id, '_wcsatt_schemes');
  $id = $template_args['id'];
?>

<?php 

if($product->id == 339){
  $unwindProduct = get_product(338);
  $unwindSubs = get_post_meta(338, '_wcsatt_schemes');
  $bundlePrice = get_woocommerce_currency_symbol() . number_format($unwindProduct->get_price() + $product->get_price(), 2);
  foreach ($subscription_plansagain[0] as $key=>$item){
    $levelUpDiscounted_price = $product->get_price() - (number_format( (float)($product->get_price() * $item['subscription_discount'] / 100), 3, '.', '')); 
  } 
  foreach ($unwindSubs[0] as $key=>$item){
    $unwindDiscounted_price = $unwindProduct->get_price() - (number_format( (float)($unwindProduct->get_price() * $item['subscription_discount'] / 100), 3, '.', '')); 
  } 
  $bundleDiscount = get_woocommerce_currency_symbol() . (number_format( round($unwindDiscounted_price + $levelUpDiscounted_price, 2, PHP_ROUND_HALF_UP), 2)); 
  ?>

<form id="<?php echo $id ?>" class="cart add-to-cart-form js-bundle-form" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
  <div class="add-to-cart-form__sub-btns ">
    <?php if( $subscription_plansagain[0]){ ?>
      <button class="btn active onetime-btn ontime-btn-bundle">ONE-TIME PURCHASE <span><?php echo $bundlePrice; ?></span></button>   
      <?php foreach ($subscription_plansagain[0] as $key=>$item):?>  
        <?php 
          $percentOff = $item['subscription_discount']          
        ?>
        
        <?php ?>
        <div class="add-to-cart-form__hidden-sub-info">
          <h5><span style="text-decoration: line-through; "><?php echo $bundlePrice; ?></span> <span><?php echo $bundlePrice ?> delivery every 30 days</span></h5>
          <p>Cancel Anytime</p>
          <p>Delivery every 30 days</p>
          <p>Plant 10 trees per month</p>
          <p>and track your impact</p>
        </div>  
      
        <button 
        class="btn subscription-btn subscription-btn-bundle"
        data-subscription-attr="<?php echo $item['subscription_period_interval'] . "_" . $item['subscription_period'] ?>"
        
        >SUBSCRIBE & SAVE <?php echo $percentOff ?>%<span><?php echo $bundleDiscount?></span> </button>          
      <?php endforeach; ?>     
    <?php } ?>
  </div>
  <button name="add-to-cart" type="submit" class="btn duo btn-add-to-cart" >ADD TO CART</button>
  <?php 
  do_action( 'woocommerce_before_add_to_cart_button' ); 
  do_action( 'woocommerce_after_add_to_cart_quantity' );
  ?>
  <button style="" type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class=" button alt"></button>
  <?php //do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>



<?php
  }else{?>

<form id="<?php echo $id ?>" class="cart add-to-cart-form" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
  <div class="add-to-cart-form__sub-btns ">
    <?php if( $subscription_plansagain[0]){ ?>
      <?php 
        $formatedPrice = get_woocommerce_currency_symbol() . number_format($product->get_price(), 2); 
      ?>
      <button class="btn active onetime-btn">ONE-TIME PURCHASE <span><?php echo $formatedPrice ?></span></button>   
      <?php foreach ($subscription_plansagain[0] as $key=>$item):?>  
        <?php 
          $discounted_price = $product->get_price() - (number_format( (float)($product->get_price() * $item['subscription_discount'] / 100), 3, '.', '')); 
          $formatedDiscout = get_woocommerce_currency_symbol() . (number_format( round($discounted_price, 2, PHP_ROUND_HALF_UP), 2));
          $percentOff = $item['subscription_discount'];
          
        ?>
        
        <?php ?>
        <div class="add-to-cart-form__hidden-sub-info">
          <h5><span style="text-decoration: line-through; "><?php echo $formatedPrice ?></span> <span><?php echo $formatedDiscout?> delivery every 30 days</span></h5>
          <p>Cancel Anytime</p>
          <p>Delivery every 30 days</p>
          <p>Plant 10 trees per month</p>
          <p>and track your impact</p>
        </div>  
      
        <button 
        class="btn subscription-btn"
        data-subscription-attr="<?php echo $item['subscription_period_interval'] . "_" . $item['subscription_period'] ?>"
        
        >SUBSCRIBE & SAVE <?php echo $percentOff ?>%<span><?php echo $formatedDiscout?></span> </button>          
      <?php endforeach; ?>     
    <?php } ?>
  </div>
  <button  type="submit" class="btn btn-add-to-cart" 
          data-product-id="<?php echo $product->id ?>"
          data-sub-option=""
          >ADD TO CART</button>
  <?php 
  do_action( 'woocommerce_before_add_to_cart_button' ); 
  do_action( 'woocommerce_after_add_to_cart_quantity' );
  ?>
  <button style="" type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class=" button alt"></button>
  <?php //do_action( 'woocommerce_after_add_to_cart_button' ); ?>
</form>

<?php
  }
?>


