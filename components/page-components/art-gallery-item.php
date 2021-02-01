<?php
$image = get_sub_field('image');
$title = get_sub_field('title');
$material = get_sub_field('material');
$caption = get_sub_field('caption');
?>
<div class="gallery-item full-width children-reveal-child">
  <img src="<?php echo $image; ?>" />
</div>
<div class="gallery-desc children-reveal-child">
  <h3><?php echo $title; ?></h5>
  <?php if($material): ?>
    <h5><?php echo $material; ?></h5>
  <?php endif;?>
</div>
<div class="gallery-item-modal">
  <div class="gallery-modal-close">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg"/>
  </div>
  <div class="gallery-image" id="image" >
    <img src="<?php echo $image; ?>" />
  </div>
  <div class="gallery-caption">
    <div class="gallery-caption-inner">
      <h3><?php echo $title; ?></h5>
      <?php if($material): ?>
        <h5><?php echo $material; ?></h5>
      <?php endif;?>
      <?php if($caption): ?>
        <p><?php echo $caption; ?></p>
      <?php endif;?>
      <button class="gallery-prev">Prev</button>
      <button class="gallery-next">Next</button>
    </div>
  </div>
</div>
