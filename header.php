<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uGo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://unpkg.com/@barba/core"></script>

	<script src="https://apis.google.com/js/api.js"></script>

	
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1674646392738394');
	</script>


	<script async src="https://www.googletagmanager.com/gtag/js?id=G-9WN369K0SS"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

		</script>


	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1674646392738394&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
					
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- <script src="/wp-content/themes/ugo-main/tailwind.config.js"></script> -->

	<script>
		let price = <?php the_field('price', 6);?>;
		let transportFare = <?php the_field('transport_fare', 6);?>;
		// console.log(transportFare)
	</script>
					
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ugo' ); ?></a>




	<!-- <?php // if (is_page(array( 6, 230, 415, 417, 437, 435 )) || is_shop()) : ?> -->
	<header id="masthead" class="site-header flex absolute top-0 left-0 z-4 container w-full max-w-[unset] mx-auto pv3 justify-between">
		<a class="barba-prevent" href="/">
			<?php get_template_part('template-parts/content/hp-logo-min'); ?>
		</a>

		<div class="gap-2 flex">
			<a href="/" class="no-deco flex f4 w-max jic anchor">
				<p class="ml2 messina white f6 has-after pt1">Inicio</p>
			</a>		
			<a href="/shop" class="no-deco flex f4 w-max jic anchor">
				<p class="ml2 messina white f6 has-after pt1">Shop</p>
			</a>		
			<a href="#cart" class="no-deco flex f4 w-max jic anchor">
				<p class="ml2 messina white f6 has-after pt1 side-cart-trigger open-cart">Carrito</p>
				<sup id="cartTotal" class="text-sm ml-1 messina font-faro">0</sup>
			</a>
		</div>



		<div class="flex jic gap-5">
			<a href="#reserve" target="_blank" class="no-deco flex f4 w-max jic anchor">
				<?php // get_template_part('template-parts/content/whapp'); ?>
				<p class="ml2 messina white f6 has-after pt1">Reservar ahora</p>
			</a>

			<a href="/sign-in" target="_blank" class="no-deco flex f4 w-max jic anchor  desktop log-in">
				<?php // get_template_part('template-parts/content/whapp'); ?>
				<p class="ml5 messina white f6 has-after pt1">Iniciar sesión</p>
			</a>
		</div>

	</header><!-- #masthead -->
<!--  -->

	
<?php // get_template_part('side-cart'); ?> 


	<div class="pre-load bg-white"></div>

	<div class="fixed bg-color-container overflow-hidden pointers-none flex">
		<div class="bg-color-ball m-auto"></div>
	</div>

	<div class="cursor desktop"></div>
	<div class="pre-load fixed top-0 left-0 w-full z-5 m-brick-bg "></div>

	
	<div id="content" class="site-content" data-barba="wrapper">

