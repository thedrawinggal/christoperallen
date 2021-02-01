<?php
/* Template Name: Media - Videos */


?>

<?php get_header(); ?>

<div id="content" class="media container">

	<!-- SUBNAV -->
	<div class="media-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'media-menu' ) ); ?>
	</div>

	<!-- VIDEOS -->
	<div class="container">

		<?php if( have_rows('videos') ): ?>
			<?php while( have_rows('videos') ): the_row(); ?>
				<div class="media-videos two-column-width children-reveal">

				<div class="two-column-width-left lg children-reveal-child">
					<div class="video-embed">
						<?php
							// Load value.
							$iframe = get_sub_field('video');

							// // Use preg_match to find iframe src.
							// preg_match('/src="(.+?)"/', $iframe, $matches);
							// $src = $matches[1];
							//
							// // Add extra parameters to src and replcae HTML.
							// $params = array(
							//     'controls'  				=> 1,
							//     'hd'        				=> 1,
							// 		'rel'								=> 0,
							// 		'modestbranding'		=> 1,
							//     'autohide' 					=> 1
							// );
							// $new_src = add_query_arg($params, $src);
							// $iframe = str_replace($src, $new_src, $iframe);
							//
							// // Add extra attributes to iframe HTML.
							// $attributes = 'frameborder="0"';
							// $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
							//
							// // Display customized HTML.
							echo $iframe;
							?>
					</div>
				</div>
				<div class="two-column-width-left sm children-reveal-child">
					<?php if( have_rows('video_info') ): ?>
						<?php while( have_rows('video_info') ): the_row(); ?>
							<?php
								$title = get_sub_field('title');
								$company = get_sub_field('company');
								$date = get_sub_field('date');
								$desc = get_sub_field('desc');
							?>
							<h2 class="title"><?php echo $title ?></h2>
							<h4 class="company"><?php echo $company ?></h4>
							<h4 class="date"><?php echo $date ?></h4>
							<div class="desc"><?php echo $desc ?></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>

			</div>
		<?php endwhile; ?>
		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>
