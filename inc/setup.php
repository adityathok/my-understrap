<?php

/**
 * Theme basic setup
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Set the content width based on the theme's design and stylesheet.
if (!isset($content_width)) {
	$content_width = 640; /* pixels */
}

add_action('after_setup_theme', 'wpzaro_setup');

if (!function_exists('wpzaro_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpzaro_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpzaro, use a find and replace
		 * to change 'wpzaro' to the name of your theme in all the template files
		 */
		load_theme_textdomain('wpzaro', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' 	=> __('Primary Menu', 'wpzaro'),
				'secondary' => __('Secondary Menu', 'wpzaro'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support('post-thumbnails');

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support('customize-selective-refresh-widgets');

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress Theme logo feature.
		add_theme_support('custom-logo');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Check and setup theme default settings.
		wpzaro_setup_theme_default_settings();

		/// use classic widget
		if (wpzaro_theme_setting('wpzaro_widget_classic')) {
			remove_theme_support('widgets-block-editor');
		}
	}
}

add_action('after_setup_theme', 'wpzaro_beaver_builder_support');

if (!function_exists('wpzaro_beaver_builder_support')) {
	/**
	 * Add Themer support to theme
	 */
	function wpzaro_beaver_builder_support()
	{
		add_theme_support('fl-theme-builder-headers');
		add_theme_support('fl-theme-builder-footers');
	}
}
