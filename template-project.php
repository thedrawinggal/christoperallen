<?php
/* Template Name: Project */
?>

<?php get_header(); ?>

<?php
$project = get_field('project');
$project_tite = $project['title'];
$project_sub_title = $project['sub_title'];
$project_image = $project['image'];
$project_links = $project['links'];
$project_link = $project_links['link'];
?>

<div id="content" class="project">

	<div class="container">
		<div class="project-link">
			<div class="link">
				<a href="<?php echo get_template_directory_uri(); ?>/projects">
					<span>
						<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/dist/images/arrow-reverse.png"  />
						Projects
					</span>
				</a>
			</div>
		</div>
		<div class="two-column-width children-reveal">
			<div class="two-column-width-left children-reveal-child">
				<h2 class="project-title">
					<?php echo $project_tite; ?>
				</h2>
				<h5 class="project-sub-title">
					<?php echo $project_sub_title; ?>
				</h5>
				<?php if( $project_image ): ?>
					<div class="project-image">
						<img src="<?php echo $project_image; ?>" />
					</div>
				<?php endif; ?>
				<div class="project-links">
					<?php if( have_rows('project') ): ?>
						<?php while( have_rows('project') ): the_row(); ?>
							<?php if( have_rows('links') ): ?>
								<?php while( have_rows('links') ): the_row(); ?>
									<?php $link	= get_sub_field('link'); ?>
									<div class="link">
										<a href="<?php echo $link[url]; ?>">
											<span>
												<?php echo $link[title]; ?>
												<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/dist/images/arrow.png"  />
											</span>
										</a>

									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="two-column-width-right children-reveal-child">
				<div class="project-content">
					<?php if( have_rows('content') ): ?>
				    <?php while( have_rows('content') ): the_row(); ?>

								<?php if( get_row_layout() == 'text' ): ?>
				            <?php echo get_sub_field('text'); ?>

								<?php elseif( get_row_layout() == 'video' ): ?>
				            <div class="video-embed">
											<?php echo get_sub_field('video'); ?>
										</div>

				        <?php endif; ?>
				    <?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

</div>


<?php get_footer(); ?>
