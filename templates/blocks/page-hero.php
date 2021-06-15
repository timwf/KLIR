<?php
  $background_image = get_field('background_image');
  $header = get_field('header');
  $sub_header = get_field('sub_header');
?>

<section class="page-hero" style="background-image: url('<?php echo $background_image['url'] ?>')">
  <div class="page-hero__inner container  js-visibility reveal-slide">
    <h1><?php echo $header ?></h1>
    <h2><?php echo $sub_header ?></h2>
  </div>
  <div class="page-hero__scroll">
    <button class="btn-oval">SCROLL</button>
  </div>
</section>





