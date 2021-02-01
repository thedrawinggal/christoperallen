<div class="children-reveal gallery">
  <?php
  $images = get_field('gallery');
  $thumbnail_alignment = 'top';
  ?>

  <?php foreach( $images as $image ): ?>

      <div class="constrained-height columns one-third-width children-reveal-child gallery-item">
        <img src="<?php echo esc_url($image['sizes']['medium_large']); ?>" style="object-position: <?php echo $thumbnail_alignment; ?> center;" />
      </div>
      <div class="modal gallery-item-modal">
        <div class="modal-close">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg"/>
        </div>
        <div class="gallery-image" id="image" >
          <img src="<?php echo esc_url($image['sizes']['2048x2048']); ?>" />
        </div>
        <?php if($image['caption']): ?>
          <div class="gallery-caption">
            <div class="gallery-caption-inner">
              <?php echo $image['caption']; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>

  <?php endforeach; ?>

</div>
