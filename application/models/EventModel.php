<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fetch all events from the database
    public function get_all_events() {
        $this->db->order_by('event_id', 'DESC');
        $query = $this->db->get('tbl_events');
        return $query->result_array();
    }

    public function get_upcoming_events() {
        $today = date('Y-m-d');
        $this->db->where('start_date >=', $today);
        $this->db->order_by('start_date', 'ASC');
        $query = $this->db->get('tbl_events');
        return $query->result_array();
    }

    public function add_event($data) {
        return $this->db->insert('tbl_events', $data);
    }
}