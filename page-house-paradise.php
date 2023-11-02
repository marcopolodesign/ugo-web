<?php /* Template Name:  House Paradise  */
get_header();
?>

<div id="primary" class="content-area">
		<main id="main" data-barba="container" data-barba-namespace="hp" class="hp ugo-pink-bg">

		<div class="hp-starter flex relative column-mobile min-h-100-vh">
			<?php get_template_part('template-parts/house-paradise-slider'); ?>
		</div>

		<div class="bloques-home">
			<?php get_template_part('template-parts/bloques-marco');?>
		</div>

		<div class="landing-footer pt5-ns flex justify-between container bg-black pb5">
		
			<div class="measure center flex flex-column items-center">
				<h1 class="tc f1 center white main-font">Te esperamos!</h1>
				<a href="https://api.whatsapp.com/send?phone=+5491157808539&text=Hola!%20Estoy%20interesado%20en%20darle%20las%20mejores%20vacaciones%20a%20mi%20perro!" target="_blank" 
					class="no-deco flex main-cta reverse ugo-border br-button mt4 w-max jic center mb5">
					<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M27.3375 4.65096C25.8615 3.17229 24.1053 1.99981 22.1708 1.20146C20.2362 0.403109 18.1617 -0.00524659 16.0674 5.08882e-05C7.28562 5.08882e-05 0.136661 7.11331 0.133111 15.8569C0.133111 18.6514 0.86611 21.3787 2.25934 23.7845L0 32L8.44635 29.7938C10.7827 31.0596 13.4002 31.7233 16.0603 31.7244H16.0674C24.8474 31.7244 31.9964 24.6112 31.9999 15.8675C32.006 13.7841 31.597 11.72 30.7968 9.7948C29.9965 7.86955 28.8207 6.12126 27.3375 4.65096V4.65096ZM16.0674 29.0484H16.0621C13.6901 29.0486 11.3617 28.4135 9.32133 27.2095L8.83858 26.9234L3.8265 28.2323L5.16294 23.3694L4.8488 22.8713C3.52263 20.77 2.8206 18.3383 2.82373 15.8569C2.82728 8.59001 8.76759 2.6779 16.0727 2.6779C17.8125 2.67405 19.5358 3.01366 21.1428 3.67706C22.7498 4.34047 24.2086 5.31449 25.4349 6.54277C26.6677 7.76518 27.6449 9.21866 28.3099 10.8192C28.9749 12.4197 29.3146 14.1356 29.3093 15.8675C29.3058 23.1345 23.3655 29.0484 16.0674 29.0484ZM23.3317 19.176C22.9324 18.9764 20.9766 18.019 20.6109 17.8865C20.2471 17.7541 19.9827 17.6887 19.7164 18.0844C19.4502 18.48 18.687 19.3721 18.4545 19.637C18.222 19.902 17.9895 19.9338 17.592 19.7359C17.1944 19.5381 15.9112 19.1195 14.3902 17.77C13.2064 16.7189 12.4077 15.4224 12.1752 15.025C11.9427 14.6275 12.1504 14.4138 12.3509 14.216C12.5302 14.0393 12.7485 13.7532 12.9473 13.5218C13.1461 13.2904 13.2117 13.1261 13.3448 12.8611C13.478 12.5962 13.4123 12.3648 13.3111 12.167C13.2117 11.9674 12.4148 10.0173 12.0829 9.22415C11.7617 8.45577 11.4334 8.55822 11.1884 8.54762C10.9348 8.53729 10.6809 8.53258 10.427 8.53349C10.2252 8.53861 10.0265 8.58518 9.84359 8.67029C9.66065 8.7554 9.49735 8.87721 9.36393 9.02808C8.99832 9.42552 7.9707 10.3829 7.9707 12.333C7.9707 14.2831 9.39765 16.1678 9.59643 16.4328C9.79521 16.6978 12.4042 20.6986 16.3975 22.4156C17.3488 22.8236 18.0907 23.0674 18.6675 23.2511C19.6206 23.5531 20.4885 23.509 21.1753 23.4083C21.9403 23.2952 23.5305 22.4509 23.8624 21.5253C24.1943 20.5997 24.1943 19.8066 24.0949 19.6406C23.9955 19.4745 23.7275 19.3738 23.3317 19.176" fill="var(--darkPink)"/>
					</svg>
					<p class="ml2 main-font white f4">Reservar ahora</p>
				</a>


				<?php get_template_part('template-parts/content/hp-logo');?>
			</div>


		</div>

		<?php  
			get_template_part('template-parts/reserve'); 
			get_template_part('template-parts/reserve-hp/reserve-message'); 
		?>

	

		<script src="wp-content/themes/ugo-main/js/datepicker-full.min.js"></script>
		<script src="wp-content/themes/ugo-main/js/house-paradise.js"></script>

		
	
		</main><!-- #main -->
	</div><!-- #primary -->


	

<?php
get_footer();
