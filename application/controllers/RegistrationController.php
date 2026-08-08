<?php
class RegistrationController extends CI_Controller {
    public function __construct() {
        return parent::__construct();
    }

    public function index() {
        $data['title'] = 'Account Registration';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/registrationpage');
    }

    public function registerUser() {
        if($this->input->post('register')) {
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
                redirect('SignInController');
            }
        }
    }
}