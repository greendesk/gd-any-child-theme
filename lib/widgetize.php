<?php

/**
 * GD_Any_Child_Theme
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package GD_Any_Child_Theme\WidgetAreas
 * @author  Przemek Cichon <przemek@greendesk.pl>
 * @license GPL-2.0+
 * @link    https://bitbucket.org/greendesk/gd-any-child-theme
 */

/**
 * Expedites the widget area registration process by taking common things, before / after_widget, before / after_title,
 * and doing them automatically.
 *
 * See the WP function `register_sidebar()` for the list of supports $args keys.
 *
 * A typical usage is:
 *
 * ~~~
 * any_child_theme_register_sidebar(
 *     array(
 *         'id'          => 'my-sidebar',
 *         'name'        => __( 'My Sidebar', 'my-theme-text-domain' ),
 *         'description' => __( 'A description of the intended purpose or location', 'my-theme-text-domain' ),
 *     )
 * );
 * ~~~
 *
 * @since 0.1.1
 *
 * @param string|array $args Name, ID, description and other widget area arguments.
 *
 * @return string The sidebar ID that was added.
 */
function any_child_theme_register_sidebar( $args ) {

	$defaults = array(
		'before_widget' => '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
	);

	/**
	 * A filter on the default parameters used by `any_child_theme_register_sidebar()`.
	 *
	 * @since 0.1.0
	 */
	$defaults = apply_filters( 'any_child_theme_register_sidebar_defaults', $defaults, $args );

	$args = wp_parse_args( $args, $defaults );

	return register_sidebar( $args );
}