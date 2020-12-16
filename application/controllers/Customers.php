<?php
class Customers extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customers_model');
    }

    public function index()
    {
        $judul['title'] = "Kelola Customers";
        $this->load->view('Dashboard/sidebar', $judul);
        $this->load->view('Dashboard/topbar');
        $this->load->view('Customers/content');
        $this->load->view('Dashboard/footer');
        //
    }

    public function showPelanggan()
    {
        $tampilPelanggan = $this->Customers_model->tampilkanSemua();
        echo json_encode($tampilPelanggan);
    }

    public function tambahBaru()
    {
        $idPelanggan = $this->input->post('idPelanggan');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $daya = $this->input->post('daya');
        $jenis = $this->input->post('jenis');
        $data = $this->Customers_model->doneTambahBaru($idPelanggan, $namaPelanggan, $daya, $jenis);
        echo json_encode($data);
    }

    public function hapusData()
    {
        $id = $this->input->post('kode');
        $data = $this->Customers_model->doneHapusData($id);
        echo json_encode($data);
    }

    public function detailPelanggan()
    {
        $idne = $this->input->get('id');
        $data = $this->Customers_model->getDetailPelanggan($idne);
        echo json_encode($data);
    }

    public function updatePelanggan()
    {
        $idPelanggan = $this->input->post('idPelanggan');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $daya = $this->input->post('daya');
        $jenis = $this->input->post('jenis');
        $bulanIni = $this->input->post('bulanIni');
        // $data = $this->Customers_model->startUpdatePelanggan($idPelanggan, $namaPelanggan, $daya, $jenis, $bulanIni);

        $data_1 = array(
            'namaPelanggan' => $namaPelanggan,
            'daya' => $daya,
            'jenis' => $jenis,
            'bulanIni' => $bulanIni
        );

        $this->db->where('idPelanggan', $idPelanggan);
        $this->db->update('pelanggan', $data_1);

        $data = array(
            'sukses' => 'sukses'
        );

        echo json_encode($data);
    }
}
