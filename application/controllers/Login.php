<?php
class Login extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('Users_model');
    }
    function index(){
        $this->load->view('login');
    }

    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->posT('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->Users_model->cek_login('user', $where)->num_rows();
        if($cek > 0){
            $data_session = array(
                'username' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect(base_url());
        } else {
            echo "Username dan password salah";
        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
}