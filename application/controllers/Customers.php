<?php
class Customers extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Customers_model');
    }

    public function index(){
        $judul['title'] = "Kelola Customers";
        $this->load->view('Dashboard/sidebar', $judul);
        $this->load->view('Dashboard/topbar');
        $this->load->view('Customers/content');
        $this->load->view('Dashboard/footer');
    }

    public function showPelanggan(){
        $tampilPelanggan = $this->Customers_model->tampilkanSemua();
        echo json_encode($tampilPelanggan);
    }

    public function tambahBaru(){
        // $('[name="idPelanggan"]').val("");
        // $('[name="namaPelanggan"]').val("");
        // $('[name="daya"]').val("");
        // $('[name="jenis"]').val("");
		$idPelanggan = $this->input->post('idPelanggan');
		$namaPelanggan = $this->input->post('namaPelanggan');
		$daya = $this->input->post('daya');
		$jenis = $this->input->post('jenis');
		$data = $this->Customers_model->doneTambahBaru($idPelanggan, $namaPelanggan, $daya, $jenis);
		echo json_encode($data);
    }
}