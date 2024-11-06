<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); // Load URL helper for base_url()
        $this->load->model('Portfolio_model'); // Load the Portfolio_model
        $this->load->library('session'); // Load session library to handle logout functionality
    }

    // Display the main portfolio page
    public function index()
    {
        // Get all entries from the database, filtered by 'type'
        $data['names'] = $this->Portfolio_model->get_entries_by_type('name');
        $data['information'] = $this->Portfolio_model->get_entries_by_type('information');
        $data['skills'] = $this->Portfolio_model->get_entries_by_type('skill');
        
        // Load the dashboard index view
        $this->load->view('dashboard/index', $data);
    }

    // Display form to create a new entry
    public function create()
    {
        // Check if the form is submitted
        if ($this->input->post()) {
            // Prepare data to be inserted
            $data = [
                'type' => $this->input->post('type'),  // Get 'type' input from the form
                'content' => $this->input->post('content')  // Get 'content' input from the form
            ];

            // Insert data into the database
            if ($this->Portfolio_model->insert_entry($data)) {
                // Redirect to the dashboard after successful insertion
                redirect('dashboard');
            } else {
                // Show error message if insert fails
                echo "There was an issue inserting the data.";
            }
        } else {
            // If no POST data, just load the create view
            $this->load->view('dashboard/create');
        }
    }

    // Edit an existing entry
    // Edit an existing entry
public function edit($id)
{
    // Get the existing entry details
    $entry = $this->Portfolio_model->get_entry_by_id($id);

    if ($entry) {
        // If data is submitted via POST, update the entry
        if ($this->input->post()) {
            $content = $this->input->post('content');

            // Update the entry in the database
            $data = [
                'content' => $content
            ];
            if ($this->Portfolio_model->update_entry($id, $data)) {
                redirect('dashboard');
            } else {
                echo "There was an issue updating the data.";
            }
        }

        // Load the edit form with the current data
        $data['entry'] = $entry;
        $this->load->view('dashboard/edit', $data);
    } else {
        show_404(); // Show error if entry not found
    }
}


    // Delete an entry
    public function delete($id)
    {
        // Delete the entry and redirect to the dashboard
        if ($this->Portfolio_model->delete_entry($id)) {
            redirect('dashboard');
        } else {
            echo "Error deleting entry.";
        }
    }

    // Logout functionality
    public function logout()
    {
        // Destroy the session and redirect to the login page
        $this->session->sess_destroy(); // Destroy all session data
        redirect('auth/login'); // Redirect to login page
    }
}
