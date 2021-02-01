<?php
/* Template Name: Calendar */

	$headshot = get_field('headshot');
	$bio = get_field('bio');

?>

<?php get_header(); ?>

<div id="content" class="calendar">

	<!-- CALENDAR -->
	<div class="container">

		<?php if( have_rows('events') ): ?>
			<div class="events children-reveal">
					<?php while( have_rows('events') ): the_row(); ?>

						<?php if( have_rows('season') ): ?>
							<?php while( have_rows('season') ): the_row(); ?>
							<?php
									$season_title			= get_sub_field('season_title');
								?>
								<?php if($season_title): ?>
									<h3 class="season children-reveal-child">
										<span><?php echo $season_title; ?></span>
									</h3>
									<div class="divider"></div>
								<?php endif; ?>

								<?php if( have_rows('event') ): ?>
									<?php while( have_rows('event') ): the_row(); ?>
										<div class="event children-reveal-child">
										<?php
												$company			= get_sub_field('company');
												$event_title	= get_sub_field('event_title');
												$date					= get_sub_field('date');
												$desc					= get_sub_field('desc');
											?>
										<b><?php echo $company; ?></b>&nbsp;&nbsp;|&nbsp;&nbsp;<i><?php echo $event_title; ?></i>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $date; ?>

										<?php if($desc):?>
											<div class="event-desc">
												<?php echo $desc; ?>
											</div>
										<?php endif; ?>

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

										</div>
									<?php endwhile; ?>
								<?php endif; ?>

							<?php endwhile; ?>
						<?php endif; ?>

					<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>
