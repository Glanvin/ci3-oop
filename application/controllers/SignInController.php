<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
                if($result['password'] == $this->input->post('password')) {
                    $session = [
                        'username' => $result['username'],
                        'role' => $result['role'],

                    ];
                    $this->session->set_userdata($session);
                    $this->toastify->success("Welcome Back {$this->session->userdata('username')}!");
                    redirect('HomeController', 'refresh');
                }else {
                    $this->toastify->error('Invalid Password');
                    redirect('SignInController', 'refresh'); 
                }
            }else {
                $this->toastify->error('Username does not exist!');
                redirect('SignInController', 'refresh');
            }
        }
    }
}