<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('registrasi_view');
    }

    public function insert(){ 
        $d = true;
        $this->load->model('registrasi_model');

        $this->form_validation->set_rules('username', 'username', 'required', array('required' => 'Username harus diisi')); 
        $this->form_validation->set_rules('nama', 'nama', 'required', array('required' => 'Nama harus diisi')); 
        $this->form_validation->set_rules('email', 'email', 'required|valid_email', array('required' => 'Email harus diisi')); 
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => 'Password harus diisi')); 
        $this->form_validation->set_rules('confPassword', 'confPassword', 'required|matches[password]', array('required' => 'Password tidak sama')); 

        if (($this->form_validation->run() == TRUE)) {
            $data = array( 
                'username' => $this->input->post('username'), 
                'nama' => $this->input->post('nama'), 
                'email' => $this->input->post('email'), 
                'password' => $this->input->post('password') 
                ); 
    
            $data = $this->registrasi_model->Insert('user', $data); 
            redirect(base_url('login'),'refresh');
        }
        else {
            $this->load->view('registrasi_view');
        }
    }
}

