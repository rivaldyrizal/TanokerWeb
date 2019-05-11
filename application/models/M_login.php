<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

function can_login($username, $password) {  

    // $this->db->select('username, password');
    // $this->db->from('t_user');

     $this->db->where('username', $username);  
     $this->db->where('password', $password);  
     $query = $this->db->get('t_user');  
     //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
     if($query->num_rows() > 0)  
     {  
          return true;  
     }  
     else  
     {  
          return false;       
     }  
  }  
}