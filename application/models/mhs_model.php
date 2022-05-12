<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {
	public function GetMahasiswa()
	{
        $data = $this->db->query("select * from tbl_mahasiswa");
        return $data->result_array();
	}
}

