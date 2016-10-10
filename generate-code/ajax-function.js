jQuery(document).ready(function(){

	jQuery.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
		    action : 'generate_layfotk_code',
			var_to_send : var_to_send
		},
		success : function( response ) {
			jQuery('#feeback').html( response );
		}
    });
    
});
