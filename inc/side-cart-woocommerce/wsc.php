<?php

if ( ! defined( 'WPINC' ) ) {
	// die;
}

/**
 * Check if WooCommerce is activated
 */
function wsc_init(){

	define("WSC_PATH", get_template_directory() . '/inc/side-cart-woocommerce');

	update_option('woocommerce_enable_ajax_add_to_cart','yes');

}
add_action('woocommerce_init','wsc_init');

function get_cart_markup(){
	if( is_cart() || is_checkout() ){
		return;
	}
	require_once get_template_directory() . '/inc/side-cart-woocommerce/wsc-markup.php';	
}


/**
 * Get Side Cart Content
 */

function get_cart_content(){
	$cart_data 	= WC()->cart->get_cart(); 
	$sidecart_options = get_option('sidecart_options');

	$args = array(
		'sidecart_options' => $sidecart_options,
	);

	ob_start();
	wc_get_template('wsc-content.php',$args,'',WSC_PATH.'/');
	wc_get_template('wsc-footer.php',$args,'',WSC_PATH.'/');
	return ob_get_clean();
}

/**
Set fragments
**/

function set_ajax_fragments($fragments){

	$count_value = WC()->cart->get_cart_contents_count();
	$cart_total = WC()->cart->get_cart_total();

	$cart_content = get_cart_content();

	//Cart content
	$fragments['div.wsc-container'] = '<div class="wsc-container">'.$cart_content.'</div>';

	//Total Count
	$fragments['span.wsc-items-count'] = '<span class="wsc-items-count">'.$count_value.'</span>';

	//Total Amount
	$fragments['span.wsc-items-total'] = '<span class="wsc-items-total">'.$cart_total.'</span>';

	return $fragments;
}


/**
 * Add product to cart
 */


function wsc_add_to_cart_ajax(){

	if(!isset($_POST['action']) || $_POST['action'] != 'wsc_add_to_cart' || !isset($_POST['add-to-cart'])){
		die();
	}
	
	// get woocommerce error notice
	$error = wc_get_notices( 'error' );
	$html = '';

	if( $error ){
		// print notice
		ob_start();
		foreach( $error as $value ) {
			// wc_print_notice( $value, 'error' );
		}

		$js_data =  array(
			'error' => ob_get_clean()
		);

		wc_clear_notices(); // clear other notice
		wp_send_json($js_data);
	}
	
	else{
		// trigger action for added to cart in ajax
		do_action( 'woocommerce_ajax_added_to_cart', intval( $_POST['add-to-cart'] ) );
		wc_clear_notices(); // clear other notice
		WC_AJAX::get_refreshed_fragments();	
	}

	die();
}

/**
 * Update product quantity in cart.
 */

function update_cart_ajax(){

	//Form Input Values
	$cart_key = sanitize_text_field($_POST['cart_key']);
	$new_qty = sanitize_text_field($_POST['new_qty']);

	//If empty return error
	if(!$cart_key){
		// wp_send_json(array('error' => __('Producto Agregado!','noddenhus')));
	}
	
	$cart_success = WC()->cart->set_quantity( $cart_key, $new_qty ); 
	
	if($cart_success){
		WC_AJAX::get_refreshed_fragments();
	}
	else{
		if(wc_notice_count('error') > 0){
			echo wc_print_notices();
		}
	}
	die();
}


function enqueue_styles() {

	$wsc = 'wsc';
	$version = '1.0.2';

	wp_enqueue_style( $wsc, get_template_directory_uri() . '/inc/side-cart-woocommerce/css/wsc-public.css', array(), $version, 'all' );

}

/**
 * Register the JavaScript for the public-facing side of the site.
 */
function enqueue_scripts() {

$wsc = 'wsc';
$version = '1.0.3';
	
	//User Options
	$gl_options = get_option('wsc-gl-options');
	$sidecart_options = get_option('sidecart_options');

	$ajax_atc = isset( $sidecart_options['shop-single-ajax-add-to-cart'] ) ? $sidecart_options['shop-single-ajax-add-to-cart'] : 1; //isset( $gl_options['sc-ajax-atc']) ? $gl_options['sc-ajax-atc'] : 0;
	$atc_icons = 1; //isset( $gl_options['sc-atc-icons']) ? $gl_options['sc-atc-icons'] : 1;
	
	//Check if item added to cart
	if($ajax_atc != 1 && isset($_POST['add-to-cart'])){
		$added_to_cart = true;
	}
	else{
		$added_to_cart = false;
	}


	$auto_open_cart = 1; //isset( $gl_options['sc-auto-open']) ? $gl_options['sc-auto-open'] : 1;
	$adding_to_cart_text = 'Agregando...';

	//Check if wc-add-to-cart is enqueued
	if (!wp_script_is('wc-add-to-cart', 'enqueued' )) {
       	wp_enqueue_script( 'wc-add-to-cart' );
     }

	wp_enqueue_script( $wsc, get_template_directory_uri() . '/inc/side-cart-woocommerce/js/wsc-public.js', array( 'jquery' ), $version, true );
	wp_localize_script( $wsc,'wsc_localize',array(
		'adminurl'		=> admin_url().'admin-ajax.php',
		'wc_ajax_url' 	=> WC_AJAX::get_endpoint( "%%endpoint%%" ),
		'ajax_atc'		=> $ajax_atc,
		'added_to_cart' => $added_to_cart,
		'auto_open_cart'=> $auto_open_cart,
		'atc_icons'  	=> $atc_icons,
		'adding_to_cart_text' => $adding_to_cart_text,
		)
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


if(!is_admin() || wp_doing_ajax()){
	add_action('get_footer', 'get_cart_markup');
	add_action('wc_ajax_wsc_add_to_cart', 'wsc_add_to_cart_ajax');
	add_action('wc_ajax_wsc_update_cart', 'update_cart_ajax');
	add_filter('woocommerce_add_to_cart_fragments', 'set_ajax_fragments',10,1);
}
