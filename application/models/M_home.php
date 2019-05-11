<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_masuk(){
		$sql= "SELECT sum(dana_masuk) as masuk from t_pemasukan";
		$result= $this->db->query($sql); 

		// return $result->row()->masuk;
		return $result->result();
	}

	function get_keluar(){
		$sql= "SELECT sum(dana_keluar) as keluar from t_pengeluaran";
		$result= $this->db->query($sql); 

		// return $result->row()->masuk;
		return $result->result();
	}

	function get_saldo(){
		$sql= "SELECT ((SELECT (SUM(dana_masuk)) FROM t_pemasukan) - (SELECT (SUM(dana_keluar)) FROM t_pengeluaran)) as saldo FROM DUAL";

		// SELECT SUM(t_pemasukan.dana_masuk), SUM(t_pengeluaran.dana_keluar), (sum(dana_masuk)-(SUM(dana_keluar))) as saldo from t_pemasukan INNER JOIN t_pengeluaran GROUP BY 

		$result= $this->db->query($sql); 

		// return $result->row()->masuk;
		return $result->result();
	}
}