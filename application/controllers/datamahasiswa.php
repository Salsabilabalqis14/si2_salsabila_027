<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller {
	public function index()
	{
        $data = $this->db->query("select * from tbl_mahasiswa");
        foreach ($data->result_array() as $mahasiswa)
        {
            echo "Nama : ".$mahasiswa['nama_mhs']."</br>";
            echo "Kom : ".$mahasiswa['kom_mhs']."</br>";
        }
	}
}

