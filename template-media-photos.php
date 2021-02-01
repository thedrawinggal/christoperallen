<?php
/* Template Name: Media - Photos */


?>

<?php get_header(); ?>

<div id="content" class="media container">

	<!-- SUBNAV -->
	<div class="media-nav">
		<?php wp_nav_menu( array( 'theme_location' => 'media-menu' ) ); ?>
	</div>

	<!-- PHOTOS -->
	<div class="media-content">
		<?php get_template_part('components/common-components/gallery'); ?>
	</div>

</div>

<?php get_footer(); ?>
