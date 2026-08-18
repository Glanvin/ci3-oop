<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ModalController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function editModal() {
        if($this->input->post('editModal')) {
            $data = [
                'firstname' => $this->input->post('firstname'),
                'middlename' => $this->input->post('middlename'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'contactnumber' => $this->input->post('contactnumber'),
                'address' => $this->input->post('address'),
            ];
            $result = $this->UserModel->updateUser($data);
            if($result) {
                $this->notify->success("User updated successfully!");
                redirect('HomeController', 'refresh');
            }else {
                $this->notify->error('Failed to update user');
                redirect('HomeController', 'refresh');
            }
        }
    }
}