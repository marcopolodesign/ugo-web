<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uGo
 */

?>

</div><!-- #content -->

<section class="instagram-feed-container mv5 container-xs">
	<div class="flex jic column-mobile gram-text-container">
		<a href="http://instagram.com/ugo.argentina" target="_blank" class="ttu main-color db mb4 fw7 f3 tc db flex justify-center items-center column-mobile">
			<?php get_template_part('template-parts/content/insta');?>
			<h2 class="ttu f3 white ml3 mt1 gram-text">Seguinos!</h2>	
		</a>

		<h2 class="ttu f3 ugo-pink ml3 mt1">@ugo.argentina</h2>	


	</div>
	
		<div class="instagram-feed flex flex-wrap justify-between column-mobile">
		<!-- Loading... -->
		</div>
	</section>

	<footer id="colophon" class="site-footer dn">
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
