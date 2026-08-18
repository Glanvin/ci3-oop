<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignOutController extends CI_Controller {
    public function __construct() {
        return parent::__construct();
    }

    public function signOut() {
        $this->session->set_userdata(['username' => '']);
        $this->notify->success('User Signed Out');
        redirect('auth/signin');
    }
}