<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_produk(){
		$this->db->select('t_produk.id_produk, t_produk.nama_produk, t_produk.desk_produk, t_produk.harga_produk, t_produk.img_produk');
		$this->db->from('t_produk');
		$query = $this->db->get();

		return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($id=null){
		return $this->db->delete('t_produk', array('id_produk' => $id)); 
	}
	
}