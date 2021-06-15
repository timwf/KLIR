<?php
  $header = get_field('header');
  $copy = get_field('copy');
?>

<section class="sustainability-logos">
  <div class="sustainability-logos__inner container">
    <h2 class="js-visibility reveal-slide"><?php echo $header ?></h2>
    <p class="" ><?php echo $copy ?></p>
    <div class="sustainability-logos__grid ">

      <div class="sustainability-logos__grid-item js-visibility reveal-slide">
      <?php _get_template_part('templates/components/_icon-trees'); ?>
        <h4>720</h4>
        <p>TREES IN YOUR FOREST</p>
      </div>

      <div class="sustainability-logos__grid-item js-visibility reveal-slide reveal-del-1">
      <?php _get_template_part('templates/components/_icon-cloud'); ?>
        <h4>53.01T</h4>
        <p>OF CARBON REDUCTION</p>
      </div>

      <div class="sustainability-logos__grid-item js-visibility reveal-slide reveal-del-2">
      <?php _get_template_part('templates/components/_icon-world'); ?>
        <h4>4 MONTHS</h4>
        <p>CLIMATE POSITIVE WORKPLACE</p>
      </div>


    </div>
  </div>

</section>
<div class="animated-border js-visibility"></div>

