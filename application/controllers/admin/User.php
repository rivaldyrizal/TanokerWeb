<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('m_user');

		$this->data['css']=array("vendors/google-code-prettify/bin/prettify.min.css",
							 "vendors/iCheck/skins/flat/green.css",
							 "vendors/nprogress/nprogress.css",
							 "vendors/bootstrap-daterangepicker/daterangepicker.css");

		$this->data['js']=array( 
								"vendors/iCheck/icheck.min.js", 
								"vendors/nprogress/nprogress.js",
								"vendors/fastclick/lib/fastclick.js");

		$users = $this->m_user->get_user();
		$this->data['list_user'] = $users;

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/user_view', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	public function input(){

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

		$this->load->view('global/login_header_view', $this->data);
		$this->load->view('backend/form_user', $this->data);
		$this->load->view('global/login_footer_view',$this->data);
	}

	function tambah_aksi(){

		$this->load->model('m_user');

		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('confirm_email');
		$password = $this->input->post('password2');
		$role = $this->input->post('role');
		$status = $this->input->post('status');
 
		$data = array(
			'nama_user' => $nama,
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'role' => $role,
			'is_active' => $status
			);
		$this->m_user->input_data($data,'t_user');
		redirect('admin/user/index');
	}
}