<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MahasiswaModel', 'mhs');
    }

        public function index()
    {
        $this->load->helper('url');
    }
 
    public function datatable_mahasiswa()
    {
        $list = $this->mhs->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $mhs) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $mhs->nim;
            $row[] = $mhs->nama;
            $row[] = $mhs->jurusan;
            $row[] = $mhs->fakultas;

            $aksi = "<button type='button' class='btn btn-danger btn-hapus' style='margin-right: 4px;' nim='".$mhs->nim."'>Hapus</button>";

            $aksi .= "<button type='button' class='btn btn-primary btn-edit' nim='".$mhs->nim."'>Edit</button>";

            $row[] = $aksi;
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mhs->count_all(),
                        "recordsFiltered" => $this->mhs->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
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
