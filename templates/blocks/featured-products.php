
<?php
  $section_title = get_field('section_title');
  $featured_product_one = get_field('featured_product_one');  
  $featured_product_two = get_field('featured_product_two');
?>

<section class="featured-products">
  <div class="featured-products__inner container">
    <h2 class="section-header"><?php echo $section_title ?></h2>
    <div class="featured-products__wrap">
      <div class="featured-products__left">
      <div class="featured-products__image">
          <?php _get_template_part('templates/components/_resp-img', ['field' => $featured_product_one['image'], 'class' => 'featured-products__image-show', 'sizes' => '(max-width: 1023px) 100vw, 950px']); ?>
          <?php _get_template_part('templates/components/_resp-img', ['field' => $featured_product_one['hidden_image'], 'class' => 'featured-products__image-hidden', 'sizes' => '(max-width: 1023px) 100vw, 950px']); ?>
        </div>
        <a class="text-link" href="<?php echo $featured_product_one['secondary_button']['url'] ?>"><?php echo $featured_product_one['secondary_button']['title'] ?></a>
        <p><?php echo $featured_product_one['copy']?></p>
        <a class="featured-products__button no-opacity" href="<?php echo $featured_product_one['primary_button']['url']?>">
          <button class="btn"><?php echo $featured_product_one['primary_button']['title']?></button>
        </a>        
      </div>
      <div class="featured-products__right">
        <div class="featured-products__image">
          <?php _get_template_part('templates/components/_resp-img', ['field' => $featured_product_two['image'], 'class' => 'featured-products__image-show', 'sizes' => '(max-width: 1023px) 100vw, 950px']); ?>
          <?php _get_template_part('templates/components/_resp-img', ['field' => $featured_product_two['hidden_image'], 'class' => 'featured-products__image-hidden', 'sizes' => '(max-width: 1023px) 100vw, 950px']); ?>
        </div>

        <a class="text-link" href="$featured_product_two['secondary_button']['url'] "><?php echo $featured_product_two['secondary_button']['title'] ?></a>
        <p><?php echo $featured_product_two['copy']?></p>
        <a class="featured-products__button no-opacity" href="<?php echo $featured_product_two['primary_button']['url']?>">
          <button class="btn"><?php echo $featured_product_two['primary_button']['title']?></button>
        </a>
      </div>
    </div>
  </div>
</section>


