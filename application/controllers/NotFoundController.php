<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotFoundController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = "Page Not Found";
        $this->load->view('templates/header', $data);
        $this->load->view('errors/custom/error_404');
        $this->load->view('templates/footer');
    }
}