<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="checkout-review-shipping-table mb-5">

	
	<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
	
		<?php wc_cart_totals_shipping_html(); ?>

	<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

	
</div>