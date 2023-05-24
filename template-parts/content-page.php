<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uGo
 */

?>

<article class="container flex flex-column items-center" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title mb4">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<!-- <?php ugo_post_thumbnail(); ?> -->

	<div class="entry-content w-60-ns margin-auto">
		<?php
		the_content();

		// wp_link_pages(
		// 	array(
		// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ugo' ),
		// 		'after'  => '</div>',
		// 	)
		// );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
