
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
		 * app_key
		 * 
		 * @var mixed
		 * @access private
		 */
		private $app_key;
		
		/**
		 * app_secret
		 * 
		 * @var mixed
		 * @access private
		 */
		private $app_secret;
		
		/**
		 * token
		 * 
		 * @var mixed
		 * @access private
		 */
		private $token;

		
		/**
		 * max_filesize_mb
		 * 
		 * (default value: 150)
		 * 
		 * @var int
		 * @access private
		 */
		private $max_filesize_mb = 150;
		
		/**
		 * chunk_size_mb
		 * 
		 * (default value: 50)
		 * 
		 * @var int
		 * @access private
		 */
		private $chunk_size_mb   = 50;
		
		/**
		 * request_token
		 * 
		 * @var mixed
		 * @access private
		 */
		private $request_token;
		
	    /**
	    * @param $app_key
	    * @param $app_secret
	    * @param string $token - постоянный токен
	    */
	    public function __construct ( $app_key, $app_secret, $token = "" )
	    {
	        $this->app_key    = $app_key;
	        $this->app_secret = $app_secret;
	        $this->token      = $token;
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
				return new WP_Error( 'response-error', sprintf( __( 'Server response code: %d', 'wp-dropbox-api' ), $code ) );
			}
			$body = wp_remote_retrieve_body( $response );
			return json_decode( $body );
		}
		
		/* AUTH. */
		
		public function auth_with_oauth() {
			// https://api.dropboxapi.com/2/auth/token/from_oauth1

		}
		
		public function revoke_token() {
			
		}
		
		/* FILES. */
		
		public function copy( $from_path, $to_path, $allow_shared_folder, $autorename, $allow_ownership_transfer ) {
			// https://api.dropboxapi.com/2/files/copy

		}
		
		public function copy_batch() {
			
		}
		
		/* PAPER. */
		
		/* SHARING. */
		
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