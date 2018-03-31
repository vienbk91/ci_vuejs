<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller {
	const LOGIN_SESSION_NAMESPACE = "login";

	public function Home() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('common_helper');
		$this->load->library('form_validation');
		$this->load->library('phpsession');
		// 言語
		$this->lang->load('system', getLanguage());
		$this->lang->load('login', getLanguage());
		// データベース接続
		$this->load->database();
		$this->load->model('users');
	}
	
	public function index() {
		$dataView = array();
		$dataView['language'] = getLanguage();
		
		$this->load->view('home_view', $dataView);
	}
}