jQuery(document).ready(function(){

	jQuery.ajax({
		url : ajaxurl,
		type : 'post',
		data : {
		    action : 'generate_layfotk_code',
			product_id : product_id
		},
		success : function( response ) {
			jQuery('#feeback').html( response );
		}
    });
    
});
