<?php
/**
 * Disable the gravatars
 */
add_filter( 'avatar_defaults', '__return_empty_array' );
add_filter( 'default_avatar_select', '__return_empty_string' );