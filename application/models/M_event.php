<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_event(){
		$this->db->select('t_event.id_event, t_event.nama_event, t_event.desk_event, t_event.img_event, t_event.event_mulai, t_event.event_selesai');
		$this->db->from('t_event');
		$query = $this->db->get();

		return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($id=null){
		return $this->db->delete('t_event', array('id_event' => $id)); 
	}
	
}