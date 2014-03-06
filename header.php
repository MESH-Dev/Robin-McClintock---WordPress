<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php if(is_home() || is_front_page()){ bloginfo('name'); ?> | <?php bloginfo('description'); }else{ wp_title(''); ?> | <?php bloginfo('name'); } ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/assets/img/favicon.ico">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
	<div class="container">
		<div class="gutter">
			<div id="logo">
				<a href="<?php echo site_url(); ?>">
					<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
				</a>
			</div>
		</div>
	</div>
</header>