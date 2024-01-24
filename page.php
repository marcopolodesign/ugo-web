<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Noddenhus
 */

get_header();
?>

	<main id="primary" class="site-main bg-black" data-barba="container"  data-barba-namespace="<?php the_title();?>" header-color="black">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>


	<script>
		if (document.querySelector('.woocommerce p').innerText.indexOf('problemas') > -1) {
			console.log('reload')
			window.location.reload();
		}
	</script>


	</main><!-- #main -->

<?php
get_footer();
