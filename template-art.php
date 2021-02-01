<?php
/* Template Name: Art Gallery */
?>

<?php get_header(); ?>

<div id="content" class="container">

	<div class="container">

		<div class="gallery-header">
			<div class="gallery-title">
				<h2>ART</h2>
			</div>
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
		</div>

		<div class="art-gallery">


			<?php if( have_rows('art_gallery') ): ?>
				<?php while( have_rows('art_gallery') ): the_row(); ?>

						<?php if( get_row_layout() == 'full_width' ): ?>
							<div class="children-reveal">
								<?php get_template_part('components/page-components/art-gallery-item'); ?>
							</div>


						<?php elseif( get_row_layout() == 'two_column' ): ?>
							<?php $column_style = get_sub_field('column_style');
							if ($column_style == 'one-two'):
								$col_1 = 'one-third-width';
								$col_2 = 'two-thirds-width';
							elseif($column_style == 'one-one'):
								$col_1 = 'one-half-width';
								$col_2 = 'one-half-width';
							elseif($column_style == 'two-one'):
								$col_1 = 'two-thirds-width';
								$col_2 = 'one-third-width';
							endif;
							?>
							<!-- COL 1 -->
							<?php if( have_rows('column_1') ): ?>
								<div class="columns <?php echo $col_1; ?> children-reveal">
								<?php while( have_rows('column_1') ): the_row(); ?>
									<?php get_template_part('components/page-components/art-gallery-item'); ?>
								<?php endwhile; ?>
							 </div>
							<?php endif; ?>
							<!-- COL 2 -->
							<?php if( have_rows('column_2') ): ?>
								<div class="columns <?php echo $col_2; ?> children-reveal">
								<?php while( have_rows('column_2') ): the_row(); ?>
									<?php get_template_part('components/page-components/art-gallery-item'); ?>
								<?php endwhile; ?>
							 </div>
							<?php endif; ?>


						<?php elseif( get_row_layout() == 'three_column' ): ?>
							<!-- COL 1 -->
							<?php if( have_rows('column_1') ): ?>
								<div class="columns one-third-width children-reveal">
								<?php while( have_rows('column_1') ): the_row(); ?>
									<?php get_template_part('components/page-components/art-gallery-item'); ?>
								<?php endwhile; ?>
							 </div>
							<?php endif; ?>
							<!-- COL 2 -->
							<?php if( have_rows('column_2') ): ?>
								<div class="columns one-third-width children-reveal">
								<?php while( have_rows('column_2') ): the_row(); ?>
									<?php get_template_part('components/page-components/art-gallery-item'); ?>
								<?php endwhile; ?>
							 </div>
							<?php endif; ?>
							<!-- COL 3 -->
							<?php if( have_rows('column_3') ): ?>
								<div class="columns one-third-width children-reveal">
								<?php while( have_rows('column_3') ): the_row(); ?>
									<?php get_template_part('components/page-components/art-gallery-item'); ?>
								<?php endwhile; ?>
							 </div>
							<?php endif; ?>

						<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>

  	</div>
	</div>
</div>

<?php get_footer(); ?>
