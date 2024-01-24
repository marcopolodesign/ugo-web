<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
} 

$hasBg = get_field('product_bg_color');
$mainImage = get_the_post_thumbnail_url();
$variable = get_field('custom_link');
$link = get_permalink();
?>


<div class="is-product mv4 w-full  <?php the_title();?>"<?php wc_product_class( '', $product );?>>
		<a href="<?php echo $link; ?>" class="product-main flex flex-column justify-center items-center black no-deco gap-5">
			<div class="product-main-img w-1/3">
				<img src='<?php echo $mainImage; ?>'>
			</div>
		
			<div class="flex flex-column items-center pt-5 text-center">
				<div>
					<h2 class="f2 text-black"><?php the_title();?></h2>
					<p class="mt1 !font-[Lausanne] font-normal !lowercase"><?php echo wp_trim_words( get_the_excerpt(), 21 , '...' ); ?></p>
				</div>

				<div class="inline-flex justify-center">
					<p class="no-deco main-cta w-max cta-font bg-main-light flex">Ver más</p>
				</div>
			
			</div>
		</a>	
</div>
