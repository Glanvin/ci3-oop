<?php
class SignInController extends CI_Controller {
    public function __construct() {
        return parent::__construct();
    }

    public function index() {
        $data['title'] = 'Sign In';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/notify');
        $this->load->view('auth/signinpage');
    }

    public function check() {
        if($this->input->post('signin')) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];
            $result = $this->UserModel->findUser($data);
            if($result) {
                $session = [
                    'username' => $result['username']
                ];
                $this->session->set_userdata($session);
                $this->notify->success("Welcome Back {$this->session->userdata('username')}!");
                redirect('HomeController', 'refresh');
            }else {
                $this->notify->error('Invalid Credentials');
                redirect('SignInController', 'refresh');
            }
        }
    }
}