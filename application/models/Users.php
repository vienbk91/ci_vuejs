<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
class Users extends CI_Model {
	public function Users() {
		parent::__construct ();
		$this->load->database ();
	}
	public function getRateList() {
		$sql = "select * from M08_Rate order by M08_Id ";
		$query = $this->db->query( $sql );
		$query_arr = $query->result_array();		
		if ($query_arr && count ( $query_arr ) > 0) {
			return $query_arr;
		} else {
			return NULL;
		}			
		
	}
	
}	