<?php

/* Repeater multiple post field macros with link and title */

add_filter( 'jet-engine/listings/filters-list', function($cb){
$cb['post_link_by_ids'] = array(
'cb' => 'jet_get_pretty_post_link',
'args' => false,
);

return $cb;
}); // You need to use this macro: %post-field|post_link_by_ids%


?>