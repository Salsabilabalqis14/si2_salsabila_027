<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {
	public function index()
	{
        $data['nama'] = 'Salsabila';
        $data['nim'] = '027';
        $data['kom'] = 'A';
		$this->load->view('welcome', $data);
	}
    public function hello1()
	{
		echo 'Ini dari hello 1';
	}
    public function hello2($nama)
	{
		echo 'Hello '.$nama;
	}
}
