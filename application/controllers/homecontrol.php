<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeControl extends CI_Controller {
	public function view_profil()
	{
		$this->load->view('profil');
	}

    public function detail_produk($id_produk1, $id_produk2)
	{
		echo 'id produk1: '.$id_produk1;
        echo '</br>';
		echo 'id produk2: '.$id_produk2;

	}

}
