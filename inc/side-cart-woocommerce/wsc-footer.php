<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$subtotal_txt 		= 'Total';
$cart_txt 			= 'Carrito';
$chk_txt 			= 'Checkout';
$cont_txt 			= 'Seguir comprando';
//shop-sidebar-cart-shop-label, 
?>

<div class="wsc-footer main-font bg-main-light">

	<?php if(!WC()->cart->is_empty()): ?>

		<div class="wsc-footer-a">

		<div class="coupon w-100 justify-between mb3 items-center dn">
			<div>
				<input type="text" name="coupon_code" class="input-text pa2" id="coupon_code" value="" placeholder="Código de descuento" /> 
			</div>
			<button type="submit" class="button pa2" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
				<?php do_action( 'woocommerce_cart_coupon' ); ?>
		</div>

										


			<h6 class="wsc-subtotal">
				<span>Total (IVA incluido)</span> <?php echo wc_price(WC()->cart->subtotal); ?>			
			<!-- <?php // echo esc_html($subtotal_txt) ?> -->
			</h6>
		</div>
		


		<div class="wsc-footer-b">
			<?php $hide_btns = WC()->cart->is_empty() ? 'style="display: none;"' : '';?>

			<?php if(!empty($chk_txt)): ?>
				<a  href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button wsc-chkt btn" <?php echo esc_attr( $hide_btns ); ?>><?php echo esc_html($chk_txt); ?></a>
			<?php endif; ?>

			<?php if(!empty($cont_txt)): ?>
				<a  href="#" class="wsc-cont"><?php echo esc_html( $cont_txt ); ?></a>
			<?php endif; ?>
		</div>

		</div>
	<?php endif;?>

</div>
