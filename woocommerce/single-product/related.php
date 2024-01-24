<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products container lg:mx-auto mv5">

		<h2 class="tc pv3 text-black text-3xl"><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>
			<div class="cat-products-container w-full flex justify-center">
				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object );

						wc_get_template_part( 'content', 'related' ); ?>

				<?php endforeach; ?>
			</div>
			<a href="/shop" class="no-deco main-cta w-max cta-font bg-main-light flex center mt3">Volver al shop</a>

	</section>

<?php endif;

wp_reset_postdata();
