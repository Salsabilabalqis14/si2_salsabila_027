<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataPlaces extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->model('data_model');

        $data = $this->data_model->GetData('data_places');
        $data = array('data' => $data);

        $this->load->view('dataPlaces_view', $data);
    }

    public function add_data(){ 
        $this->load->view('formAdd_dataPlaces_view'); 
    }

    public function insert(){ 
        $this->load->model('data_model');

        $this->form_validation->set_rules('nama_tempat', 'Nim', 'required' ); 
        $this->form_validation->set_rules('provinsi', 'Nama', 'required', array('required' => 'Nama harus diisi')); 
        $this->form_validation->set_rules('negara', 'Kom', 'required'); 
        $this->form_validation->set_rules('rating', 'Kom', 'required'); 
        $this->form_validation->set_rules('deskripsi', 'Kom', 'required'); 

        if ($this->form_validation->run() == TRUE) {
            $data = array( 
                'nama_tempat' => $this->input->post('nama_tempat'), 
                'provinsi' => $this->input->post('provinsi'), 
                'negara' => $this->input->post('negara'), 
                'rating' => $this->input->post('rating'), 
                'deskripsi' => $this->input->post('deskripsi') 
                ); 
    
            $data = $this->data_model->Insert('data_places', $data); 
            redirect(base_url('dataPlaces'),'refresh');
        }
        else {
            $this->load->view('formAdd_dataPlaces');
        }
    }

    public function delete_data($id){ 
        $id = array('id' => $id); 
        $this->load->model('data_model'); 
        $this->data_model->Delete('data_places', $id); 
        redirect(base_url('dataPlaces'),'refresh');
    }

    public function edit_data($id){ 
        $this->load->model('data_model'); 
        $places = $this->data_model->GetWhere('data_places', array('id' => $id)); 
        $data = array( 
        'id' => $places[0]['id'], 
        'nama_tempat' => $places[0]['nama_tempat'], 
        'provinsi' => $places[0]['provinsi'], 
        'negara' => $places[0]['negara'], 
        'rating' => $places[0]['rating'], 
        'deskripsi' => $places[0]['deskripsi'], 
        ); 
        $this->load->view('formEdit_dataPlaces_view', $data);
    }

    public function update_data(){
        $id = $_POST['id']; 
        $nama_tempat = $_POST['nama_tempat']; 
        $provinsi = $_POST['provinsi']; 
        $negara = $_POST['negara']; 
        $rating = $_POST['rating']; 
        $deskripsi = $_POST['deskripsi']; 
        $data = array( 
        'id' => $id, 
        'nama_tempat' => $nama_tempat, 
        'provinsi' => $provinsi, 
        'negara' => $negara, 
        'rating' => $rating, 
        'deskripsi' => $deskripsi 
        ); 
        $where = array('id' => $id); 
        $this->load->model('data_model'); 
        $res = $this->data_model->Update('data_places', $data, $where); if ($res>0) {
            redirect(base_url('dataPlaces'), 'refresh');
        }
    }
}