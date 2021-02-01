<?php get_header(); ?>
	<main id="content" class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article>
			<div class="entry-content">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
				<?php the_content(); ?>
				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</div>
		</article>
	<?php if ( comments_open() && ! post_password_required() ) { comments_template( '', true ); } ?>
	<?php endwhile; endif; ?>
	</main>
<?php get_footer(); ?>
