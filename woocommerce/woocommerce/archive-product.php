<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;


get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>

<?php


$args = array(
    'number'     => $number,
    'orderby'    => 'title',
    'order'      => 'DESC',
    'hide_empty' => $hide_empty,
    'include'    => $ids
);

$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);

?>

<div class="container" >
  <div class="collection-header">
    <div class="collection-header__left js-visibility reveal-slide">
      <h1><span class="js-collection-title">Let's </span> shop</h1>
      <p class="js-collection-subtitle">Being beautiful shouldn't cost the earth. Literally. At Fiils, we believe in sustainable beauty. And it all starts with a refill. Our range of natural beauty and personal care products are sulphate and paraben-free (no nasties allowed!), with over 75% pure plant extracts.</p>
    </div>
    <div class="collection-header__right">
      <div class="collection-header__search">
        <input autocomplete="false" autocomplete="off" type="text" id="fname" name="fname" placeholder="" class="search">
        <span class="placeholder">Search Shop</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><defs><clipPath id="4tlda"><path fill="#fff" d="M7 14A7 7 0 1 0 7 0a7 7 0 0 0 0 14z"/></clipPath></defs><g><g><g><path fill="none" stroke="#000" stroke-miterlimit="20" stroke-width="2.5" d="M7 14A7 7 0 1 0 7 0a7 7 0 0 0 0 14z" clip-path="url(&quot;#4tlda&quot;)"/></g><g><path fill="none" stroke="#000" stroke-linecap="round" stroke-miterlimit="20" stroke-width="1.25" d="M11 12l6 5"/></g></g></g></svg>
      </div>
      <div class="collection-header__select">
      <?php  if ( $count > 0 ){
        foreach ( $product_categories as $product_category ) {?>
          <?php if ( $product_category->count > 1 ){ ?>
            <div class="collection-header__select-radio">
              <label data-collection="<?php echo $product_category->name ?>" for="<?php echo $product_category->name ?>"><?php echo $product_category->name ?></label>
              <input name="collection" type="radio" id="male" value="<?php echo $product_category->name ?>">
            </div>
          <?php           
          } 
        }
      } ?>
        <div class="collection-header__select-radio">
          <label for="all">All</label>
          <input type="radio" id="all" name="collection" value="all">
        </div>
      </div>
    </div>
  </div>

  <div class="search-results-not-found">
  </div>

<?php
if ( $count > 0 ){
  foreach ( $product_categories as $product_category ) {?> 
    <?php if ( $product_category->count > 0 ){ ?>
  <div class="collection js-visibility reveal-slide reveal-del-1" >
    <div id="js-container" class="collection__inner container"> 
      <h1 class="collection-name"><?php echo $product_category->name ?></h1>     
      <h4><?php echo $product_category->description ?></h4>         
      <div class="collection__grid">
        <?php
      } 
      $args = array(
          'posts_per_page' => -1,
          'tax_query' => array(
              'relation' => 'AND',
              array(
                  'taxonomy' => 'product_cat',
                  'field' => 'slug',
                  'terms' => $product_category->slug
              )
          ),
          'post_type' => 'product',
          'orderby'    => 'menu_order',
          'order'      => 'ASC'
      );
      $loop = new WP_Query( $args );

      while ( $loop->have_posts() ) {
          $loop->the_post();         
          ?>
          <?php //var_dump($product)?>
        <div class="collection__item">
          <a href="<?php the_permalink(); ?>">
            <div class="collection-item__image-wrap">
             <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img class="js-product-image" src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
            </div>          
          </a>
          <div class="collection__item-price">
            <h3 class="js-product-title"><?php the_title(); ?></h3>
            <h3 style="text-align: right"><?php echo $product->get_price_html(); ?></h3> 
          </div>
          <p> <?php echo $product->post->post_excerpt; ?></p>
        </div>
        <?php
          }?>  
      </div>   
    </div>  
  </div>    
    <?php
      }
    }
    ?>
  <div class="search-results container collection__grid">
  </div>

</div>



<?php wp_footer(); ?>


