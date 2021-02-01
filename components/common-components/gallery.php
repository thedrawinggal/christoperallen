<div class="children-reveal gallery">

  <?php if( have_rows('gallery') ): ?>
    <?php while( have_rows('gallery') ): the_row(); ?>
      <?php
        $thumbnail = get_sub_field('thumbnail');
        $thumbnail_image = $thumbnail['image'];
        $thumbnail_alignment = $thumbnail['alignment'];
        $image = get_sub_field('image');
        $caption = get_sub_field('caption');
      ?>
      <div class="constrained-height columns one-third-width children-reveal-child gallery-item">
        <img src="<?php echo $thumbnail_image; ?>" style="object-position: <?php echo $thumbnail_alignment; ?> center;" />
      </div>
      <div class="gallery-item-modal">
        <div class="gallery-modal-close">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg"/>
        </div>
        <div class="gallery-image" id="image" >
          <img src="<?php echo $image; ?>" />
        </div>
        <?php //if($caption): ?>
          <div class="gallery-caption">
            <div class="gallery-caption-inner">
              <?php echo $caption; ?>
              <button class="gallery-prev">Prev</button>
              <button class="gallery-next">Next</button>
            </div>
          </div>
        <?php //endif; ?>
      </div>
  <?php endwhile; ?>
  <?php endif; ?>

</div>
