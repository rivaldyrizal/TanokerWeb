<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemasukan extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_pemasukan(){
		$this->db->select('t_pemasukan.id_pemasukan, t_pemasukan.dana_masuk, t_pemasukan.ket_masuk, t_pemasukan.tgl_masuk');
		$this->db->from('t_pemasukan');
		$query = $this->db->get();

		return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($id=null){
		return $this->db->delete('t_pemasukan', array('id_pemasukan' => $id)); 
	}
}