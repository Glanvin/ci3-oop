<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif {

    protected $CI;

    public function __construct() {
        // Get CodeIgniter instance and load session library
        $this->CI =& get_instance();
    }

    /**
     * Set a success notification message
     */
    public function success($message) {
        $this->CI->session->set_flashdata('success', $message);
    }

    /**
     * Set an error notification message
     */
    public function error($message) {
        $this->CI->session->set_flashdata('error', $message);
    }

    /**
     * Set an informational notification message
     */
    public function info($message) {
        $this->CI->session->set_flashdata('info', $message);
    }
}