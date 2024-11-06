<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load database
    }

    // Register a new user
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }

    // Check if the username or email already exists
    public function check_user_exists($username, $email)
    {
        $this->db->where('username', $username);
        $this->db->or_where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0; // Return true if user exists
    }

    // Check if the login credentials are correct
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user; // Return user data if password matches
            }
        }
        return false; // Return false if no user found or password incorrect
    }
}
