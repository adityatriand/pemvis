<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_info($username)
    {
        $this->db->select("*");
        $this->db->from("user");
        $this->db->where('username', $username);

        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_profile_user($username)
    {
        $this->db->select("nama");
        $this->db->from("user");
        $this->db->where('username', $username);
        $result = $this->db->get();
        return $result->result_array();
    }
}
