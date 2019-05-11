<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {

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

	function __construct(){
		parent::__construct();		
		$this->load->model('m_pemasukan');
		$this->load->helper('url');
 
	}
	public function index(){
		$this->load->model('m_pemasukan');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js");

		$pemasukan = $this->m_pemasukan->get_pemasukan();
		$this->data['list_pemasukan'] = $pemasukan;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/pemasukan', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function input(){
		$this->load->model('m_pemasukan');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css",
							 "vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js",
								"vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js",
								"parsley.min.js");
		$this->data['datetimepicker'] = true;

		$pemasukan = $this->m_pemasukan->get_pemasukan();
		$this->data['list_pemasukan'] = $pemasukan;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_pemasukan', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	function tambah_aksi(){

		$this->load->model('m_pemasukan');

		$dana_masuk = $this->input->post('dana');
		$ket_masuk = $this->input->post('keterangan');
		$tgl_masuk = $this->input->post('tanggal');
 
		$data = array(
			'dana_masuk' => $dana_masuk,
			'ket_masuk' => $ket_masuk,
			'tgl_masuk' => $tgl_masuk
			);
		$this->m_pemasukan->input_data($data,'t_pemasukan');
		redirect('admin/pemasukan/index');
	}

	function delete_aksi($id=null){
		$this->load->model('m_pemasukan');
		
		$this->m_pemasukan->delete_data($id);
		redirect('admin/pemasukan/index');

	}
}