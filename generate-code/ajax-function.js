jQuery(document).ready(function(){

	jQuery.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
		    action : 'wp_generate_random_code',
			var_to_send : var_to_send,
			security: '<?php echo wp_create_nonce( "bk-ajax-nonce" ); ?>'
		},
		success : function( response ) {
			jQuery('#feeback').html( response );
		}
    });
    
});
