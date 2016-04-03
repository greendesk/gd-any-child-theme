<?php
/**
 * GD_Any_Child_Theme\Assets
 * 
 * This file lets you unregister existing sidebars and register new ones.
 *
 * @package      GD_Any_Child_Theme
 * @subpackage   GD_Any_Child_Theme\Assets
 * @since        0.1.0
 * @link         https://bitbucket.org/greendesk/gd-any-child-theme
 * @author       Przemek Cichon <przemek@greendesk.pl>
 * @copyright    Copyright (c) 2016, Greendesk
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Sets defaults and enqueue styles
 *
 * @since 0.1.0
 *
 * @param array $args Existing attributes.
 * @uses wp_enqueue_style()
 *
 */
function any_child_theme_enqueue_style( $args ) {
    
    $defaults = array(
        'handle' => '',
        'src' => CHILD_CSS_URL . $args['handle'] . '.css',
        'deps' => '',
        'ver' => CHILD_THEME_VERSION
    );
    
    $args = wp_parse_args( $args, $defaults );
    wp_enqueue_style( $args['handle'], $args['src'], $args['deps'], $args['ver'] );
    
    if ( is_admin_bar_showing() && $args['handle'] == 'style' && !empty( any_child_theme_inline_css() ) ) :
        wp_add_inline_style( $args['handle'], $this->inline_css() );
    endif;
    
}

/**
 * Sets defaults and enqueue scripts
 *
 * @since 0.1.0
 *
 * @param array $args Existing attributes.
 * @uses wp_enqueue_script()
 *
 */
function any_child_theme_enqueue_script( $args ) {
    
    $defaults = array(
        'handle' => '',
        'src' => CHILD_JS_URL . $args['handle'] . '.js',
        'deps' => 'jQuery',
        'ver' => CHILD_THEME_VERSION,
        'in_footer' => true
    );
    
    $args = wp_parse_args( $args, $defaults );
    wp_enqueue_script( $args['handle'], $args['src'], $args['deps'], $args['ver'], $args['in_footer'] );
    
}

/**
 * Enqueue inline css
 *
 * @since 0.1.0
 */
function any_child_theme_inline_css(){
    
    return;
    
}

add_action( 'wp_enqueue_scripts', 'any_child_theme_stylesheets' );
/**
 * Enqueue stylesheets
 *
 * @since 0.1.0
 * @uses any_child_theme_enqueue_style()
 */
function any_child_theme_stylesheets(){
    
    // Enqueue parent theme stylesheet
    any_child_theme_enqueue_style( array( 'handle' => PARENT_THEME_NAME, 'src' => get_template_directory_uri() . '/style.css' ) );
    // Enqueue child theme stylesheet
    any_child_theme_enqueue_style( array( 'handle' => CHILD_THEME_NAME, 'src' => get_stylesheet_uri() ) );

    // Add file names without css extension from assets/css/ directory
    $stylesheets = array( 'style' );

    // Loop through the $stylesheets array and enqueue stylesheets
    foreach ( $stylesheets as $stylesheet ) {
        any_child_theme_enqueue_style( array( 'handle' => $stylesheet ) );
    }  
    
}

add_action( 'wp_enqueue_scripts', 'any_child_theme_scripts' );
/**
 * Enqueue scripts
 *
 * @since 0.1.0
 * @uses any_child_theme_enqueue_script()
 */
function any_child_theme_scripts(){

    // Add file names without css extension from assets/js/ directory
    $scripts = array();
    
    if ( ! empty( $scripts ) ) {
        foreach ( $scripts as $script ) {
            any_child_theme_enqueue_script( array( 'handle' => $script ) );
        } 
    }
    
}

