<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$this->load->model('m_event');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js");

		$events = $this->m_event->get_event();
		$this->data['list_event'] = $events;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/event', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function input(){
		$this->load->model('m_event');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css", "vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js", "vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js", "parsley.min.js");

		$this->data['datetimepicker'] = true;

		$event = $this->m_event->get_event();
		$this->data['list_event'] = $event;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_event', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	function tambah_aksi(){

		$this->load->model('m_event');

		$nama = $this->input->post('nama');
		$konten = $this->input->post('konten');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$tanggal_selesai = $this->input->post('tanggal_selesai');
 
		$data = array(
			'nama_event' => $nama,
			'desk_event' => $konten,
			'event_mulai' => $tanggal_mulai,
			'event_selesai' => $tanggal_selesai,
			);
		$this->m_event->input_data($data,'t_event');
		redirect('admin/event/index');
	}

	function delete_aksi($id=null){
		$this->load->model('m_event');
		
		$this->m_event->delete_data($id);
		redirect('admin/event/index');

	}
	
}