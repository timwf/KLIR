<?php
  $image = get_field('image');
  $title_bold = get_field('title_bold');
  $title_light = get_field('title_light');
  $copy = get_field('copy');
  $buttonLink = get_field('button');
?>

<section class="hero" style="">

  <div class="hero__inner container container--small js-visibility reveal-slide">
    <div class="hero__left">
      <h1><?php echo $title_bold ?></h1>
      <h2><?php echo $title_light ?></h2>
      <p class="body-text"><?php echo $copy ?></p>
      <a class="hero__button no-opacity" href="<?php echo $buttonLink['url']?>">
          <button class="btn btn--primary"><?php echo $buttonLink['title']?></button>
      </a>        
    </div>
    <div class="hero__right ">
      <img class="" src="<?php  echo $image['url'] ?>" alt="">

    </div>
  </div>

</section>