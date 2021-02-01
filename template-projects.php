<?php
/* Template Name: Projects Landing Page */
?>

<?php get_header(); ?>

<div id="content" class="projects container children-reveal">

<?php if( have_rows('project') ): ?>
  <?php while( have_rows('project') ): the_row(); ?>
    <?php
    $project_image = get_sub_field('project_image');
    $project_info = get_sub_field('project_info');
    $title = $project_info['title'];
    $sub_title = $project_info['sub_title'];
    $desc = $project_info['desc'];
    $image_width = $project_image['image_width'];
    $page_link = get_sub_field('page_link');
    $desktop_image = $project_image['image'];
    $mobile_image = '';
    if ($project_image['image_thumbnail']) {
        $mobile_image = $project_image['image_thumbnail'];
    }
    ?>
    <div class="project-section children-reveal-child" onclick="location.href='<?php the_permalink($page_link); ?>'">
      <div class="project-content">

        <?php if($desktop_image): ?>
          <div
              id="project-image"
              class="project-image test <?php if($desktop_image): echo 'thumb-'.$image_width; endif; ?>"
              data-desktop-url="<?php echo $desktop_image ?>"
              data-mobile-url="<?php echo $mobile_image ?>"
          >
              <img src="<?php echo get_template_directory_uri(); ?>/dist/images/image-placeholder.png" />
          </div>
        <?php endif; ?>

        <div class="project-info <?php if($desktop_image): echo 'thumb-'.$image_width; endif; ?>">
          <div class="project-info-info">

            <h2 class="project-info-title<?php if($sub_title): echo '-with-sub-title'; endif; ?>">
              <?php echo $title; ?>
            </h2>

            <?php if($sub_title): ?>
              <h5 class="project-info-sub-title">
                <?php echo $sub_title; ?>
              </h5>
            <?php endif; ?>
          </div>

          <?php if($desc && $image_width = 'sm'): ?>
            <div class="project-info-desc">
              <?php echo $desc; ?>
            </div>
          <?php endif; ?>

            <div class="link project-info-link">
      				<a href="<?php the_permalink($page_link) ?>">
      					<span>
      						More
                  <img class="arrow" src="<?php echo get_template_directory_uri(); ?>/dist/images/arrow.png"  />
      					</span>
      				</a>
      			</div>
        </div>

      </div>

    </div>
  <?php endwhile; ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>
