<?php
class Dashboard extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('Dashboard_model');
    }
    
    public function index(){
        $judul = array(
          'title'=> "Dashboard",
          'status' => "active",
          'col' => "collapsed"
        );
        $this->load->view('Dashboard/sidebar', $judul);
        $this->load->view('Dashboard/topbar');
        $this->load->view('Dashboard/content');
        $this->load->view('Dashboard/footer');
    }
}