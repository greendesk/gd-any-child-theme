<?php
/**
 * GD_Any_Child_Theme\SidebarsRegistration
 * 
 * This file lets you unregister existing sidebars and register new ones.
 *
 * @package      GD_Any_Child_Theme
 * @since        0.1.0
 * @link         https://bitbucket.org/greendesk/gd-any-child-theme
 * @author       Przemek Cichon <przemek@greendesk.pl>
 * @copyright    Copyright (c) 2016, Greendesk
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

add_action( 'widgets_init', 'any_child_theme_unregister_sidebars', 11 );
/**
 * Unregister existing sidebars.
 *
 * @since 0.1.0
 * @uses unregister_sidebar()
 */
function any_child_theme_unregister_sidebars(){

	// Unregister some of the TwentyTen sidebars
	//unregister_sidebar( 'some-sidebar' );

}

add_action( 'widgets_init', 'any_child_theme_register_sidebars' );
/**
 * Register new sidebars.
 *
 * @since 0.1.0
 * @uses any_child_theme_register_sidebar()
 */
function any_child_theme_register_sidebars(){
    
    //any_child_theme_register_sidebar( array( 'name' => 'Top Bar', 'id' => 'topbar' ) );
    
}

add_action( 'any_child_theme_sidebar_top', 'any_child_theme_do_sidebar_top' );
/**
 * Display sidebar if widget is put into the sidebar.
 *
 * @since 0.1.0
 * @uses dynamic_sidebar()
 */
function any_child_theme_do_sidebar_top(){

    dynamic_sidebar( 'topbar' );
    
}