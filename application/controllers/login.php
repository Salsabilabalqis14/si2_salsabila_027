<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Login extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model'); 
    }

    function index() { 
        $this->load->view('login_view');
    }

    function login_action() { 
        $username = $this->input->post('username'); 
        $password = $this->input->post('password'); 
        $where1 = array(
            'username' => $username, 
            'password' => $password,
            'status' => 1
        );

        $where2 = array(
            'username' => $username, 
            'password' => $password,
            'status' => 0
        );

        $cek1 = $this->login_model->cek_login("user", $where1)->num_rows(); 
        if($cek1 > 0) { 
            $data_session = array( 
                'nama' => $username, 
                'status' => "login" 
            );
            $this->session->set_userdata($data_session);
                redirect(base_url('admin'));
        }       
        else {
            echo "Username dan password salah!";
        } 
        
        $cek2 = $this->login_model->cek_login("user", $where2)->num_rows(); 
        if($cek2 > 0) { 
            $data_session = array( 
                'nama' => $username, 
                'status' => "login" 
            );
            $this->session->set_userdata($data_session);
                redirect(base_url('user'));
        }       
        else {
            echo "Username dan password salah!";
        }
    }  
    
    function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}