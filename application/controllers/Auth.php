<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Load the User_model
        $this->load->helper('url'); // Load URL helper
        $this->load->library('form_validation'); // Load Form Validation library
        $this->load->library('session'); // Load Session library for session handling
    }

    // Display the login page
    public function login()
    {
        // Check if the user is already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard'); // If logged in, redirect to dashboard
        }

        $this->load->view('auth/login'); // Load login view
    }

    // Handle login form submission
    public function login_process()
    {
        // Set validation rules for login
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the login page
            $this->load->view('auth/login');
        } else {
            // Get form data
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Check login credentials
            $user = $this->User_model->login($username, $password);

            if ($user) {
                // Set session data if login is successful
                $this->session->set_userdata([
                    'logged_in' => true,
                    'user_id' => $user->id,
                    'username' => $user->username
                ]);
                redirect('dashboard'); // Redirect to dashboard
            } else {
                // Display error message if login fails
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('auth/login'); // Redirect back to login
            }
        }
    }

    // Display the register page
    public function register()
    {
        $this->load->view('auth/register'); // Load register view
    }

    // Handle registration form submission
    public function register_process()
    {
        // Set validation rules for registration
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the register page
            $this->load->view('auth/register');
        } else {
            // Get form data
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT) // Hash the password
            ];

            // Register the user
            if ($this->User_model->register($data)) {
                // Redirect to login page after successful registration
                $this->session->set_flashdata('success', 'Registration successful. Please login.');
                redirect('auth/login');
            } else {
                // Display error if registration fails
                $this->session->set_flashdata('error', 'There was an issue with your registration.');
                redirect('auth/register');
            }
        }
    }

    // Logout user and destroy session
    public function logout()
    {
        // Destroy the session and redirect to the login page
        $this->session->sess_destroy(); // This destroys all session data
        redirect('auth/login'); // Redirect user to the login page
    }
}
