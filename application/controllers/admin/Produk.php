<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
		$this->load->model('m_produk');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							"vendors/select2/dist/css/select2.min.css",
							"vendors/switchery/dist/switchery.min.css",
							"vendors/starrr/dist/starrr.css");

		$this->data['js']=array("vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js",
								"vendors/jquery.hotkeys/jquery.hotkeys.js",
								"vendors/google-code-prettify/src/prettify.js",
								"vendors/jquery.tagsinput/src/jquery.tagsinput.js",
							"vendors/switchery/dist/switchery.min.js",
							"vendors/select2/dist/js/select2.full.min.js",
							"vendors/parsleyjs/dist/parsley.min.js",
							"vendors/autosize/dist/autosize.min.js",
							"vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js",
							"vendors/starrr/dist/starrr.js");

		$produk = $this->m_produk->get_produk();
		$this->data['list_produk'] = $produk;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/produk', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function input(){

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css", "vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js", "vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js", "parsley.min.js");

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_produk', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	function tambah_aksi(){

		$this->load->model('m_produk');

		$nama = $this->input->post('nama');
		$konten = $this->input->post('deskripsi');
		$harga = $this->input->post('harga');
		$gambar = $this->input->post('gambar');
 
		$data = array(
			'nama_produk' => $nama,
			'desk_produk' => $konten,
			'harga_produk' => $harga,
			'img_produk' => $gambar,
			);
		$this->m_produk->input_data($data,'t_produk');
		redirect('admin/produk/index');
	}

	function delete_aksi($id=null){
		$this->load->model('m_produk');
		
		$this->m_produk->delete_data($id);
		redirect('admin/produk/index');

	}
}