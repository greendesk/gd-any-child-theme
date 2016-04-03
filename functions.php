<?php

/**
 * Functions
 *
 * @package      GD_Any_Child_Theme
 * @since        0.1.0
 * @link         https://bitbucket.org/greendesk/gd-any-child-theme
 * @author       Przemek Cichon <przemek@greendesk.pl>
 * @copyright    Copyright (c) 2016, Greendesk
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */

add_action( 'after_setup_theme', 'any_child_theme_setup' );
/**
 * GD_Any_Child_Theme Setup
 * @since 0.1.0
 *
 * This setup function attaches all of the site-wide functions 
 * to the correct hooks and filters. All the functions themselves
 * are defined below this setup function.
 *
 */
function any_child_theme_setup() {

	// Image Sizes
    //add_image_size( 'post-thumb', 725, 275, true );

    // Editor Styles
    add_editor_style( 'editor-style.css' );

    // Add post format support
    //add_theme_support( 'post-formats', array( 'video' ) );

    // Title-tag support
    add_theme_support( 'title-tag' );

    // Add excerpt support for pages
    //add_post_type_support( 'page', 'excerpt' );

}

add_action( 'after_setup_theme', 'any_child_theme_constants' );
/**
 * Defining GD_Any_Child_Theme constants.
 * @since 0.1.0
 *
 */
 function any_child_theme_constants(){
 	define( 'CHILD_THEME_NAME', 'any_child_theme' );
    define( 'CHILD_THEME_URL', 'http://www.greendesk.pl/gd-any-child-theme' );
    define( 'CHILD_THEME_VERSION', '0.1.0' );
    define( 'CHILD_ASSETS_URL', CHILD_URL . trailingslashit('/assets') );
    define( 'CHILD_CSS_URL', CHILD_ASSETS_URL . trailingslashit( 'css' ) );
    define( 'CHILD_FONTS_URL', CHILD_ASSETS_URL . trailingslashit( 'fonts' ) );
    define( 'CHILD_IMAGES_URL', CHILD_ASSETS_URL . trailingslashit( 'images' ) ) ;
    define( 'CHILD_JS_URL', CHILD_ASSETS_URL . trailingslashit( 'js' ) );

    define( 'CHILD_ASSETS_DIR', CHILD_DIR . trailingslashit('/assets') );
    define( 'CHILD_CSS_DIR', CHILD_ASSETS_DIR . trailingslashit( 'css' ) );
    define( 'CHILD_FONTS_DIR', CHILD_ASSETS_DIR . trailingslashit( 'fonts' ) );
    define( 'CHILD_IMAGES_DIR', CHILD_ASSETS_DIR . trailingslashit('images' ) ) ;
    define( 'CHILD_JS_DIR', CHILD_ASSETS_DIR . trailingslashit( 'js' ) );
    define( 'CHILD_LIB_DIR', CHILD_DIR . trailingslashit( '/lib' ) ); 
    define( 'CHILD_WIDGETS_DIR', CHILD_DIR . trailingslashit( '/widgets' ) );
 }

add_action( 'after_setup_theme', 'any_child_theme_i18n' );
/**
 * Load the GD_Any_Child_Theme textdomain for internationalization.
 *
 * @since 0.1.0
 *
 * @uses load_theme_textdomain()
 *
 */
function any_child_theme_i18n() {

        load_theme_textdomain( CHILD_THEME_NAME, get_stylesheet_directory_uri() . trailingslashit( '/languages' ) );

}

add_action( 'after_setup_theme', 'any_child_theme_loader' );
/**
 * This function loads GD_Any_Child_Theme
 *
 * @since 0.1.0
 *
 * @uses CHILD_LIB_DIR
 * @link https://gist.github.com/theandystratton/5924570
 */
function any_child_theme_loader() {

        foreach ( glob( CHILD_LIB_DIR . '/*.php' ) as $file ) { 
            
            include $file;
            
        }

}