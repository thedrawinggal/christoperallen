<?php
$hero_image = get_field('hero_image');
$hero_quote = get_field('hero_quote');
?>
<?php if (is_front_page()):?>

  <div class="home children-reveal">
    <div class="hero">
  		<img src="<?php echo $hero_image ?>" class="children-reveal-child" />
  		<div class="overlay"></div>
  		<div class="overlay-2"></div>
      <div class="overlay-3"></div>
      <div class="quote children-reveal-child">
        <div class="quote-inner">
          <?php echo $hero_quote; ?>
        </div>
      </div>
      <div class="logo children-reveal-child">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-lg.png" />
      </div>
  	</div>
  </div>

<?php endif; ?>
