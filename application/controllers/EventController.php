<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

	public function index(){
    	$data = [
            'title' => 'Events',
            'currentPage' => 'events'
        ];
        
        $username = $this->session->userdata('username');

        if (!$username) {
            redirect('auth/signin');
        }

        $user = $this->UserModel->findUser(['username' => $username]);
        if(!$user || $user['username'] !== $username) {
            redirect('auth/signin');
        }

        $data['username'] = $username;
        $role = $this->session->userdata('role');
        $data['role'] = $role;

        $data['events'] = $this->EventModel->get_all_events();

        if ($role !== 'admin' && $role !== 'officer') {
            $events_attended_json = $user['events_attended'] ? $user['events_attended'] : '[]';
            $data['attended_events'] = json_decode($events_attended_json, true);
        }

		$this->load->view("templates/header", $data);
        $this->load->view("templates/navbar", $data);
    	$this->load->view('pages/events', $data);
        
        if ($role === 'admin' || $role === 'officer') {
            $this->load->view('modals/eventModal'); 
        } else {
            $this->load->view('modals/attendModal', $data);
        }
        
    	$this->load->view('templates/footer');
	}

    public function add_event() {
        $role = $this->session->userdata('role');
        if ($role !== 'admin' && $role !== 'officer') {
            $this->toastify->error('Unauthorized access.');
            redirect('eventcontroller');
        }

        // 1. Set Form Validation Rules
        $this->form_validation->set_rules('name', 'Event Name', 'required|trim|is_unique[tbl_events.name]', [
            'is_unique' => 'An event with this name already exists.'
        ]);
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');
        $this->form_validation->set_rules('end_time', 'End Time', 'required');

        // 2. Run Validation
        if ($this->form_validation->run() == FALSE) {
            $errorMessage = validation_errors('<li>', '*</li>');

            // Pass error string to Toastify error flashdata
            $this->toastify->error("<ul class='mb-0 ps-3 list-unstyled'>{$errorMessage}</ul>");
            redirect('eventcontroller');
        }

        // 3. Process Data if Validation Passes
        $eventData = [
            'name' => $this->input->post('name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'start_time' => $this->input->post('start_time'),
            'end_time' => $this->input->post('end_time')
        ];

        $this->EventModel->add_event($eventData);
        $this->toastify->success('Event added successfully.');
        redirect('eventcontroller');
    }

    // Method for Regular Users to attend events & upload picture
    public function attend_event() {
        $username = $this->session->userdata('username');
        $user = $this->UserModel->findUser(['username' => $username]);

        if (!$user) {
            $this->toastify->error('User not found.');
            redirect('auth/signin');
        }

        //Set Form Validation Rules for standard inputs
        $this->form_validation->set_rules('event_info', 'Select Event', 'required');

        //Run Validation
        if ($this->form_validation->run() == FALSE) {
            $this->toastify->error(strip_tags(validation_errors()));
            redirect('eventcontroller');
        }

        if (empty($_FILES['attendance_image']['name'])) {
            $this->toastify->error('Please upload an attendance picture.');
            redirect('eventcontroller');
        }

        // Gather Event Data
        $event_info_post = $this->input->post('event_info');
        
        $event_info = explode('|', $event_info_post); 
        $event_id = $event_info[0] ?? null;
        $event_name = $event_info[1] ?? 'Unknown Event';

        // Check if user already attended BEFORE handling the upload
        $attended_events = !empty($user['events_attended']) ? json_decode($user['events_attended'], true) : [];

        foreach ($attended_events as $ev) {
            if ($ev['event_id'] == $event_id) {
                $this->toastify->error('You have already attended this event.');
                redirect('eventcontroller'); 
            }
        }

        //Handle Upload
        if (!$this->upload->do_upload('attendance_image')) {
            $this->toastify->error(strip_tags($this->upload->display_errors()));
            redirect('eventcontroller');
        }

        $uploadData = $this->upload->data();
        $file_name = $uploadData['file_name'];

        $attended_events[] = [
            'event_id' => $event_id,
            'name' => $event_name,
            'joined_at' => date('Y-m-d H:i:s'),
            'proof_image' => $file_name // Stores the newly generated unique filename
        ];

        //Update user database
        $this->UserModel->editUser($user['id'], ['events_attended' => json_encode($attended_events)]);
        
        $this->toastify->success('Successfully attended the event!');
        redirect('eventcontroller');
    }
}