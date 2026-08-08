<?php
class StudentModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function addStudent($data) {
        return $this->db->insert('tbl_students', $data);
    }

    public function getAllStudent() {
        return $this->db->get('tbl_students')->result();
    }
    
}