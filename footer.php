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

<a href="https://api.whatsapp.com/send?phone=+5491157808539&text=Hola!%20Estoy%20interesado%20en%20darle%20las%20mejores%20vacaciones%20a%20mi%20perro!" target="_blank" class="whapp-button flex fixed bottom-0 right-0 pa2 ma4 z-5 bg-main-color">
	<?php get_template_part('template-parts/content/whapp');?>
</a>

<style>

	.whapp-button {
		width: 60px;
    height: 60px;
    background-color: var(--hp-blue);
    border-radius: 100px;
		box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.16);
		transition: var(--smooth);
		transition-timming: .2s
	}

	.whapp-button:hover {
	transform: scale(1.1)
	}

	body.page-template-archive-product .whapp-button {
		bottom: 8%;
	}

	.whapp-button svg {
    width: 25px;
    margin: auto;
	}

	.whapp-button svg path{
		fill: white;
	}

	@media (max-width: 580px) {
		.whapp-button {
			margin: 20px;
		}
	}
</style>


<section class="instagram-feed-container pv5 container-xs">
	<div class="flex jic column-mobile gram-text-container">
		<a href="https://www.instagram.com/ugo.houseparadise/" target="_blank" class="ttu main-color db mb4 fw7 f3 tc db flex justify-center items-center column-mobile">
			<?php get_template_part('template-parts/content/insta');?>
			<h2 class="ttu f3 white ml3 mt1 gram-text">Seguinos!</h2>	
		</a>
		<h2 class="ttu f3 ugo-pink ml3-ns mt1">@ugo.houseparadise</h2>	
	</div>
	
		<div class="instagram-feed flex flex-wrap justify-between column-mobile">
		<!-- Loading... -->
		</div>
	</section>

	<footer id="colophon" class="site-footer dn">
	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1D8FEDMZ6S"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-1D8FEDMZ6S');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5NR2CBH');</script>
<!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NR2CBH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_footer(); ?>

<?php if (is_page(6)): ?>
	<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/locales/es.js"></script>
<?php endif;?>
	


</body>
</html>
