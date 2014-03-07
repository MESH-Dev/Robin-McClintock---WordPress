<?php /* Template Name: CV */
	get_header();
	if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

	<section id="cv">
		<div class="container">
			<div class="gutter cf">
				<div id="contentPrimary">
					<?php the_content(); ?>
				</div>
				<div id="contentSecondary">
					<?php the_field('right_column'); ?>
				</div>
			</div>
		</div>
	</section>

	<?php } } ?>
<?php get_footer(); ?>