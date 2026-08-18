<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {
	public function index(){

    	$data = [
            'title' => 'Events',
            'currentPage' => 'events'
        ];
        
        $username = $this->session->userdata('username');

        if (!$username) {
            redirect('auth/signin');
        }

        $result = $this->UserModel->findUser(['username' => $username]);
        if(!$result || $result['username'] !== $username) {
            redirect('auth/signin');
        }

        if(!empty($this->session->userdata('username'))) {
            $data['username'] = $this->session->userdata('username');
        }

		$this->load->view("templates/header", $data);
        $this->load->view("templates/navbar", $data);
    	$this->load->view('pages/events');
        $this->load->view('templates/notify');
    	$this->load->view('templates/footer');
	}
}
