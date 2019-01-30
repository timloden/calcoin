<?php
function prefix_conditional_body_class( $classes ) {
    
    if( is_single() && is_active_sidebar( 'sidebar-1' ) )
        $classes[] = 'two-column';
    return $classes;
}
add_filter( 'body_class', 'prefix_conditional_body_class' );