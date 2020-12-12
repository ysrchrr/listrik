<?php
class Dashboard extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
    }
    
    public function index(){
        $data['title'] = "Dashboard";
        $this->load->view('Dashboard/sidebar', $data);
        $this->load->view('Dashboard/topbar');
        $this->load->view('Dashboard/content');
        $this->load->view('Dashboard/footer');
    }
}