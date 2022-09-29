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
					

					
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ugo' ); ?></a>

	<?php if (is_page(6)) : ?>
	<header id="masthead" class="site-header flex absolute top-0 left-0 z-4 container w-100 pv3 justify-between">
		<?php get_template_part('template-parts/content/hp-logo-min'); ?>
		<a href="https://api.whatsapp.com/send?phone=+5491157808539&text=Hola!%20Estoy%20interesado%20en%20darle%20las%20mejores%20vacaciones%20a%20mi%20perro!" target="_blank" class="no-deco flex f4 w-max jic anchor">
			<?php get_template_part('template-parts/content/whapp'); ?>
			<p class="ml2 messina white f6 has-after pt1">Reservar ahora</p>
		</a>

	</header><!-- #masthead -->

	<?php elseif (!is_page_template('page-success.php')) : ?>

	<header class="site-header flex absolute top-0 left-0 z-4 container w-100 pv4 jic">
		<a href="/" class="logo">
			<svg width="134" height="52" viewBox="0 0 134 52" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g filter="url(#filter0_d_1934_657)">
				<path d="M38.5783 1.14844V24.8302C38.5783 30.71 37.0879 35.3218 34.1069 38.6657C31.1259 42.0096 26.8438 43.679 21.2604 43.679C15.6771 43.679 11.4045 42.0071 8.44271 38.6657C5.4809 35.3243 4 30.7125 4 24.8302V1.14844H17.896V25.0106C17.896 28.8373 19.0151 30.7506 21.258 30.7506C23.5369 30.7506 24.6775 28.8373 24.6775 25.0106V1.14844H38.5783Z" fill="white"/>
				<path d="M99.8416 9.2749C102.116 9.2749 104.239 9.70432 106.213 10.5606C108.188 11.4169 109.899 12.6137 111.351 14.1535C112.801 15.6934 113.946 17.5076 114.785 19.6014C115.621 21.6951 116.04 23.9794 116.04 26.4543C116.04 28.8657 115.638 31.117 114.828 33.2107C114.02 35.3045 112.892 37.1289 111.44 38.684C109.987 40.239 108.276 41.4612 106.302 42.348C104.327 43.2348 102.173 43.6795 99.8392 43.6795C97.5052 43.6795 95.3509 43.2348 93.3764 42.348C91.4019 41.4612 89.6885 40.239 88.2388 38.684C86.7867 37.1289 85.658 35.3045 84.8505 33.2107C84.0429 31.117 83.6379 28.8657 83.6379 26.4543C83.6379 23.9794 84.0573 21.6951 84.8936 19.6014C85.7299 17.5076 86.8825 15.6934 88.349 14.1535C89.8155 12.6163 91.5265 11.4169 93.4866 10.5606C95.4516 9.70432 97.5675 9.2749 99.8416 9.2749ZM99.8416 32.9719C100.589 32.9719 101.277 32.8067 101.905 32.4739C102.533 32.1435 103.079 31.6912 103.541 31.1221C104.006 30.5529 104.363 29.8745 104.62 29.0842C104.874 28.294 105.001 27.4402 105.001 26.5255C105.001 24.4724 104.5 22.8665 103.498 21.7129C102.497 20.5593 101.277 19.9825 99.8416 19.9825C98.4062 19.9825 97.1865 20.5593 96.1848 21.7129C95.1832 22.8665 94.6824 24.4698 94.6824 26.5255C94.6824 27.4428 94.8094 28.2965 95.0634 29.0842C95.3174 29.8745 95.6768 30.5529 96.1393 31.1221C96.6018 31.6912 97.1481 32.141 97.7784 32.4739C98.4062 32.8067 99.0939 32.9719 99.8416 32.9719Z" fill="#F4B5CD"/>
				<path d="M79.2839 38.7115C80.5371 36.4374 81.2368 34.4097 81.7976 31.7544C82.3559 29.0991 82.4517 26.3625 82.0827 23.5598H77.904H66.0708C66.0708 23.5598 64.1274 23.6131 64.3407 25.4477C64.3503 25.5163 64.4725 25.8822 64.5037 25.9432C65.2034 27.3153 65.558 27.9988 65.558 27.9988C65.2225 29.0483 63.6745 29.6835 63.1617 29.8436C62.6489 30.0037 62.1074 30.085 61.5371 30.085C60.5881 30.085 59.7159 29.8741 58.9179 29.4548C58.12 29.033 57.4251 28.4613 56.838 27.7371C56.2485 27.0155 55.7932 26.1516 55.4697 25.1504C55.1462 24.1467 54.9857 23.0643 54.9857 21.9005C54.9857 19.291 55.6207 17.2557 56.8955 15.7895C58.1679 14.3259 59.7159 13.5916 61.5371 13.5916C63.0563 13.5916 64.3767 14.0769 65.4981 15.0425C66.6172 16.0081 67.3864 17.398 67.8057 19.2097H81.9341C81.6298 16.3917 80.899 13.8101 79.7416 11.4648C78.5818 9.12205 77.1009 7.09944 75.2965 5.39954C73.4921 3.70218 71.4217 2.3758 69.0877 1.42548C66.7514 0.475164 64.2353 0 61.5371 0C58.652 0 55.9633 0.543769 53.476 1.6313C50.9887 2.71883 48.8129 4.23832 46.9533 6.19232C45.0914 8.14632 43.6297 10.451 42.5658 13.1088C41.5018 15.7667 40.9698 18.6684 40.9698 21.8091C40.9698 24.8709 41.4827 27.7295 42.5083 30.3873C43.5339 33.0452 44.9668 35.3625 46.8096 37.3343C48.6523 39.3087 50.8281 40.8586 53.3346 41.9868C55.8411 43.1125 58.5753 43.6791 61.5371 43.6791C64.3479 43.6791 66.9598 43.1633 69.3729 42.1367C70.2595 41.7581 71.3211 41.1432 72.1262 40.6579L73.1494 42.6297C73.9594 43.7528 74.9131 44.3144 76.4251 42.6373C77.2111 41.7785 78.2726 40.5486 79.2839 38.7115Z" fill="#F4B5CD"/>
				<path d="M127.561 26.0931C127.154 28.1488 126.275 29.3532 125.366 29.6022C124.635 29.8029 123.665 29.8029 123.665 29.8029C123.665 29.8029 122.766 29.8029 121.964 29.6022C121.048 29.3735 120.174 28.1488 119.769 26.0931C119.378 24.101 117.197 2.68582 117.336 2.05566C117.473 1.43313 118.52 1.27051 118.52 1.27051H128.81C128.81 1.27051 129.859 1.43567 129.994 2.05566C130.133 2.68836 127.952 24.1036 127.561 26.0931Z" fill="#F4B5CD"/>
				<path d="M123.665 31.48C124.391 31.48 125.069 31.6172 125.7 31.8916C126.33 32.166 126.878 32.5472 127.341 33.0401C127.803 33.5305 128.17 34.1124 128.438 34.7807C128.707 35.449 128.839 36.1782 128.839 36.9684C128.839 37.7384 128.709 38.4574 128.45 39.1283C128.192 39.7965 127.832 40.3809 127.367 40.8764C126.905 41.3719 126.356 41.7632 125.726 42.0478C125.096 42.3324 124.408 42.4747 123.663 42.4747C122.917 42.4747 122.23 42.3324 121.599 42.0478C120.969 41.7632 120.42 41.3745 119.958 40.8764C119.496 40.3809 119.134 39.7965 118.875 39.1283C118.616 38.46 118.487 37.7409 118.487 36.9684C118.487 36.1782 118.621 35.449 118.889 34.7807C119.158 34.1124 119.524 33.5331 119.994 33.0401C120.461 32.5497 121.01 32.166 121.635 31.8916C122.261 31.6172 122.939 31.48 123.665 31.48Z" fill="#F4B5CD"/>
				</g>
				<defs>
				<filter id="filter0_d_1934_657" x="0" y="0" width="134" height="51.6943" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
				<feFlood flood-opacity="0" result="BackgroundImageFix"/>
				<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
				<feOffset dy="4"/>
				<feGaussianBlur stdDeviation="2"/>
				<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
				<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1934_657"/>
				<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1934_657" result="shape"/>
				</filter>
				</defs>
			</svg>
		</a>

		<nav>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'header-menu',
				'container' => 'ul',
				'menu_class' => 'header-nav w-max ml-auto mr-0 flex jic list-none',
			) );
			?>
		</nav>
	</header>
	<?php endif;?>


	<div class="pre-load bg-white"></div>

	<div class="fixed bg-color-container overflow-hidden pointers-none flex">
		<div class="bg-color-ball m-auto"></div>
	</div>

	<div class="cursor desktop"></div>
	<div class="pre-load fixed top-0 left-0 w-100 z-5 m-brick-bg "></div>

	
	<div id="content" class="site-content" data-barba="wrapper">

