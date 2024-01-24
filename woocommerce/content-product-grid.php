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
} ?>


<div class="is-product relative in-grid w-30-ns mv4 <?php the_title();?>"<?php wc_product_class( '', $product ); 
	$mainImage = get_field('main_image');
	$image1 = get_field('image_1');
	$image2 = get_field('image_2');
	$hasBg = get_field('product_bg_color');

	$variable = get_field('custom_link');
	$link = get_permalink();
?>>
		
	<a href="<?php 	if (get_field('custom_link')) : echo the_field('custom_link');
			else : echo $link; 	endif;	?>"
		class="flex flex-column center black no-deco">
		<div class="product-main-img">
			<img src='<?php the_post_thumbnail_url('full'); ?>'>
		</div>
	
		<div class="flex flex-column items-center justify-between pa4 pt0">
			<div>
				<h2 class="f2 domaine black tc"><?php the_title();?></h2>
				<p class="mt1 f6 tc black"><?php echo wp_trim_words( get_the_content(), 21 , '...' ); ?></p>
			</div>

			<div class="inline-flex">
				<p class="no-deco main-cta w-max cta-font bg-main-light flex center mt3">Comprar</p>
			</div>
		</div>
	</a>
	<div class="product-color z--1 absolute top-0 left-0 w-100 h-100" style="background-color: <?php echo $hasBg;;?>"></div>

</div>
