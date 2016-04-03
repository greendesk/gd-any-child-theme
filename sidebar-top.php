<?php 

if( is_active_sidebar( 'topbar' ) ) {
    //* Output primary sidebar structure
    echo '<aside class="">';

    do_action( 'any_child_theme_before_sidebar_top_widget_area' );
    do_action( 'any_child_theme_sidebar_top' );
    do_action( 'any_child_theme_after_sidebar_top_widget_area' );

    echo '</aside>';
}
    
