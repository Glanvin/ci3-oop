<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class BaseController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'title' => '',
            'currentPage' => '',
        ];
        
        $username = $this->session->userdata('username');

        if (!$username) {
            redirect('auth/signin');
        }

        $result = $this->UserModel->findUser(['username' => $username]);
        if(!$result || $result['username'] !== $username) {
            redirect('auth/signin');
        }

        if(!empty($this->session->userdata('username'))) {
            $data['username'] = $this->session->userdata('username');
        }
    }
}