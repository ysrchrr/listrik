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

    public function rekapBulanan(){
      $judul['title'] = "Rekap Bulanan";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_Listrik/rekapBulanan');
      $this->load->view('Dashboard/footer');
    }

    public function rekapKeseluruhan(){
      $judul['title'] = "Rekap Bulanan";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_Listrik/content');
      $this->load->view('Dashboard/footer');
    }
      
    public function showListrik(){
      $tampilPelanggan = $this->Rekap_model->tampilkanSemua();
      echo json_encode($tampilPelanggan);
    }

    public function getData(){
      $id = $this->input->get('id');
      $data = $this->Rekap_model->goGetData($id);
      echo json_encode($data);
    }

    public function addTagihan(){
      // $('[id="ValidasiNama"]').val("");
      // $('[id="idPelanggan"]').val("");
      // $('[id="daya"]').val("");
      // $('[id="tokopedia"]').val("");
      // $('[id="persons"]').val("");
      $idPelanggan = $this->input->post('idPelanggan');
      $tanggal = $this->input->post('tanggal');
      $keTokped = $this->input->post('keTokped');
      $kePerson = $this->input->post('kePerson');
      $status = $this->input->post('status');
      $data = $this->Rekap_model->goAddTagihan($idPelanggan, $tanggal, $keTokped, $kePerson, $status);
      echo json_encode($data);
    }
}