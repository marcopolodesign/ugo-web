<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="flex relative top-0 left-0 w-100 min-h-100 h-100-vh flex bg-white overflow-hidden cart-general-container">

	<?php get_template_part('template-parts/cart-products', get_post_type()); ?>

	<div class="w-60-ns center cart-content overflow-scroll">
	<?php global $woocommerce;?>
		<div class="sd-header flex justify-between mv5">
				<p>Tu orden: <span class="fw8"><?php echo $woocommerce->cart->cart_contents_count;?> items</span></p>
				
				<a href="/shop" class="close-sd bg-black flex anchor pa2" cursor-color="red">
						<img class="pa1" src="/wp-content/uploads/2020/01/close-icon.svg">
				</a>
				
		</div>

		<form class="woocommerce-cart-form center" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
			<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<!-- <thead>
					<tr>
					
						<th class="product-thumbnail">&nbsp;</th>
						<h2 class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></h2>
						<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
						<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
						<th class="product-subtotal"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
						<th class="product-remove">&nbsp;</th>
					</tr>
				</thead> -->
			
					<?php do_action( 'woocommerce_before_cart_contents' ); ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<div class="woocommerce-cart-form__cart-item  <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							
								<div class="cart-product-content pv4 flex items-center justify-between">
									<div class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?> 
										
										<img class="cart-botella" src=<?php echo $thumbnail; ?> 
									</div>
									<div class="cart-product-text flex w-80-ns justify-between items-center">

											<div class="cart-product-name">

												<h2 class="product-name f2 lh1" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
													<?php echo $_product->get_title(); ?></h2>
											</div>

											<?php	do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

											// Meta data.
											echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

															// Backorder notification.
															// if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
															// 	echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
															// }
											?>									

											<p class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
												<?php
													echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
												?>
											</p>

											<p class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">X 
												<?php
												if ( $_product->is_sold_individually() ) {
													$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
												} else {
													$product_quantity = woocommerce_quantity_input( array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													), $_product, false );
												}

												echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
												?>
											</p>

											<p class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
												<?php
													echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
												?>
											</p>

											<div class="product-remove">
												<?php
													// @codingStandardsIgnoreLine
													echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
														'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
														esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
														__( 'Remove this item', 'woocommerce' ),
														esc_attr( $product_id ),
														esc_attr( $_product->get_sku() )
													), $cart_item_key );
												?>
											</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>

					<?php do_action( 'woocommerce_cart_contents' ); ?>

					<div>
						<div class="actions mv4">
							<div class="actions-bar flex justify-between items-center flex-column pb4">

								<?php if ( wc_coupons_enabled() ) { ?>
										<div class="coupon w-100 flex justify-between mb3 items-center">
										<div>
										<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
										</div>
										<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
											<?php do_action( 'woocommerce_cart_coupon' ); ?>
										</div>
									<?php } ?>

									<button type="submit" class="button update-cart ml-auto mr-0" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

							</div>

							

							<?php do_action( 'woocommerce_cart_actions' ); ?>

							<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
						</div>
					</div>

					<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		
			</div>
			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>

		<div class="cart-collaterals flex" data-barba-prevent="all">
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>

	</div>




</div>





<?php do_action( 'woocommerce_after_cart' ); ?>

