<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function Insert($table,$data){ 
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel 
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res 
    }
}