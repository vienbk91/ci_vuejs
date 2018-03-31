<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller {
	const LOGIN_SESSION_NAMESPACE = "login";
	
	/**
	 * コントローラー
	 */
	public function Login() {
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
	
	/**
	 * デフォルトアクション
	 */
	public function index() {
		// 言語ロード
		$this->lang->load('login', getLanguage());
		// 初期化
		$dataView = array();
		$errorMsg = "";
		// ビューでマッピングデータ作成
		$dataView['language'] = getLanguage();
		
		if ($this->input->method() == "post") {
			$this->checkLoginValidation(); // バリデーションチェック
			$inputData = $this->input->post();
			// バリデーション実施
			if ($this->form_validation->run() == true) {
				if ($this->isExistLoginDataInDB($inputData)) {
					$loginData = $this->users->getLoginDataInDB($inputData['user_name'], $inputData['password']);
					$this->setLoginSession($loginData);
					redirect(site_url('home'));
				} else {
					$errorMsg = $this->lang->line('error_001');
				}
			}
		}
		$dataView['errorMsg'] = $errorMsg;
		$this->load->view("login_view", $dataView);
	}
	
	/**
	 * ログインしたら、ログイン情報をセッションに保存する
	 * @param array $loginData
	 */
	private function setLoginSession($loginData) {
		$this->phpsession->clear(null, self::LOGIN_SESSION_NAMESPACE);
		$this->phpsession->save('user_id', $loginData['user_id'], self::LOGIN_SESSION_NAMESPACE);
		$this->phpsession->save('user_name', $loginData['user_name'], self::LOGIN_SESSION_NAMESPACE);
		$this->phpsession->save('full_name', $loginData['full_name'], self::LOGIN_SESSION_NAMESPACE);
		$this->phpsession->save('profile_url', $loginData['profile_url'], self::LOGIN_SESSION_NAMESPACE);
	}

	private function isExistLoginDataInDB($loginParam) {
		$loginData = $this->users->getLoginDataInDB($loginParam['user_name'], $loginParam['password']);
		if (count($loginData) > 0) {
			return true;
		}
		return false;
	}

	private function checkLoginValidation() {
		$this->lang->load('login', getLanguage());
		$this->lang->load('validation', getLanguage());
		
		$this->form_validation->set_error_delimiters('<div><font color="#FF0000"><strong>', '</strong></font></div>');
		
		$this->form_validation->set_message('required', $this->lang->line('required'));
		
		$this->form_validation->set_rules('user_name', 'lang:user_name', 'required');
		$this->form_validation->set_rules('password', 'lang:password', 'required');
	}
}
