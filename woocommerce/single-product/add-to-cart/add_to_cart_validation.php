<?php
/**
 * Validate our custom text input field value
 */
function plugin_republic_add_to_cart_validation( $passed, $product_id, $quantity, $variation_id=null ) {
 if( empty( $_POST['pr-field'] ) ) {
 $passed = false;
 wc_add_notice( __( 'Your name is a required field.', 'plugin-republic' ), 'error' );
 }
 return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'plugin_republic_add_to_cart_validation', 10, 4 );
