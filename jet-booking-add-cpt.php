<?php
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