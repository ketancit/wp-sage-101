<?php

if (!function_exists('wp_sage_101_get_page_layout')) {
	/**
	 * Retrieves the page layout for the given post or page being loader
	 *
	 * @return string $layout 	layout of the page for positioning the sidebar
	 *
	 * @author Ketan Vyawahare <ketanv@conscienceit.com>
	 *
	 * @since 1.0.0
	 */
	function wp_sage_101_get_page_layout()
	{
		$layout = '';
		if ( is_singular() ) {
			global $post;
			// If post meta value is empty,
			// Then get the POST_TYPE sidebar.
			$layout = get_post_meta($post->ID, 'site-sidebar-layout', true);
			if (empty($layout)) {
				$layout = 'default';
			}
		}

		return $layout;
	}
}

if (!function_exists('wp_sage_101_body_class')) {
	function wp_sage_101_body_class()
	{
		$class = array();

		$layout = wp_sage_101_get_page_layout();

		if ('left-sidebar' == wp_sage_101_get_page_layout() || 'right-sidebar' == wp_sage_101_get_page_layout()) {
			$class[] = 'col-md-8';
		} elseif ('no-sidebar' == $layout) {
			$class[] = 'full-width';
		}

		array_unique($class);

		return _e(implode(' ', $class));
	}
}