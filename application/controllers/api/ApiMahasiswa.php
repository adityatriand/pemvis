<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class ApiMahasiswa extends REST_Controller{
	public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->model("MahasiswaModel", "api");
    }

    public function index_get() {
        $id = $this->get('id');
        if ($id === null) {
            $data = $this->api->getAllMahasiswa();
        } else {
            $data = $this->api->getMahasiswabyNim($id);
        }
        
        if($data){
            $this->response([
                'status' => TRUE,
                'data' => $data
            ], REST_Controller::HTTP_OK);
        } else{
             $this->response([
                'status' => FALSE,
                'message' => "There's nothing data"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

?>