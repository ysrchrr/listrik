<?php
class Rekap extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('Rekap_model');
    }
    
    public function listrik(){
        $data['title'] = "Rekap Listrik";
        $data['pembayaran'] = $this->Rekap_model->tampilkanSemua();
        $this->load->view('R_Listrik/sidebar', $data);
        $this->load->view('R_Listrik/topbar');
        $this->load->view('R_Listrik/content');
        $this->load->view('R_Listrik/footer');
    }
}