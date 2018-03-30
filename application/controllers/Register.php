<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class Register extends CI_Controller {
	public function Register() {
		parent::__construct();
		$this->load->helper( 'url' );
		$this->load->helper( 'common_helper' );
		$this->load->library( 'form_validation' );
		$this->load->library( 'session' );
		//　言語
		$this->lang->load('system', getLanguage());
		$this->lang->load('login', getLanguage());
// 		$this->lang->load('register', getLanguage());
		// データベース接続
		$this->load->database();
		$this->load->model('users');
	}
	
	public function index() {
		$dataView = array();
		$dataView['language'] = getLanguage();
		
		$this->load->view("register_view", $dataView);
	}
}