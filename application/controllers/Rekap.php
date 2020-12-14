<?php
class Rekap extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Rekap_model');
    }
    
    public function listrik(){
        $judul['title'] = "Rekap Listrik";
        $this->load->view('Dashboard/sidebar', $judul);
        $this->load->view('Dashboard/topbar');
        $this->load->view('R_Listrik/content');
        $this->load->view('Dashboard/footer');
      }
      
      public function showListrik(){
        $tampilPelanggan = $this->Rekap_model->tampilkanSemua();
        echo json_encode($tampilPelanggan);
      }
}