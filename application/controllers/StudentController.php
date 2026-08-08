<?php
class StudentController extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['students'] = $this->StudentModel->getAllStudent();
        $this->load->view("student", $data);
    }

    public function saveStudent() {
        if($this->input->post('submit')) {
            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'yearlevel' => $this->input->post('yearlevel'),
                'course' => $this->input->post('course')
            ];

            $result = $this->StudentModel->addStudent($data);

            if($result) {
                redirect('StudentController', 'refresh');
            } else {
                echo "Error on Saving Student";
            }
        }
    }

    public function editStudent($id) {

    }

    public function deleteStudent($id) {

    }
}