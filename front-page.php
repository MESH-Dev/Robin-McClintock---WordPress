<?php get_header(); ?>

<section id="works">
	<?php $args = array(
				'post_type' => 'work',
			);
		$query = new WP_Query($args);
		$postcount = $query->post_count;
		$posts = $query->get_posts();
			$col1Posts = array_slice($posts, 0, $postcount/2);
			$col2Posts = array_slice($posts, $postcount/2); ?>


		<div id="scrollableArea">

			<div class="work-row">
				<?php foreach($col1Posts as $post){
					setup_postdata($post);
					$post_id = get_the_id(); ?>
					<a href="<?php the_permalink(); ?>" class="work-link">
						<div class="work-entry">
							<div class="work-overlay">
								<div class="gutter">
									<h3><?php the_title(); ?></h3>
									<span class="work-year"><?php echo get_post_meta($post_id, 'year', true); ?></span>
								</div>
							</div>
							<div class="work-image">
								<?php the_post_thumbnail('large'); ?>
							</div>
						</div>
					</a>
				<?php }?>
			</div>

			<div class="work-row">
				<?php foreach($col2Posts as $post){
					setup_postdata($post);
					$post_id = get_the_id(); ?>
					<a href="<?php the_permalink(); ?>" class="work-link">
						<div class="work-entry">
							<div class="work-overlay">
								<div class="gutter">
									<h3><?php the_title(); ?></h3>
									<span class="work-year"><?php echo get_post_meta($post_id, 'year', true); ?></span>
								</div>
							</div>
							<div class="work-image">
								<?php the_post_thumbnail('large'); ?>
							</div>
						</div>
					</a>
				<?php }?>
			</div>


		</div>
</section>

<?php get_footer(); ?>