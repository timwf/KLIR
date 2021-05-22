<?php
  $image = get_field('image');
?>

<section class="full-width-image js-visibility reveal-slide">
  <?php _get_template_part('templates/components/_resp-img', ['field' => $image, 'class' => 'full-width-image__image', 'sizes' => '(max-width: 1923px) 100vw, 950px']); ?>
</section>