<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class data_IndPlaces extends CI_Controller {
    public function __construct() { 
        parent::__construct();
        $this->load->model('data_IndPlaces_model');
    }

    public function index() {
        $data['data_indplaces'] = $this->data_IndPlaces_model->view();
        $this->load->view('data_IndPlaces_view', $data);
    }

    public function tambah() {
        $data = array();
        if($this->input->post('submit')) {
            $upload = $this->data_IndPlaces_model->upload();
            if($upload['result'] == "success") {
                $this->data_IndPlaces_model->save($upload); 
                redirect('data_IndPlaces');
            } 
            else {
                $data['message'] = $upload['error'];
            }
        }
        $this->load->view('form_IndPlaces', $data);
    }
}
?>