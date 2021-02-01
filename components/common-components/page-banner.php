<?php
$display_banner = get_field('display_banner');
?>
<?php if( $display_banner ): ?>


<?php if( have_rows('banner') ): ?>
  <?php while ( have_rows('banner') ) : the_row();?>
    <!-- BANNER  -->
    <div class="banner-bg fade-reveal">

    <?php
        $banner_media_type = get_sub_field('banner_media_type');
        $banner_link_type = get_sub_field('cta_type');
        $banner_link_label = get_sub_field('cta_label');
        $banner_cta_button = get_sub_field('cta_button');
        if( $banner_cta_button ):
            $banner_cta_url = $banner_cta_button['url'];
            $banner_cta_title = $banner_cta_button['title'];
            $banner_cta_target = $banner_cta_button['target'] ? $banner_cta_button['target'] : '_self';
        endif;
    ?>

    <?php if ($banner_media_type['value'] == 'image'): ?>
        <?php if( have_rows('banner_image') ): ?>
            <?php while( have_rows('banner_image') ): the_row(); ?>
                <?php
                    $desktop_image = get_sub_field('desktop_image');
                    $desktop_url = $desktop_image['url'];
                    $mobile_url = '';
                    if (get_sub_field('mobile_image')) {
                        $mobile_image = get_sub_field('mobile_image');
                        $mobile_url = $mobile_image['url'];
                    }
                ?>
                  <div
                      id="page-banner"
                      class="page-banner image parallax"
                      data-desktop-url="<?php echo $desktop_url ?>"
                      data-mobile-url="<?php echo $mobile_url ?>"
                      data-parallax="scroll"
                      data-image-src="<?php echo get_template_directory_uri(); ?>/dist/images/image-placeholder.png"
                  >
                      <div class="page-banner-content">
                        <?php if( $banner_link_type == 'standard' ): ?>
                          <?php if( $banner_cta_button ): ?>
                            <a href="<?php echo $banner_cta_url ?>" target="<?php echo $banner_cta_target ?>">
                              <button><?php echo $banner_cta_title ?></button>
                            </a>
                          <?php endif; ?>
                        <?php elseif( $banner_link_type == 'modal' ): ?>
                          <?php if( $banner_link_label ): ?>
                            <button class="modal-trigger"><?php echo $banner_link_label ?></button>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>
                  </div>


            <?php endwhile; ?>
        <?php endif; ?>

    <?php elseif ($banner_media_type['value'] == 'map'): ?>
        <?php $map = get_sub_field('map');
          if( $map ): ?>
            <div class="page-banner map">
              <div class="acf-map coal" data-zoom="16">
                  <div class="marker" data-lat="<?php echo esc_attr($map['lat']); ?>" data-lng="<?php echo esc_attr($map['lng']); ?>"></div>
              </div>
              <div class="page-banner-content">
                <div class="button">
                  <?php if( $banner_link_type == 'standard' ): ?>
                    <?php if( $banner_cta_button ): ?>
                      <a href="<?php echo $banner_cta_url ?>" target="<?php echo $banner_cta_target ?>">
                        <button><?php echo $banner_cta_title ?></button>
                      </a>
                    <?php endif; ?>
                  <?php elseif( $banner_link_type == 'modal' ): ?>
                    <?php if( $banner_link_label ): ?>
                      <button class="modal-trigger"><?php echo $banner_link_label ?></button>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

    <?php elseif ($banner_media_type['value'] == 'video'): ?>
        <?php if( have_rows('banner_video') ): ?>
            <?php while( have_rows('banner_video') ): the_row();
                $video_type = get_sub_field('video_type');
            ?>
                <?php if ($video_type['value'] == 'embed'): ?>
                  <div class="page-banner video-embed">
                    <?php echo get_sub_field('embed') ?>
                    <div class="page-banner-content">
                      <div class="button">
                        <?php if( $banner_link_type == 'standard' ): ?>
                          <?php if( $banner_cta_button ): ?>
                            <a href="<?php echo $banner_cta_url ?>" target="<?php echo $banner_cta_target ?>">
                              <button><?php echo $banner_cta_title ?></button>
                            </a>
                          <?php endif; ?>
                        <?php elseif( $banner_link_type == 'modal' ): ?>
                          <?php if( $banner_link_label ): ?>
                            <button class="modal-trigger"><?php echo $banner_link_label ?></button>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>

                <?php elseif ($video_type['value'] == 'autoplay'): ?>

                  <div class="page-banner video-autoplay">
                    <video class="js-autoplay-video" muted playsinline>
                        <source src="<?php echo esc_url(get_sub_field('autoplay')) ?>">
                        Sorry, your browser doesn't support embedded videos.
                    </video>
                    <div class="page-banner-content">
                      <div class="button">
                        <?php if( $banner_link_type == 'standard' ): ?>
                          <?php if( $banner_cta_button ): ?>
                            <a href="<?php echo $banner_cta_url ?>" target="<?php echo $banner_cta_target ?>">
                              <button><?php echo $banner_cta_title ?></button>
                            </a>
                          <?php endif; ?>
                        <?php elseif( $banner_link_type == 'modal' ): ?>
                          <?php if( $banner_link_label ): ?>
                            <button class="modal-trigger"><?php echo $banner_link_label ?></button>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

      <?php else: ?>


    <?php endif; ?>
		<div class="banner-accent"></div>
  </div>
<?php endwhile; ?>
<?php endif; ?>


<?php endif; ?>
