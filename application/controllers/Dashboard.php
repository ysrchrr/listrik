<?php
class Dashboard extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
    }
    
    public function index(){
        $data['title'] = "Dashboard";
        $this->load->view('page/sidebar', $data);
        $this->load->view('page/topbar');
        $this->load->view('page/content');
        $this->load->view('page/footer');
    }
}