<?php
class UserModel extends CI_Model {
    public function __construct() {
        return parent::__construct();
    }

    public function addUser($data) {
        return $this->db->insert('tbl_users', $data);
    }

    public function getAllUsers() {
        return $this->db->get('tbl_users')->result();
    }

    public function findUser($data) {
        $result = $this->db->get_where('tbl_users', $data);
        if($result->num_rows() == 1) {
            return $result->row_array();
        }
        return false;
    }

    public function editUser($id, $data) {
        return $this->db->update('tbl_users', $data, ['id' => $id]);
    }

    public function deleteUser($id) {
        return $this->db->delete('tbl_users', ['id' => $id]);
    }
}