<?php
// ------------- For Single Post Type -------------- 
// Replace additional-props with your CPT slug
DEFINE( 'BOOKING_ADDITIONAL_CPT', 'additional-props' );

add_filter( 'jet-booking/settings/get/apartment_post_type', function ( $post_type ) {
	if ( is_admin() ) {
		if ( ! empty( $_GET['post_type'] ) && BOOKING_ADDITIONAL_CPT === $_GET['post_type'] ) {
			$post_type = BOOKING_ADDITIONAL_CPT;
		}
		
		if ( ! empty( $_GET['post'] ) && BOOKING_ADDITIONAL_CPT === get_post_type( $_GET['post'] ) ) {
			$post_type = BOOKING_ADDITIONAL_CPT;
		}
	}
	return $post_type;
} );

add_filter( 'jet-booking/tools/post-type-args', function( $args ) {
	$args['post_type'] = [ $args['post_type'], BOOKING_ADDITIONAL_CPT ];
	return $args;
} );





// ------------- Fpr Multiple Post Type -------------------
// Replace additional-props with your CPT slugs
DEFINE( 'BOOKING_ADDITIONAL_CPTS', [ 'additional-props', 'additional-props'] );

add_filter( 'jet-booking/settings/get/apartment_post_type', function ( $post_type ) {
	if ( is_admin() ) {
		if ( ! empty( $_GET['post_type'] ) && in_array( $_GET['post_type'], BOOKING_ADDITIONAL_CPTS ) ) {
			$post_type = $_GET['post_type'];
		}
		
		if ( ! empty( $_GET['post'] ) && in_array( get_post_type( $_GET['post'] ), BOOKING_ADDITIONAL_CPTS ) ) {
			$post_type = get_post_type( $_GET['post'] );
		}
	}
	return $post_type;
} );

add_filter( 'jet-booking/tools/post-type-args', function( $args ) {
	$args['post_type'] = BOOKING_ADDITIONAL_CPTS;
	return $args;
} );