<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationController extends CI_Controller {
    public function __construct() {
        return parent::__construct();
    }

    public function index() {
        $data['title'] = 'Account Registration';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/notify');
        $this->load->view('auth/registrationpage');
    }

    public function registerUser() {
        if ($this->input->post('register')) {

            // Validation Rules
            $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[20]|is_unique[tbl_users.username]');
            $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('middlename', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('contactnumber', 'Contact Number', 'required|trim|numeric|min_length[11]|max_length[11]');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run() === FALSE) {
                // Strip HTML tags so htmlspecialchars() in Toastify render() outputs clean text
                $errorMessage = validation_errors('<li>', '*</li>');

                // Pass error string to Toastify error flashdata
                $this->toastify->error("<ul class='mb-0 ps-3 list-unstyled'>{$errorMessage}</ul>");
                $this->index();// To save inputted data
            } else {
                $data = [
                    'username' => strtolower($this->input->post('username')),
                    'firstname' => ucfirst($this->input->post('firstname')),
                    'middlename' => ucfirst($this->input->post('middlename')),
                    'lastname' => ucfirst($this->input->post('lastname')),
                    'email' => lcfirst($this->input->post('email')),
                    'contactnumber' => $this->input->post('contactnumber'),
                    'address' => $this->input->post('address'),
                    'password' => $this->input->post('password'),
                ];

                $result = $this->UserModel->addUser($data);

                if ($result) {
                    $this->toastify->success('Successfully Registered!');
                    redirect('SignInController');
                } else {
                    $this->toastify->error('User cannot be Registered!');
                    redirect('RegistrationController', 'refresh');
                }
            }
        }
    }
}