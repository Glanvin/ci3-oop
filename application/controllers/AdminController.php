<?php

class AdminController extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

    public function index() {
    	$data = [
            'title' => 'Admin',
            'currentPage' => 'admin',
            'users' => $this->UserModel->getAllUsers()
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
        
        $this->load->view("templates/header", $data);
        $this->load->view("templates/navbar", $data);
    	$this->load->view('pages/admin/userspage');
    	$this->load->view('templates/footer');
    }

    public function saveUser() {
        if($this->input->post('save')) {
            $data = [
                'username' => $this->input->post('username'),
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'contactnumber' => $this->input->post('contactnumber'),
                'address' => $this->input->post('address'),
                'password' => $this->input->post('password'),
            ];
            $result = $this->UserModel->addUser($data);
            if($result) {
            	$this->notifier->success('User registered successfully! Please sign in.');
            	redirect('AdminController');
        	} else {
            	$this->notifier->error('Failed to register user. Please try again.');
            	redirect('AdminController');
            }
        }
    }
}