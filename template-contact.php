<?php
/* Template Name: Contact */

	$company = get_field('company');
	$contacts = get_field('contacts');
	$direct_email = get_field('direct_email');

?>

<?php get_header(); ?>

<div id="content" class="contact single-reveal">
	<div class="container">
		<div class="contact-container">
			<div class="company"><?php echo $company; ?></div>
			<?php echo $contacts; ?>
		</div>
		<div class="direct">
			<h4>Contact Christopher Allen Directly</h4>
			<a href="mailto:<?php echo $direct_email; ?>"><?php echo $direct_email; ?></div>
		</div>

</div>

<?php get_footer(); ?>
