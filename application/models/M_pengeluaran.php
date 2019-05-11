<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_pengeluaran(){
		$this->db->select('t_pengeluaran.id_pengeluaran, t_pengeluaran.dana_keluar, t_pengeluaran.ket_keluar, t_pengeluaran.tgl_keluar');
		$this->db->from('t_pengeluaran');
		$query = $this->db->get();

		return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($id=null){
		return $this->db->delete('t_pengeluaran', array('id_pengeluaran' => $id)); 
	}

}