<?php 
/**
 * Plugin Name: generate code
 * Plugin URI: http://github.com/manee1982
 * Description: This plugin generate code when user clicked on button
 * Version: 1.0.0
 * Author: Manee.O.H
 * Author URI: http://github.com/manee1982
 * License: GPL2
 */
 

//	Adding ajax functionality to generate 
//	layfotk codes

function wp_generate_random_code(){

	global $wpdb;

		$product_id = $_POST['product_id'];
		
		if(isset($product_id)) {
		
		$random_numbers_and_string = bin2hex(openssl_random_pseudo_bytes(16));
		$random_numbers_only = bin2hex(md5(openssl_random_pseudo_bytes(16)));
		
		$layfotk_code = substr($random_numbers_only, 0, 10);
		
		if($wpdb->insert('layfotk_codes',array(
			'product_id' => $product_id,
			'layfotk_code' => $layfotk_code,
			'req_date' => date('Y-m-d H:i:s',time())
		))===FALSE){

			echo "حدث خطأ .. الرجاء المحاولة مرة أخرى";

		}
		else {
			echo "<h4 class='bg-success'> رقم الخدمة الخاص بك: <br />" . $layfotk_code . "</h4>";

		}
	}
	
	die();
}

add_action('wp_ajax_wp_generate_random_code', 'wp_generate_random_code');
add_action('wp_ajax_nopriv_wp_generate_random_code', 'wp_generate_random_code'); // not really needed
