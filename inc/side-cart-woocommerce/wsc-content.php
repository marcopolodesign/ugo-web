<?php
global $woocommerce;
do_action( 'woocommerce_before_cart_contents' ); ?>

<div class="wsc-header main-font bg-main-light">
	<h4 class="wsc-ctxt">Cart</h4>
    <h5>Tu orden: <?php echo  $woocommerce->cart->get_cart_contents_count(); ?> item(s)</h5>
	<div class="pa3 wsc-icon-cross wsc-close cart-trigger anchor">
		<svg class="pointers-none" width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M16.5918 5.5918L5.59188 16.5917" stroke="black" stroke-width="1.5"/>
		<path d="M16.5918 16.5918L5.59188 5.59188" stroke="black" stroke-width="1.5"/>
		</svg>
	</div>
</div>

<div class="wsc-body main-font bg-main-light">
	<div class="wsc-content">
		<?php if(WC()->cart->is_empty()): ?>
			<span class="wsc-ecnt gt f1 mt5-ns w-max" style="font-size: 2rem;">Tu carrito esta vacío.</span>
			<a href="/shop" class="main-cta bg-black mt3 db w-max cart-no-products no-deco">
				<p class="white">Agregar productos</p>
			</a>
		<?php else: ?>

			<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

					$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					
					$product_name =  apply_filters( 'woocommerce_cart_item_name', sprintf( '<h6 class="wsc-product-title cart-product-title"><a href="%s">%s</a></h6>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
								

					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

					?>

					<div class="wsc-product" data-wsc="<?php echo esc_attr( $cart_item_key ); ?>">
						<div class="wsc-img-col">
							<a href="<?php echo esc_url( $product_permalink ) ?>"><?php echo $_product->get_image( 'full' );?></a>
						</div>
						<div class="wsc-sum-col">
							<a href="<?php echo esc_url( $product_permalink ) ?>" class="wsc-pname"><?php echo wp_kses( $product_name, array( 'h6' => array( 'class' => array() ), 'a' => array( 'href' => array() ) ) ); ?></a>
							<?php 

							echo ( $_product->is_type('variable') || $_product->is_type('variation') ) ? wc_get_formatted_variation($_product) : '';
							
							echo WC()->cart->get_item_data( $cart_item );
							

							?>
                            <div class="wsc-price">
								<span><?php echo wp_kses( $cart_item['quantity'], array( 'span' => array( 'class' => array() ) ) ); ?></span> x <span><?php echo wp_kses( $product_price, array( 'span' => array( 'class' => array() ) ) ); ?></span> 
							</div>
							<div class="wsc-quantity flex items-center justyfy-between mt-5">
								<span class="qty-button plus">
										<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20">
											<path d="M9,0l2,0v9h9v2h-9l0,9l-2,0l0-9H0V9l9,0L9,0z"></path>
										</svg>
									</span>
									<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input( array(
													'input_name'  => "cart[{$cart_item_key}][qty]",
													'input_value' => $cart_item['quantity'],
													'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
													'min_value'   => '0',
												), $_product, false );
											}
											
											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
										
										
									?>
									
									<span class="qty-button minus">
										<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 20 20">
											<path d="M9,9l2,0l0,0h9v2h-9l0,0l-2,0l0,0H0V9L9,9L9,9z"></path>
										</svg>
									</span>
							</div>
							<a href="#" class="wsc-remove">Eliminar</a>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php endif; ?>

		<div class="wsc-updating">
			<span class="wsc-icon-spinner2" aria-hidden="true"></span>
			<span class="wsc-uopac"></span>
		</div>
	</div>
</div>

