<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notify {

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

    /**
     * Render active flashdata as Bootstrap 5.3 Alerts
     */
    public function render() {
        // Map session flashdata keys to Bootstrap 5.3 contextual alert classes
        $types = [
            'success' => 'alert-success',
            'error'   => 'alert-danger',
            'info'    => 'alert-info'
        ];

        $html = '';

        foreach ($types as $key => $bsClass) {
            $message = $this->CI->session->flashdata($key);
            if ($message) {
                $html .= '
                <div class="alert ' . $bsClass . ' alert-dismissible fade show" role="alert">
                    ' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }

        return $html;
    }
}