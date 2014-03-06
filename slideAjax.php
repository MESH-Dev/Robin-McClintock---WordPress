<?php
	//get includes
	require_once('../../../wp-load.php');

	//POST variables
	$action = $_POST['action'];
	$nextID = $_POST['nextID'];
	$curID  = $_POST['curID'];
	$prevID = $_POST['prevID'];


	//Functions
	function next_slide($nextID){
		//globals
		global $post;
		global $wpdb;
        $post = get_post($nextID);
		$nextP = get_next_post();

		//is this is the last post; If so, get the first post instead of an empty string
		if($nextP == ''){
			$firstID = $wpdb->get_results("SELECT id
										   FROM wp_posts
										   WHERE `post_status` = 'publish'
										   AND `post_type` = 'work'
										   ORDER BY `post_date` ASC
										   LIMIT 1");
			$nextP = get_post($firstID[0]->id);
		}

		//get render vars
		$nextPImg = get_the_post_thumbnail($nextP->ID, 'full');
		$nextPID = $nextP->ID;
		$nextTitle = $nextP->post_title;
		$nextYear = get_post_meta($nextP->ID, 'year', true);
		$nextMedium = get_post_meta($nextP->ID, 'medium', true);
		$nextDimensions = get_post_meta($nextP->ID, 'dimensions', true);
		$nextLink = get_permalink($nextP->ID);

		//create output
		$output .= "<div id='work-next' data-id='$nextPID' data-link='$nextLink'>
						<div class='work-single-image'>
							$nextPImg
							<div class='work-single-info'>
								<span class='work-single-title'>$nextTitle</span>
								<span class='work-single-meta'>
									<p>$nextYear</p>
									<p>$nextMedium</p>
									<p>$nextDimensions</p>
								</span>
							</div>
						</div>
					</div>";

		return $output;
	}
	function prev_slide($prevID){
		//globals
		global $post;
		global $wpdb;
        $post = get_post($prevID);
		$prevP = get_previous_post();

		//is this is the last post; If so, get the first post instead of an empty string
		if($prevP == ''){
			$firstID = $wpdb->get_results("SELECT id
										   FROM wp_posts
										   WHERE `post_status` = 'publish'
										   AND `post_type` = 'work'
										   ORDER BY `post_date` DESC
										   LIMIT 1");
			$prevP = get_post($firstID[0]->id);
		}

		//get render vars
		$prevPImg = get_the_post_thumbnail($prevP->ID, 'full');
		$prevPID = $prevP->ID;
		$prevTitle = $prevP->post_title;
		$prevYear = get_post_meta($prevP->ID, 'year', true);
		$prevMedium = get_post_meta($prevP->ID, 'medium', true);
		$prevDimensions = get_post_meta($prevP->ID, 'dimensions', true);
		$prevLink = get_permalink($prevP->ID);

		//create output
		$output .= "<div id='work-prev' data-id='$prevPID' data-link='$prevLink'>
						<div class='work-single-image'>
							$prevPImg
							<div class='work-single-info'>
								<span class='work-single-title'>$prevTitle</span>
								<span class='work-single-meta'>
									<p>$prevYear</p>
									<p>$prevMedium</p>
									<p>$prevDimensions</p>
								</span>
							</div>
						</div>
					</div>";

		return $output;
	}

	if($action == 'next-slide'){
		echo next_slide($nextID);
	}elseif($action == 'prev-slide'){
		echo prev_slide($prevID);
	}else{
		echo "invalid action request";
	}
?>