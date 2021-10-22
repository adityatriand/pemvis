<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MahasiswaModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllMahasiswa()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $res = $this->db->get();
        return $res->result_array();
    }

    public function getMahasiswabyNim($nim)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $nim);

        $res = $this->db->get();
        return $res->result_array();
    }

    public function insert($data)
    {
        if (count($this->getMahasiswabyNim($data['nim'])) > 0) {
            return 0;
        } else {
            $res = $this->db->insert('mahasiswa', $data);
            if ($res) {
                return 1;
            } else {
                return -1;
            }
        }
    }

    public function update($nim, $data)
    {
        $this->db->where('nim', $nim);
        $res = $this->db->update('mahasiswa', $data);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete($nim)
    {
        $res = $this->db->delete('mahasiswa', ['nim' => $nim]);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }
}
