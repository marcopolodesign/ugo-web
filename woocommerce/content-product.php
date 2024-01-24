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


<div <?php if ($hasBg): ?> background-color=<?php echo $hasBg; endif; ?>
	class="is-product mv4 sm:w-1/2 w-full <?php the_title();?>"<?php wc_product_class( '', $product ); 	?>>
		<a href="
			<?php
				if (get_field('custom_link')) : echo the_field('custom_link');
				else : echo $link; 
				endif;	?>"
			class="product-main flex flex-column center  center black no-deco">
			<div class="product-main-img">
				<img src='<?php echo $mainImage; ?>'>
			</div>
		
			<div class="flex items-center justify-between pt-5">
				<div>
					<h2 class="f2 text-black"><?php the_title();?></h2>
					<p class="mt1 pr4-ns !font-[Lausanne] font-normal !lowercase"><?php echo wp_trim_words( get_the_excerpt(), 21 , '...' ); ?></p>
				</div>

				<div class="inline-flex">
					<p class="no-deco main-cta w-max cta-font bg-main-light flex m-auto">Comprar</p>
				</div>
			
			</div>
		</a>	
</div>
