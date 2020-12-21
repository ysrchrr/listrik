<?php
class Rekap extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Rekap_model');
    }
    
    public function listrik(){
      $judul = array(
        'title'=> "Rekap Listrik",
        'status' => "active",
        'col' => "collapsed"
      );
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

    public function getRekapBulanan(){
      $ngene = $this->input->post('ngene');
      $data = $this->Rekap_model->dataBulanan($ngene);
      echo json_encode($data);
    }

    public function allRecord(){
      $ngene = $this->input->post('ngene');
      $tampilPelanggan = $this->Rekap_model->allRecords($ngene);
      echo json_encode($tampilPelanggan);
    }

    public function rekapKeseluruhan(){
      $judul['title'] = "Rekap Keseluruhan";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_Listrik/rekapKeseluruhan');
      $this->load->view('Dashboard/footer');
    }
      
    public function getrekapKeseluruhan(){
      $tampilPelanggan = $this->Rekap_model->dataSemua();
      echo json_encode($tampilPelanggan);
    }

    public function showListrik(){
      $tampilPelanggan = $this->Rekap_model->tampilkanSemua();
      echo json_encode($tampilPelanggan);
    }

    public function showIndihome(){
      $tampilPelanggan = $this->Rekap_model->tampilkanIndihome();
      echo json_encode($tampilPelanggan);
    }

    public function showPDAM(){
      $tampilPelanggan = $this->Rekap_model->tampilkanPDAM();
      echo json_encode($tampilPelanggan);
    }

    public function getData(){
      $id = $this->input->get('id');
      $data = $this->Rekap_model->goGetData($id);
      echo json_encode($data);
    }

    public function addTagihan(){
      $idPelanggan = $this->input->post('idPelanggan');
      $tanggal = $this->input->post('tanggal');
      $keTokped = $this->input->post('keTokped');
      $kePerson = $this->input->post('kePerson');
      $total = $this->input->post('total');
      $data = $this->Rekap_model->goAddTagihan($idPelanggan, $tanggal, $keTokped, $kePerson, $total);
      echo json_encode($data);
    }

    public function indihome(){
      $judul['title'] = "Rekap Indihome";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_Indihome/content');
      $this->load->view('Dashboard/footer');
    }

    public function rekapIndihome(){
      $judul['title'] = "Rekap Indihome";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_Indihome/rekapIndihome');
      $this->load->view('Dashboard/footer');
    }

    public function getRekapIndihome(){
      $tampilPelanggan = $this->Rekap_model->allIndihome();
      echo json_encode($tampilPelanggan);
    }

    public function pdam(){
      $judul['title'] = "Rekap PDAM";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_PDAM/content');
      $this->load->view('Dashboard/footer');
    }

    public function getRekapPDAM(){
      $tampilPelanggan = $this->Rekap_model->allPDAM();
      echo json_encode($tampilPelanggan);
    }

    public function rekapPDAM(){
      $judul = array(
        'title'=> "Rekap PDAM",
        'status' => "dqd"
      );
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('R_PDAM/rekapPDAM');
      $this->load->view('Dashboard/footer');
    }

    public function umum(){
      $judul['title'] = "Seluruh Rekapan Bulanan";
      $this->load->view('Dashboard/sidebar', $judul);
      $this->load->view('Dashboard/topbar');
      $this->load->view('rekapumum');
      $this->load->view('Dashboard/footer');
    }

    public function getSummary(){
      $tgl = $this->input->post('ngene');
      $tampilPelanggan = $this->Rekap_model->lsummary($tgl);
      echo json_encode($tampilPelanggan);
    }
}