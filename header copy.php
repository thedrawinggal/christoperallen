<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		 <script type="text/javascript">
			var getTemplateDirectoryURI = "<?php echo get_template_directory_uri(); ?>";
		</script>
		<script src="<?php echo get_template_directory_uri() ?>/dist/js/bundle.js" type="module"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="wrapper" class="hfeed">

			<?php get_template_part('components/base-components/navigation'); ?>

			<div id="body">
