<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">
	<section header-color="black" bg-color="white" class="bg-main-light container mx-auto">

	<div class="flex justify-between items-start column-mobile pt5">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<?php //  wc_get_template( 'checkout/order-received.php', array( 'order' => $order ) ); ?>

			<div class="flex flex-column  justify-center list-none w-60-ns pr6-ns" bg-color="white">
				<h1 class="f1 measure-wide mb1 woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h1>
				<p class="mb4 mt2 measure-wide">Vas a recibir un mail con detalles de tu compra. Si elegiste retiro en pick up point nos vamos a poner en contacto por whatsapp para coordinar la entrega. </p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details list-none flex flex-column items-start mb-4 sm:mb-0 border-ty p-5 last:!mb-0">

				<li class="woocommerce-order-overview__order order !mr-0">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date !mr-0">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email !mr-0">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total !mr-0 !mb-0">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method !mr-0 !mb-0">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

			</div>
		<?php endif; ?>

		

		<div class="w-40-ns">
			<div class="order-product-details pa-5">
					<h2 class="mb2">Resumen de tu compra:</h2>
					<?php $items = $order->get_items();
						foreach ( $items as $item ) :
					// echo $item;
					$product_name = $item->get_name();
				
					$product_id = $item->get_product_id();
					$product_variation_id = $item->get_variation_id();
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
					?>
					<div class="order-product flex jic gap-2">
						<div class="w-30-ns order-product-img">
							<img src="<?php echo $image[0]; ?>" >
						</div>
						<div class="order-product-info" style="flex: 1 0 0;">
							<h2 class="mb2 f4"><?php echo $product_name;?></h2>
							<h2 class="mb2 f4">Cantidad: <?php echo $item->get_quantity();?></h2>
						</div>

						<div class="order-product-price">
							<h2 class="mb2 f6 o-0">N</h2>
							<h2 class="mb2 f3">$<?php echo $item->get_subtotal();?></h2>
						</div>
					</div>
				<?php endforeach ;?>
				
			
				<div class="order-total">
					<div class="flex jic mb2 w-100">
						<h2 class="f4">Subtotal</h2>
						<h2 class="f4">$<?php echo $order->get_subtotal();?></h2>
					</div>

					<div class="flex jic mb2 w-100">
						<h2 class="f4">IVA e impuestos:</h2>
						<h2 class="f4">$<?php echo $order->get_total_tax();?></h2>
					</div>

			

					<div class="flex jic mb2 w-100">
						<h2 class="f4">Precio de envío:</h2>
						<h2 class="f4">$<?php echo $order->get_shipping_total();?></h2>
					</div>
				</div>

				<div class="order-final-total flex jic">
					<h2 class="f2">Total:</h2>
					<h2 class="f2"><?php echo $order->get_formatted_order_total();?></h2>
				</div>
			</div>

			<!-- <?php echo $order;?> -->

			<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?> 
		</div>
	

		<?php // do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php // do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<?php wc_get_template( 'checkout/order-received.php', array( 'order' => false ) ); ?>

	<?php endif; ?>
	</div>
	</section>

</div>



<style>
	.woocommerce-order-details, .order-product-details, .woocommerce-column--shipping-address {
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		margin-bottom: 40px;
		background-color: var(--hp-blue);
		/* border: 2px solid #fff; */
		padding: 30px;
		border-radius: 8px;
	}

	.woocommerce-order-details, .woocommerce-column--billing-address {
		display: none !important
	}
	.order-product:not(:first-of-type), .order-total, .order-final-total {
		border-top: 1px solid var(--grey);
		margin-top: 20px;
		padding-top: 20px;
	}

	.woocommerce-table--order-details {
		margin: auto;
	}

	.woocommerce-customer-details {
		margin-bottom: 60px;
	}

	.cbu-copy {
		-webkit-apperance: none;
		background-color: var(--hp-blue);
		color: white;
		width: 100%;
		padding: 15px 25px;
		margin-top: 25px;
		border: none;
		outline: none;
	}

	.cbu-info-container, .border-ty {
		border: 1px solid var(--hp-blue);
	}

	.woocommerce ul.order_details li {
		border-right: 0px !important;
		display: flex;
		align-items: center;
	}

	.woocommerce-order-overview li {
	display: flex;
	justify-content: space-between;
	width: 100%;
	margin-bottom: 30px;
	padding-bottom: 15px;
	border-bottom: 1px solid var(--hp-blue);
	}


</style>

