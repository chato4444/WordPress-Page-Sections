<?php
add_filter( 'acf/fields/flexible_content/layout_title', 'swingu_acf_layout_title', 10, 4 );
/**
 * Add Section Name to layout title
 */
function swingu_acf_layout_title( $title, $field, $layout, $i ) {
	// load text sub field
	if ( ! get_sub_field( 'section_name' ) ) {
		return $title;
	}

	$title = "<b>" . get_sub_field( 'section_name' ) . "</b> [$title]";

	return $title;
}