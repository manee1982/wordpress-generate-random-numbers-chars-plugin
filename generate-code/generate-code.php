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


// put this line in html form
// <input type="hidden" name="bk-ajax-nonce" id="bk-ajax-nonce" value="<?php echo wp_create_nonce( 'bk-ajax-nonce' ); closePHPCode">

function wp_generate_random_code(){

	global $wpdb;

		// ..... value from request
		$value1 = $_POST['value1'];
		$nounce = $_POST['security'];
		
		if(! wp_verify_nonce( $nonce, 'wp_generate_random_code' ) ) {
		
		// we use openssl_random_pseudo_bytes in native PHP
		// random string and numbers
		$random_numbers_and_string = bin2hex(openssl_random_pseudo_bytes(16));
		//random numbers
		$random_numbers_only = bin2hex(md5(openssl_random_pseudo_bytes(16)));
		
		// random code
		$rand_code = substr($random_numbers_only, 0, 10);
		
		// check the wp nounce is set or not
		if ( isset($value1) ) {

			 die( 'Security check error occured' ); 

		} 
		else {
			 // insert number in databse id desired
			if($wpdb->insert('table_name',array(
				'col1_name' => $value1,
				'rand_code' => $rand_code 
			))===FALSE){

				echo "Error Occured";

			}
			else {
				echo "Your random code: " . $rand_code;

			}
		}
	
		
		
	}
	
	die();
}

add_action('wp_ajax_wp_generate_random_code', 'wp_generate_random_code');
add_action('wp_ajax_nopriv_wp_generate_random_code', 'wp_generate_random_code'); // if ajax is going to execute through the none logged users.
