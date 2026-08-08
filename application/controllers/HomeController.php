<?php
class HomeController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$data['title'] = "Home";
        $data['currentPage'] = "home";

        if (!$this->session->userdata('username')) {
            redirect('auth/signin');
        }

        if(!empty($this->session->userdata('username'))) {
            $data['username'] = $this->session->userdata('username');
        }
        
        $this->load->view("templates/header", $data);
        $this->load->view("templates/navbar", $data);
    	$this->load->view('pages/homepage');
    	$this->load->view('templates/footer');
    }
}