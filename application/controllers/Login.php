<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class Login extends CI_Controller {
	public function Login() {
		parent::__construct();
		$this->load->helper( 'url' );
		$this->load->helper( 'common_helper' );
		$this->load->library( 'form_validation' );
		$this->load->library( 'session' );
		//　言語
		$this->lang->load('system', getLanguage());
		$this->lang->load('login', getLanguage());
		// データベース接続
		$this->load->database();
		$this->load->model('users');
	}
	public function index() {
		$dataView = array();
		$dataView['language'] = getLanguage();
		
		if ($this->input->method() == "post") {
			$this->checkLoginValidation(); // バリデーションチェック
			$inputData = $this->input->post();
			if ($this->form_validation->run() == true) {
				if ($this->isExistLoginDataInDB( $inputData )) {
				} else {
					$errorMsg = "";
				}
			}
		}
		
		$this->load->view( "login_view", $dataView );
	}
	
	private function isExistLoginDataInDB($loginData) {
		
	}
	
	private function checkLoginValidation() {
		$this->lang->load( 'login', getLanguage() );
		$this->lang->load( 'validation', getLanguage() );
		
		$this->form_validation->set_error_delimiters( '<div><font color="#FF0000"><strong>', '</strong></font></div>' );
		
		$this->form_validation->set_message( 'required', $this->lang->line('required') );
		
		$this->form_validation->set_rules( 'user_name', 'lang:user_name', 'required' );
		$this->form_validation->set_rules( 'password', 'lang:password', 'required' );
	}
}
