<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	

	function get_berita(){
		$this->db->select('t_event.id_event, t_event.nama_event, t_event.desk_event, t_event.img_event, t_event.event_mulai, t_event.event_selesai');
		$this->db->from('t_event');
		$query = $this->db->get();

		return $query->result();
	}

function get_joinBerita($id=null){
		$this->db->select('t_berita.id_berita, t_user.nama_user, t_berita.nama_berita, t_berita.deks_berita, t_berita.create_date, t_berita.img_berita');
		$this->db->from('t_berita');
		$this->db->join('t_user', 't_user.id_user = t_berita.id_user');
		
		if ($id != null) {
			$this->db->where('t_berita.id_berita', $id);
		}
		
		$query = $this->db->get();

		return $query->result();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($id=null){
		return $this->db->delete('t_berita', array('id_berita' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id

	}
	
}