<?php
/* Template Name: Media - Acclaim */


?>

<?php get_header(); ?>

<div id="content" class="media container">

	<!-- SUBNAV -->
	<div class="media-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'media-menu' ) ); ?>
	</div>

	<!-- VIDEOS -->
	<div class="media-content">

		<?php if( have_rows('acclaim') ): ?>
			<?php while( have_rows('acclaim') ): the_row(); ?>
				<?php
					$show = get_sub_field('show');
					$company = get_sub_field('company');
					$date = get_sub_field('date');
					$quote = get_sub_field('quote');
					$author = get_sub_field('author');
					$publication = get_sub_field('publication');
				?>
				<div class="media-acclaim single-reveal">
					<h5 class="company">
						<span><?php echo $company ?></span>
					</h5>
					<?php if($show): ?>
						<h2 class="show"><?php echo $show ?></h2>
					<?php endif; ?>
					<?php if($date): ?>
						<p class="date"><?php echo $date ?></p>
					<?php endif; ?>
					<div class="quote"><?php echo $quote ?></div>
					<?php if($author || $publication): ?>
					<h5 class="publication">- <?php if($author): echo $author.','; endif; ?> <?php echo $publication ?></h5>
					<?php endif; ?>

					<?php if( have_rows('links') ): ?>
						<?php while( have_rows('links') ): the_row(); ?>
							<?php $link	= get_sub_field('link'); ?>
							<div class="link event-link">
    						<a href="<?php echo $link[url]; ?>" target="<?php echo $link[target]; ?>">
									<span>
										<?php echo $link[title]; ?>
										<img class="arrow" src="<?php echo get_template_directory_uri(); ?>/dist/images/arrow.png"  />
	      					</span>
								</a>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
		<?php endwhile; ?>
		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>
