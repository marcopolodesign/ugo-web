jQuery(document).ready(function($){
	'use strict';

	//Block cart on fragment refresh
	$(document.body).on('wc_fragment_refresh',block_cart);

	//Unblock cart
	$(document.body).on('wc_fragments_refreshed wc_fragments_loaded',function(){
		content_height();
		unblock_cart();
	});

	// refresh fragment on document load
	if(!wsc_localize.added_to_cart){
		$( document.body ).trigger( 'wc_fragment_refresh' );
	}

	//Toggle Side Cart
	function toggle_sidecart(toggle_type){
		var toggle_element = $('.wsc-modal , body'),
			toggle_class   = 'wsc-active';

		if(toggle_type == 'show'){
			toggle_element.addClass(toggle_class);
		}
		else if(toggle_type == 'hide'){
			toggle_element.removeClass(toggle_class);
		}
		else{
			toggle_element.toggleClass('wsc-active');
		}
		
	}
	$('body:not(.woocommerce-cart):not(.woocommerce-checkout) .open-cart').on('click',toggle_sidecart);


	//Set Cart content height
	function content_height(){
		var header = $('.wsc-header').outerHeight(); 
		var footer = $('.wsc-footer').outerHeight();
		var screen = $(window).height();
		$('.wsc-body').height(screen-(header+footer));
	};

	content_height();

	$(window).resize(function(){
    	content_height();
	});
	

	//Auto open with ajax
	if(wsc_localize.auto_open_cart == 1){
		$(document).on('added_to_cart',function(){
			setTimeout(toggle_sidecart,1,'show');
		});
	}

	//Block Cart
	function block_cart(){
		$('.wsc-updating').show();
	}

	//Unblock cart
	function unblock_cart(){
		$('.wsc-updating').hide();
	}

	//Close Side Cart
	function close_sidecart(e){
		$.each(e.target.classList,function(key,value){
			if(value != 'wsc-container' && (value == 'wsc-close' || value == 'wsc-opac' || value == 'wsc-basket' || value == 'wsc-cont')){
				$('.wsc-modal , body').removeClass('wsc-active');
			}
		})
	}

	$('body').on('click','.wsc-close , .wsc-opac , .wsc-cont',function(e){
		e.preventDefault();
		close_sidecart(e);
	});

	//Add to cart function
	function add_to_cart(atc_btn,product_data){

		// Trigger event.
		$( document.body ).trigger( 'adding_to_cart', [ atc_btn, product_data ] );

		$.ajax({
				url: wsc_localize.wc_ajax_url.toString().replace( '%%endpoint%%', 'wsc_add_to_cart' ),
				type: 'POST',
				data: $.param(product_data),
			    success: function(response){
			    	
			    	add_to_cart_button_check_icon(atc_btn);

					if(response.fragments){
						// Trigger event so themes can refresh other areas.
						$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, atc_btn ] );
					}
					else if(response.error){
						show_notice('error',response.error)
					}
					else{
						show_notice('error',response.error)
					}
			
			    }
			})

		// Call updateCartTotal after adding to the cart
		updateCartTotal();
	}

	//Update cart
	function update_cart(cart_key,new_qty){
		
		$.ajax({
			url: wsc_localize.wc_ajax_url.toString().replace( '%%endpoint%%', 'wsc_update_cart' ),
			type: 'POST',
			data: {
				cart_key: cart_key,
				new_qty: new_qty
			},
			success: function(response){
				if(response.fragments){
					var fragments = response.fragments,
						cart_hash =  response.cart_hash;

					//Set fragments
			   		$.each( response.fragments, function( key, value ) {
						$( key ).replaceWith( value );
						$( key ).stop( true ).css( 'opacity', '1' ).unblock();
					});

					// Initial call to set the cart total on page load
					updateCartTotal();


					if(wc_cart_fragments_params){
				   		var cart_hash_key = wc_cart_fragments_params.ajax_url.toString() + '-wc_cart_hash';
						//Set cart hash
						sessionStorage.setItem( wc_cart_fragments_params.fragment_name, JSON.stringify( fragments ) );
						localStorage.setItem( cart_hash_key, cart_hash );
						sessionStorage.setItem( cart_hash_key, cart_hash );
					}

					$(document.body).trigger('wc_fragments_loaded');
				}
				else{
					//Print error
					show_notice('error',response.error);
				}
			}

		})
	}

	//Remove item from cart
	$(document).on('click','.wsc-remove',function(e){
		e.preventDefault();
		block_cart();
		var product_row = $(this).parents('.wsc-product');
		var cart_key = product_row.data('wsc');
		update_cart(cart_key,0);

		  // Call updateCartTotal after adding to the cart
		  updateCartTotal();
	})
	
	$(document).on('change','.wsc-product .input-text.qty.text',function(e){
		e.preventDefault();
		block_cart();
		var quantity = $(this).val();
		var product_row = $(this).parents('.wsc-product');
		var cart_key = product_row.data('wsc');
		update_cart(cart_key,quantity);

		  // Call updateCartTotal after adding to the cart
		  updateCartTotal();
	});
	
	 jQuery( "body" ).on( 'click', '.wsc-quantity .plus, .wsc-quantity .minus', function() {

        // Get values
        var $qty        = jQuery( this ).closest( '.wsc-quantity' ).find( '.qty' ),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( jQuery( this ).is( '.plus' ) ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }

        }

        // Trigger change event
        $qty.trigger( 'change' );
    });
	
	

	//Add to cart on single page
	if(wsc_localize.ajax_atc == 1){
		$(document).on('submit','form.cart',function(e){
			e.preventDefault();
			block_cart();
			var form = $(this);
			var atc_btn  = form.find( 'button[type="submit"]');

			add_to_cart_button_loading_icon(atc_btn);

			var product_data = form.serializeArray();

	        if( atc_btn.attr('name') && atc_btn.attr('name') == 'add-to-cart' && atc_btn.attr('value') ){
	            product_data.push({ name: 'add-to-cart', value: atc_btn.attr('value') });
	        }

	        product_data.push({name: 'action', value: 'wsc_add_to_cart'});

			add_to_cart(atc_btn,product_data);//Ajax add to cart
		})
	}

	
	function show_notice(notice_type,notice){
	 	$('.wsc-notice').html(notice).attr('class','wsc-notice').addClass('wsc-nt-'+notice_type);
	 	$('.wsc-notice-box').fadeIn('fast');
	 	clearTimeout(fadenotice);
	 	var fadenotice = setTimeout(function(){
	 		$('.wsc-notice-box').fadeOut('slow');
	 	},2000);
	};

	//Add to cart preloader
	function add_to_cart_button_loading_icon(atc_btn){
		if(wsc_localize.atc_icons != 1) return;

		if(atc_btn.find('.wsc-icon-atc').length !== 0){
			atc_btn.find('.wsc-icon-atc').attr('class','wsc-icon-spinner2 wsc-icon-atc wsc-active');
		}
		else{
			atc_btn.append('<span class="wsc-icon-spinner2 wsc-icon-atc wsc-active"><span>'+wsc_localize.adding_to_cart_text+'</span></span>');
		}
	}

	//Add to cart check icon
	function add_to_cart_button_check_icon(atc_btn){
		if(wsc_localize.atc_icons != 1) return;
		// Check icon
   		atc_btn.find('.wsc-icon-atc').attr('class','wsc-icon-checkmark wsc-icon-atc');
	}


	// update cart total on header
	function updateCartTotal() {
        $.ajax({
            url: ajax_object.ajax_url,
            type: 'post',
            data: {
                action: 'get_cart_total',
            },
            success: function (response) {
                // Update the content of the span with the total items
                $('#cartTotal').text(response);
            }
        });
    }

    // Initial call to set the cart total on page load
    updateCartTotal();


	var data, provincia, codigo, localidades;
    var base_url = window.location.origin;
    $('input#temporary_postcode').on('input', function () {
        var postcode = $(this).val();
        if (postcode.length == 4) {
            $('#billing_city').css('opacity','.3');
            $('.state_select').css('opacity','.3');
            $('#billing_state + .select2').css('opacity','.3');
            $.ajax({
                type: "post",
                url: base_url + '/wp-admin/admin-ajax.php',
                data: {
                    action: "autofill_checkout_fields_by_postcode",
                    postcode: postcode
                },
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {
                    console.log(response);
                    if (response){
                        data = JSON.parse(response);
                        provincia = data[0];
                        codigo = data[1];
                        localidades = "";
                        for (var i = 2; i < data.length; i++) {
                            localidades = localidades + '<option value="' + data[i] + '">' + data[i] + '</option>' 
                        }
   
					    $('#billing_state').replaceWith('<select name="billing_state" id="billing_state" class="state_select"><option value="' + codigo + '">' + provincia +'</option></select>');
                        $('#billing_state + .select2').remove();                
                        $('#billing_city').replaceWith('<select name="billing_city" id="billing_city" class="city_select">' + localidades + '</select>');
                        $('#billing_postcode').val(postcode);
						$(document.body).trigger("update_checkout");
                    } else {
                        console.log('ERROR');
                    }
                }
            })
        }
    });
    /*($('input#shipping_postcode').on('input', function () {
        var postcode = $(this).val();
        if (postcode.length == 4) {
            $('#shipping_city').css('opacity','.3');
            $('.state_select').css('opacity','.3');
            $('#shipping_state + .select2').css('opacity','.3');
            $.ajax({
                type: "post",
                url: base_url + '/wp-admin/admin-ajax.php',
                data: {
                    action: "autofill_checkout_fields_by_postcode",
                    postcode: postcode
                },
                error: function (response) {
                    console.log(response);
                },
                success: function (response) {
                    console.log(response);
                    if (response){
                        data = JSON.parse(response);
                        provincia = data[0];
                        codigo = data[1];
                        localidades = "";
                        for (var i = 2; i < data.length; i++) {
                            localidades = localidades + '<option value="' + data[i] + '">' + data[i] + '</option>' 
                        }
                                                             
                        $('#shipping_state').replaceWith('<select name="shipping_state" id="shipping_state" class="state_select"><option value="' + codigo + '">' + provincia +'</option></select>');
                        $('#shipping_state + .select2').remove();

                        $('#shipping_city').replaceWith('<select name="shipping_city" id="shipping_city" class="city_select">' + localidades + '</select>');
                    } else {
                        console.log('ERROR');
                    }
                    

                    
                }
            })
        }
    });
    */

    setInputFilter(document.getElementById("temporary_postcode"), function(value) {
        return /^\d*\d*$/.test(value); // Allow digits and '.' only, using a RegExp
    });

    // Restricts input for the given textbox to the given inputFilter function.
    function setInputFilter(textbox, inputFilter) {
        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
            this.value = "";
            }
        });
        });
    }
      
})

