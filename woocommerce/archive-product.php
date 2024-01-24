<?php
/**
 * 
 * Template Name: Archive
 * 
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();


/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>
<main id="main" data-barba="container" data-barba-namespace="shop" class="shop no-mt ugo-pink-bg" header-color="black">

<?php	
	// $category_id = $cat->term_id; 
	// $category = get_queried_object();
	// $categoryID = $category->term_id;

	$args = array(
				'taxonomy'     => 'product_cat',
				'orderby'      => 'date',
				'order'=> "DESC",
				'show_count'   => 1, // 1 for yes, 0 for no
				'pad_counts'   => 1,
				'hierarchical' => 0,
				'title_li'     => '',
				'hide_empty'   => 0, 
				'exclude' => 		array(32),
				'parent' => 0, 
				// 'child_of' => $categoryID	
				);
	
				$all_categories = get_categories( $args );	
?>


<header class="woocommerce-products-header  container mx-auto pt6 ">
	<div class="flex jic border-b-2 border-b-black pb-5">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title tc black text-6xl "><?php woocommerce_page_title(); ?></h1>
			<!-- <div class="shop-descrip center measure-wide mt2 tc main-font f3"><?php echo get_the_content(435);?></div> -->
		<?php endif; ?>

		<div class="shop-nav flex justify-between">
			<p class="black pointer-events-none">Filtrar por categoría: </p>
			<?php 
			foreach ($all_categories as $cat) :
				$category_id = $cat->term_id; 
				if ($cat->name != 'Uncategorized' && $cat->count > 0):
				echo '<p class="anchor black mx-3 rounded-full border-[1px] px-2 pv-1 border-black hover:text-white hover:bg-black smooth-t last:mr-0"> ' . $cat->name  . ' </p>';
				endif;
			endforeach; wp_reset_postdata()?>
		</div>
	</div>



	<?php if (get_field('banner')): ?>
	<section class="banner mv3">
		<div class="banner-container relative">
			<?php if( have_rows('banner') ): while ( have_rows('banner') ) : the_row();  ?>
			<?php if (wp_is_mobile()): ?>
				<img src="<?php the_sub_field('imagen_mobile');?>">
			<?php else : ?>
				<img src="<?php the_sub_field('imagen');?>">
			<?php endif; endwhile; endif; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	// do_action( 'woocommerce_archive_description' );
	?>
</header>
	<div class="views flex jic w-max fixed bottom-0 left-0 pa2 ma4 z-5 bg-white" style="border-radius: 100px;">
			<a href="/shop" class="scroll mh3 
				<?php	if (is_shop()) : echo 'active'; endif; ?>
			">
				<svg width="27" height="20" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 0H2V2H0V0ZM0 5H2V7H0V5ZM0 10H2V12H0V10ZM16 2V0H4.023V2H14.8H16ZM4 5H16V7H4V5ZM4 10H16V12H4V10Z" fill="#AAAAAA"/>
				</svg>

			</a>
			<a href="/grid-shop" class="grid mh3
				<?php	if (!is_shop()) : echo 'active'; endif; ?>
			">
				<svg width="27" height="27" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.28571 0.85H1.85714C1.59003 0.85 1.33386 0.956109 1.14499 1.14499C0.956109 1.33386 0.85 1.59003 0.85 1.85714V5.28571C0.85 5.55283 0.956109 5.809 1.14499 5.99787C1.33386 6.18675 1.59003 6.29286 1.85714 6.29286H5.28571C5.55283 6.29286 5.809 6.18675 5.99787 5.99787C6.18675 5.809 6.29286 5.55283 6.29286 5.28571V1.85714C6.29286 1.59003 6.18675 1.33386 5.99787 1.14499C5.809 0.956109 5.55283 0.85 5.28571 0.85ZM2.00714 5.13571V2.00714H5.13571V5.13571H2.00714Z" fill="#AAAAAA" stroke="#AAAAAA" stroke-width="0.3"/>
						<path d="M12.1429 0.85H8.71429C8.44718 0.85 8.19101 0.956109 8.00213 1.14499C7.81326 1.33386 7.70715 1.59003 7.70715 1.85714V5.28571C7.70715 5.55283 7.81326 5.809 8.00213 5.99787C8.19101 6.18675 8.44718 6.29286 8.71429 6.29286H12.1429C12.41 6.29286 12.6661 6.18675 12.855 5.99787C13.0439 5.809 13.15 5.55283 13.15 5.28571V1.85714C13.15 1.59003 13.0439 1.33386 12.855 1.14499C12.6661 0.956109 12.41 0.85 12.1429 0.85ZM8.86429 5.13571V2.00714H11.9929V5.13571H8.86429Z" fill="#AAAAAA" stroke="#AAAAAA" stroke-width="0.3"/>
						<path d="M5.28571 7.70718H1.85714C1.59003 7.70718 1.33386 7.81329 1.14499 8.00216C0.956109 8.19104 0.85 8.44721 0.85 8.71432V12.1429C0.85 12.41 0.956109 12.6662 1.14499 12.855C1.33386 13.0439 1.59003 13.15 1.85714 13.15H5.28571C5.55283 13.15 5.809 13.0439 5.99787 12.855C6.18675 12.6662 6.29286 12.41 6.29286 12.1429V8.71432C6.29286 8.44721 6.18675 8.19104 5.99787 8.00216C5.809 7.81329 5.55283 7.70718 5.28571 7.70718ZM2.00714 11.9929V8.86432H5.13571V11.9929H2.00714Z" fill="#AAAAAA" stroke="#AAAAAA" stroke-width="0.3"/>
						<path d="M12.1429 7.70718H8.71429C8.44718 7.70718 8.19101 7.81329 8.00213 8.00216C7.81326 8.19104 7.70715 8.44721 7.70715 8.71432V12.1429C7.70715 12.41 7.81326 12.6662 8.00213 12.855C8.19101 13.0439 8.44718 13.15 8.71429 13.15H12.1429C12.41 13.15 12.6661 13.0439 12.855 12.855C13.0439 12.6662 13.15 12.41 13.15 12.1429V8.71432C13.15 8.44721 13.0439 8.19104 12.855 8.00216C12.6661 7.81329 12.41 7.70718 12.1429 7.70718ZM8.86429 11.9929V8.86432H11.9929V11.9929H8.86429Z" fill="#AAAAAA" stroke="#AAAAAA" stroke-width="0.3"/>
				</svg>
			</a>
	</div>


<?php if (is_shop() || is_page('Grid Shop')) { ?>



<section class="shop-container overflow-hidden" header-color="white">
	<?php 
		foreach ($all_categories as $cat) {
			$category_id = $cat->term_id; 
			$thumbnail_id = get_woocommerce_term_meta($category_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );  
			$link = get_term_link( $cat->slug, 'product_cat' );?>

		<?php if($cat->count > 0 ) : ?>
			<div class="cat-header mv5" id="<?php echo $cat->slug; ?>">
						<!-- <div class="cat-description mv4">
							<h2 class="measure tc center">
								<?php echo $cat->name ; ?>
						</div> -->

				<div class="cat-products-container container mx-auto sm:gap-10 flex jic">
					<?php $productArgs = array(
						'post_type' => 'product',
						'orderby' => 'date',
						'order' => 'DESC',
						'product_cat' => $cat->name,
						'posts_per_page' => -1,
						// 'paged' => get_query_var( 'paged' ),
					);
					$products = new WP_Query( $productArgs ); if ( $products->have_posts() ) : while ( $products->have_posts() ) : $products->the_post();
						
						wc_get_template_part( 'content', 'product' ); 

					endwhile;
					wp_reset_postdata();
					endif; ?>
				</div>

			</div>

		<?php endif;?>

		<?php }

	/**wc_get_template_part( 'content', 'product' ); 
	 */ 
	?>

		<?php } ?>


	<?php
	if ( woocommerce_product_loop() ) {

		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */

		//ESTO ES EL FILTRADO DE PRODUCTOS!
		// do_action( 'woocommerce_before_shop_loop' );

		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				// do_action( 'woocommerce_shop_loop' );			
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action( 'woocommerce_no_products_found' );
	} ?>

</section>

</main>
<?php get_footer( 'shop' );
