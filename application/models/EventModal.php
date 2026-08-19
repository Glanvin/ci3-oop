<?php
class EventModal extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getAllEvents() {
        return $this->db-get('tbl_events')->result();
    }

    public function addEvent($data) {
        return $this->db->insert('tbl_events', $data);
    }

    public function editEvent($id, $data) {
        return $this->db->update('tbl_events', $data, ['id' => $id]);
    }

    public function deleteEvent($id) {
        return $this->db->delete('tbl_events', $id);
    }
}