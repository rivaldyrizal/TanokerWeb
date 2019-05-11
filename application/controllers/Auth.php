<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->library('form_validation');
	}
	
	public function index()
	{
				
		$this->load->view('login');
	}

	function login()  
      {  
           //http://localhost/tutorial/codeigniter/main/login  
           $data['title'] = 'CodeIgniter Simple Login Form With Sessions';  
           $this->load->view("login", $data);  
      }

      function login_validation()  
      {  
           $this->load->library('form_validation');  

           $this->form_validation->set_rules('username', 'Username', 'required');  

           $this->form_validation->set_rules('password', 'Password', 'required');  

           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('m_login');  
                if($this->m_login->can_login($username, $password))  
                {  
                     $session_data = array(  
                          'username' => $username  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'welcome/home');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'auth/login');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  

function enter(){  
	   if($this->session->userdata('username') != '')  
	   {  
	        echo base_url('welcome/home'); 
	   }  
	   else  
	   {  
	        redirect(base_url() . 'auth/login');  
	   }  
	}

function logout()  
  {  
       $this->session->unset_userdata('username');  
       redirect(base_url() . 'auth/login');  
  }  
}
