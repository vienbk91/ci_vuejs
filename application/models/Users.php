<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');
class Users extends CI_Model {

	public function Users() {
		parent::__construct();
		$this->load->database();
	}

	/**
	 * ログインデーター取得する
	 * 
	 * @param array $loginData
	 */
	public function getLoginDataInDB($userName, $password) {
		$condisionArr = array('user_name' => $userName, 'password' => $password);
		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condisionArr);
		
		$result = array();
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			// ログイン情報を取得できた場合
			$result = $query->result()[0];
		}
		
		return $result;
	}

	public function getRateList() {
		$sql = "select * from M08_Rate order by M08_Id ";
		$query = $this->db->query($sql);
		$query_arr = $query->result_array();
		if ($query_arr && count($query_arr) > 0) {
			return $query_arr;
		} else {
			return NULL;
		}
	}
}	