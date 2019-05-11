<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
		$this->load->model('m_pengeluaran');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js");

		$pengeluaran = $this->m_pengeluaran->get_pengeluaran();
		$this->data['list_pengeluaran'] = $pengeluaran;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/pengeluaran', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function input(){
		$this->load->model('m_pengeluaran');

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
		$pengeluaran = $this->m_pengeluaran->get_pengeluaran();
		$this->data['list_pengeluaran'] = $pengeluaran;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_pengeluaran', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	function tambah_aksi(){

		$this->load->model('m_pengeluaran');

		$dana_keluar = $this->input->post('dana');
		$ket_keluar = $this->input->post('keterangan');
		$tgl_keluar = $this->input->post('tanggal');
 
		$data = array(
			'dana_keluar' => $dana_keluar,
			'ket_keluar' => $ket_keluar,
			'tgl_keluar' => $tgl_keluar
			);
		$this->m_pengeluaran->input_data($data,'t_pengeluaran');
		redirect('admin/pengeluaran/index');
	}

	function delete_aksi($id=null){
		$this->load->model('m_pengeluaran');
		
		$this->m_pengeluaran->delete_data($id);
		redirect('admin/pengeluaran/index');

	}

}