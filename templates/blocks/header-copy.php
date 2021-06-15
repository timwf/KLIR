<?php
  $header = get_field('header');
  $copy = get_field('copy');
?>

<section class="header-copy">
  <div class="header-copy__inner container js-visibility reveal-slide">
    <h2 class=""><?php echo $header ?></h2>
    <p class="" ><?php echo $copy ?></p>
  </div>
</section>
