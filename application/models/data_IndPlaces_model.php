<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class data_IndPlaces_model extends CI_Model {
    public function view() {
        return $this->db->get('data_indplaces')->result();
    }

    public function upload() {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config); 
        if($this->upload->do_upload('input_gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } 
        else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors()); 
            return $return;
        }
    }

    public function save($upload) {
        $data = array(
            'nama_file' => $upload['file']['file_name'], 
            'nama_tempat' => $this->input->post('nama_tempat'),  
            'lokasi' => $this->input->post('lokasi'),
        );
        $this->db->insert('data_indplaces', $data); 
    } 
} ?>
