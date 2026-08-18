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
        $this->load->view('templates/toast');
        $this->load->view('templates/footer');
    }

    public function saveUser() {
        if($this->input->post('add')) {
            // Load CodeIgniter form validation library

            // Set validation rules
            $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[3]|max_length[20]|is_unique[tbl_users.username]');
            $this->form_validation->set_rules('firstname', 'First Name', 'required|trim');
            $this->form_validation->set_rules('middlename', 'Middle Name', 'trim');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[tbl_users.email]');
            $this->form_validation->set_rules('contactnumber', 'Contact Number', 'required|trim|numeric|min_length[11]|max_length[11]');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

            if ($this->form_validation->run() === FALSE) {
                // Strip HTML tags so htmlspecialchars() in Toastify outputs clean text
                $errorMessage = strip_tags(validation_errors('', ' '));
                
                // Pass clean error string to notify flashdata
                $this->notify->error($errorMessage);
                redirect('AdminController');
            } else {
                // Sanitize inputs and hash the password
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
                    $this->notify->success('User registered successfully!');
                    redirect('AdminController');
                } else {
                    $this->notify->error('Failed to register user. Please try again.');
                    redirect('AdminController');
                }
            }
        }
    }
}