<?php
/* Template Name: About */

	$headshot = get_field('headshot');
	$bio = get_field('bio');

?>

<?php get_header(); ?>

<div id="content" class="about">

	<!-- BIO -->
	<div class="container">
		<div class="two-column-width children-reveal">
      <div class="two-column-width-left sm children-reveal-child">
				<div class="about-headshot">
					<img src="<?php echo $headshot; ?>" />
				</div>
			</div>
			<div class="two-column-width-right lg children-reveal-child">
				<div class="about-bio children-reveal-child">
					<!-- <h2>Biography</h2> -->
					<?php echo $bio; ?>
				</div>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>
