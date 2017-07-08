
<?php
/**
 * WP-Dropbox-API (https://github.com/wp-api-libraries/wp-dropbox-api)
 *
 * @package WP-Dropbox-API
 */
/*
* Plugin Name: WP Dropbox API
* Plugin URI: https://github.com/wp-api-libraries/wp-dropbox-api
* Description: Perform API requests to Dropbox in WordPress.
* Author: WP API Libraries
* Version: 1.0.0
* Author URI: https://wp-api-libraries.com
* GitHub Plugin URI: https://github.com/wp-api-libraries/wp-dropbox-api
* GitHub Branch: master
*/
/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Check if class exists. */
if ( ! class_exists( 'DropboxAPI' ) ) {
	
	/**
	 * DropboxAPI.
	 */
	class DropboxAPI {
		
		/**
		 * Dropbox API Key .
		 *
		 * @var string
		 */
		static private $apikey;

		/**
		 * Construct.
		 *
		 * @access public
		 * @param mixed $apikey 
		 * @return void
		 */
		public function __construct( $apikey ) {
			static::$apikey = $apikey;
			
		}
		/**
		 * Fetch the request from the API.
		 *
		 * @access private
		 * @param mixed $request Request URL.
		 * @return $body Body.
		 */
		private function fetch( $request ) {
			$response = wp_remote_get( $request );
			$code = wp_remote_retrieve_response_code( $response );
			if ( 200 !== $code ) {
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-zillow-api' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}
		
		/* USERS. */
		
		public function get_account() {
			// https://api.dropboxapi.com/2/users/get_account
		}
		
		public function get_account_batch() {
			// https://api.dropboxapi.com/2/users/get_account_batch
		}
		
		public function get_current_account() {
			// https://api.dropboxapi.com/2/users/get_current_account

		}
		
		public function get_space_usage() {
			// https://api.dropboxapi.com/2/users/get_space_usage

		}
	}
}