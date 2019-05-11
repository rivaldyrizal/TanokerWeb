<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index(){
		$this->load->model('m_berita');

		$this->data['css']=array("vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js");

		$berita = $this->m_berita->get_joinBerita();
		$this->data['list_berita'] = $berita;
		
		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/berita', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function input(){
		$this->load->model('m_berita');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css", "vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js", "vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js", "parsley.min.js");

		$this->data['datetimepicker'] = true;

		$berita = $this->m_berita->get_joinBerita();
		$this->data['list_berita'] = $berita;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_berita', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	function tambah_aksi(){

		$this->load->model('m_berita');

		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$konten = $this->input->post('konten');
		$tanggal = $this->input->post('tanggal');
 
		$data = array(
			'id_user' => $id,
			'nama_berita' => $nama,
			'deks_berita' => $konten,
			'create_date' => $tanggal
			);
		$this->m_berita->input_data($data,'t_berita');
		redirect('admin/berita/index');
	}

	function delete_aksi($id=null){
		$this->load->model('m_berita');
		
		$this->m_berita->delete_data($id);
		redirect('admin/berita/index');

	}
}