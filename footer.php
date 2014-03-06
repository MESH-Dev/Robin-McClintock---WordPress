<footer>
	<div class="container">
		<div class="gutter">
			<?php
			$defaults = array(
				'theme_location'  => 'main-nav',
				'menu'            => 'main-nav',
				'container'       => 'nav',
				'container_class' => 'menu',
				'container_id'    => 'mainNav',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu( $defaults ); ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>