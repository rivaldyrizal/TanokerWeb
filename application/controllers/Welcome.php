<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							"vendors/select2/dist/css/select2.min.css",
							"vendors/switchery/dist/switchery.min.css",
							"vendors/starrr/dist/starrr.css");

		$this->data['js']=array("bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js",
								"vendors/jquery.hotkeys/jquery.hotkeys.js",
								"vendors/google-code-prettify/src/prettify.js",
								"vendors/jquery.tagsinput/src/jquery.tagsinput.js",
							"vendors/switchery/dist/switchery.min.js",
							"vendors/select2/dist/js/select2.full.min.js",
							"vendors/parsleyjs/dist/parsley.min.js",
							"vendors/autosize/dist/autosize.min.js",
							"vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js",
							"vendors/starrr/dist/starrr.js");

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function kegiatan()
	{
		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							"vendors/select2/dist/css/select2.min.css",
							"vendors/switchery/dist/switchery.min.css",
							"vendors/starrr/dist/starrr.css");

		$this->data['js']=array("bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js",
								"vendors/jquery.hotkeys/jquery.hotkeys.js",
								"vendors/google-code-prettify/src/prettify.js",
								"vendors/jquery.tagsinput/src/jquery.tagsinput.js",
							"vendors/switchery/dist/switchery.min.js",
							"vendors/select2/dist/js/select2.full.min.js",
							"vendors/parsleyjs/dist/parsley.min.js",
							"vendors/autosize/dist/autosize.min.js",
							"vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js",
							"vendors/starrr/dist/starrr.js");

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_kegiatan', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function home(){
		$this->load->model('m_home');
		$this->load->model('m_berita');


		$this->data['css']=array('vendors/bootstrap-daterangepicker/daterangepicker.css');

		$this->data['js']=array();

		// pemasukan
		$dana_masuk = $this->m_home->get_masuk();
		$this->data['list_masuk'] = $dana_masuk;

		// pengeluaran
		$dana_keluar = $this->m_home->get_keluar();
		$this->data['list_keluar'] = $dana_keluar;

		// saldo
		$dana_saldo = $this->m_home->get_saldo();
		$this->data['list_saldo'] = $dana_saldo;

		// berita
		$berita = $this->m_berita->get_joinBerita();
		$this->data['list_berita'] = $berita;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/home', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	// public function event(){
	// 	$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
	// 						 "vendors/iCheck/skins/flat/green.css",
	// 						 "vendors/nprogress/nprogress.css",
	// 						 "vendors/bootstrap-daterangepicker/daterangepicker.css");

	// 	$this->data['js']=array( 
	// 							"vendors/iCheck/icheck.min.js", 
	// 							"vendors/nprogress/nprogress.js",
	// 							"vendors/fastclick/lib/fastclick.js");

	// 	$this->load->view('global/login_header_view', $this->data);
	// 	$this->load->view('backend/event', $this->data);
	// 	$this->load->view('global/login_footer_view',$this->data);
	// }

	// public function berita(){
	// 	$this->data['css']=array("vendors/iCheck/skins/flat/green.css",
	// 						 "vendors/nprogress/nprogress.css",
	// 						 "vendors/bootstrap-daterangepicker/daterangepicker.css");

	// 	$this->data['js']=array( 
	// 							"vendors/iCheck/icheck.min.js");
		
	// 	$this->load->view('global/login_header_view', $this->data);
	// 	$this->load->view('backend/berita', $this->data);
	// 	$this->load->view('global/login_footer_view',$this->data);
	// }
}