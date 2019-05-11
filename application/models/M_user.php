<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_user(){
		$this->db->select('t_user.id_user, t_user.nama_user, t_user.username, t_user.password, t_user.email, t_user.role, t_user.is_active');
		$this->db->from('t_user');
		$query = $this->db->get();

		return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
}