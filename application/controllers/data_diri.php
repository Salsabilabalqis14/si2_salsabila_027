<?php
    class Data_diri extends CI_Controller { 
        public function index()
        {
            $this->load->view('template/header');
            $this->load->view('data_diri');
            $this->load->view('template/footer');
        }
    }