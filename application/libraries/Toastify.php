<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toastify {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    /**
     * Set a success toast message
     */
    public function success($message) {
        $this->CI->session->set_flashdata('toast_success', $message);
    }

    /**
     * Set an error toast message
     */
    public function error($message) {
        $this->CI->session->set_flashdata('toast_error', $message);
    }

    /**
     * Set an informational toast message
     */
    public function info($message) {
        $this->CI->session->set_flashdata('toast_info', $message);
    }

    /**
     * Render active flashdata as Bootstrap 5.3 Toasts
     */
    public function render() {
        $types = [
            'toast_success' => 'text-bg-success',
            'toast_error'   => 'text-bg-danger',
            'toast_info'    => 'text-bg-info'
        ];

        $toasts = '';

        foreach ($types as $key => $bsClass) {
            $message = $this->CI->session->flashdata($key);
            if ($message) {
                $toasts .= '
                <div class="toast align-items-center ' . $bsClass . ' border-0 fade show m-3" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            ' . $message . '
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>';
            }
        }

        if (empty($toasts)) {
            return '';
        }

        return '
        <div class="toast-container top-0 end-0" style="z-index: 1090;">
            ' . $toasts . '
        </div>';
    }
}