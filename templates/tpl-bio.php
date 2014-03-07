<?php /* Template Name: Bio */
 get_header(); ?>
 <?php if ( have_posts() ) { while ( have_posts() ) { the_post();
 	$speakerIMG = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

 <section id="bio" style="background-image:url(<?php echo $speakerIMG; ?>);">
 	<div class="container">
 		<div id="contentPrimary">
 			<div class="gutter">
	 			<?php the_content(); ?>
 			</div>
 		</div>
 	</div>
 </section>

 <?php } } ?>
<?php get_footer(); ?>