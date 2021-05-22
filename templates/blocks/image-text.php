<?php
  $layout = strtolower(get_field('layout'));
  $title_padding = strtolower(get_field('title_padding'));
  $image_width = strtolower(get_field('image_width'));  
  $title = get_field('title');
  $image = get_field('image');
  $copy = get_field('copy');
  $button = get_field('button');
?>


<div class="animated-border js-visibility"></div>
<section class="image-text">
  <div class="image-text__inner image-text__inner--<?php echo $layout?>">
    <div class="image-text__image-wrap image-text__image-wrap--<?php echo $image_width ?> js-visibility reveal-slide reveal-del-1">
      <?php _get_template_part('templates/components/_resp-img', ['field' => $image, 'class' => '', 'sizes' => '(max-width: 1023px) 100vw, 950px']); ?>
    </div>
    <div class="image-text__copy-wrap image-text__copy-wrap--<?php echo $image_width ?> js-visibility reveal-slide">
      <h2 class="section-header"><?php echo $title ?></h2>
      <p class="body-text image-text__copy-size-<?php echo $title_padding?>"><?php echo $copy ?></p>
      <a class="text-link" href="<?php echo $button['url']?> "><?php echo $button['title']?></a>    
    </div>
  </div>
</section>
<div class="animated-border js-visibility"></div>


