<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class Common extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper( 'url' );
		$this->load->helper( 'common_helper' );
		$this->load->library( 'phpsession' );
	}
	
	/**
	 * システム言語切換える
	 */
	public function changeLanguage() {
		// システム言語切換える
		$language = $this->input->post( "language" );
		unset($_SESSION['system_param']['language']);
		$_SESSION['system_param']['language'] = $language;
		echo $_SESSION['system_param']['language'];
	}
}