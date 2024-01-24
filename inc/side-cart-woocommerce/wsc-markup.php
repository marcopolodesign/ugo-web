<?php

/**
 * Side Cart HTML
 *
 * @since      1.0.0
*/

?>



<div class="wsc-modal">

	<div class="wsc-opac"></div>
	<div class="wsc-container main-font">
		<?php do_action('wsc_cart_content'); ?>
	</div>
</div>

<div class="wsc-notice-box" style="display: none;">
	<div>
	  <span class="wsc-notice"></span>
	</div>
</div>







<script>
jQuery(document).ready(function($) {
    $.post(
        '<?php echo admin_url('admin-ajax.php'); ?>', 
        {
            'action': 'load_cart_content'
        }, 
        function(response) {
            $('.wsc-container').html(response);
        }
    );
});
</script>