<?php

class Portfolio_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all entries by type
    public function get_entries_by_type($type)
    {
        $this->db->where('type', $type); // Filter by type
        $query = $this->db->get('portfolio_entries'); // Ensure this is the correct table
        return $query->result_array();
    }

    // Insert a new entry
    public function insert_entry($data)
    {
        return $this->db->insert('portfolio_entries', $data);
    }

    // Update an entry by ID
    public function update_entry($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('portfolio_entries', $data);
    }

    // Get a single entry by ID
    public function get_entry_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('portfolio_entries');
        return $query->row_array();
    }

    // Delete an entry by ID
    public function delete_entry($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('portfolio_entries');
    }
}


