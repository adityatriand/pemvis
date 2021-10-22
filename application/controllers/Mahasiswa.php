<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MahasiswaModel', 'mhs');
    }

    public function get_mahasiswa()
    {
        $res = $this->mhs->getAllMahasiswa();
        echo json_encode($res);
    }

    public function get_mahasiswa_by_nim()
    {
        $nim = $this->input->post('nim');
        $data = $this->mhs->getMahasiswabyNim($nim);
        echo json_encode($data);
    }

    public function add_mahasiswa()
    {
        $data = $this->input->post(['nim', 'nama', 'gender', 'tgl_lahir', 'prodi', 'jurusan', 'fakultas', 'angkatan']);
        $dummy = $this->input->post('dummy');
        if ($dummy == '') {
            $status = $this->mhs->insert($data);
        } else {
            $status = $this->mhs->update($dummy, $data);
        }
        $res = [
            'res' => $status,
            'data' => $data,
            'dummy' => $dummy
        ];
        echo json_encode($res);
    }

    public function delete_mahasiswa()
    {
        $nim = $this->input->post('nim');
        $status = $this->mhs->delete($nim);
        echo json_encode($status);
    }
}
