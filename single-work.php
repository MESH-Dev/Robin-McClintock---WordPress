<?php get_header();
	if ( have_posts() ) { while ( have_posts() ) { the_post();
	$next = get_next_post();
	$prev = get_previous_post();

	//Get new $next and $prev if those posts aren't available
	if($next == ''){
		$firstID = $wpdb->get_results("SELECT id
									   FROM wp_posts
									   WHERE `post_status` = 'publish'
									   AND `post_type` = 'work'
									   ORDER BY `post_date` ASC
									   LIMIT 1");
		$next = get_post($firstID[0]->id);
	}
	if($prev == ''){
		$firstID = $wpdb->get_results("SELECT id
									   FROM wp_posts
									   WHERE `post_status` = 'publish'
									   AND `post_type` = 'work'
									   ORDER BY `post_date` DESC
									   LIMIT 1");
		$prev = get_post($firstID[0]->id);
	}
?>

<section id="work-single">
	<div id="work-resp">
		<div id="work-slides">

		<div id="work-prev" data-id="<?php echo $prev->ID; ?>" data-link="<?php echo get_permalink($prev->ID); ?>">
			<div class="work-single-image">
				<?php echo get_the_post_thumbnail($prev->ID, 'full'); ?>
				<div class="work-single-info">
					<span class="work-single-title"><?php echo $prev->post_title; ?></span>
					<span class="work-single-meta">
						<p><?php echo get_post_meta($prev->ID, 'year', true); ?></p>
						<p><?php echo get_post_meta($prev->ID, 'medium', true); ?></p>
						<p><?php echo get_post_meta($prev->ID, 'dimensions', true); ?></p>
					</span>
				</div>
			</div>
		</div>
		<div id="work-curr" data-id="<?php echo get_the_id(); ?>" data-link="<?php the_permalink(); ?>">
			<div class="work-single-image">
				<?php the_post_thumbnail('full'); ?>
				<div class="work-single-info">
					<span class="work-single-title"><?php the_title(); ?></span>
					<span class="work-single-meta">
						<p><?php echo get_post_meta(get_the_id(), 'year', true); ?></p>
						<p><?php echo get_post_meta(get_the_id(), 'medium', true); ?></p>
						<p><?php echo get_post_meta(get_the_id(), 'dimensions', true); ?></p>
					</span>
				</div>
			</div>
		</div>
		<div id="work-next" data-id="<?php echo $next->ID; ?>" data-link="<?php echo get_permalink($next->ID); ?>">
			<div class="work-single-image">
				<?php echo get_the_post_thumbnail($next->ID, 'full'); ?>
				<div class="work-single-info">
					<span class="work-single-title"><?php echo $next->post_title; ?></span>
					<span class="work-single-meta">
						<p><?php echo get_post_meta($next->ID, 'year', true); ?></p>
						<p><?php echo get_post_meta($next->ID, 'medium', true); ?></p>
						<p><?php echo get_post_meta($next->ID, 'dimensions', true); ?></p>
					</span>
				</div>
			</div>
		</div>

	</div>
	</div>
	<div class="container">
		<div class="prev-arrow"></div>
		<div class="next-arrow"></div>
	</div>
</section>

<?php } } get_footer(); ?>