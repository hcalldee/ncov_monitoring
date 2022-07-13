<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends REST_Controller
{
    private $t_id = 'id_resep';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/t_resep', 'resep');
    }

    public function index_post()
    {
        $data = [
            #'id_resep' => $this->post('id_resep'),
            'id_dokter' => $this->post('id_dokter'),
            'id_pasien' => $this->post('id_pasien'),
            'Deskripsi' => $this->post('Deskripsi'),
        ];

        if ($this->resep->create($data) > 0) {
            $this->CREATED('data has been created');
        } else {
            $this->BAD_REQUEST('data failed to created');
        }
    }

    public function index_get()
    {
        $data = $this->resep->get();
        $this->OK($data);
    }

    public function index_delete()
    {
        $id = $this->delete($this->t_id);

        if ($id <= 0) {
            $this->BAD_REQUEST('id not provide');
        } else {
            if ($this->resep->delete($id) > 0) {
                $this->OK(null, 'data has been Deleted');
            } else {
                $this->BAD_REQUEST('id not found');
            }
        }
    }

    public function index_put()
    {
        $id = $this->put($this->t_id);
        $data = [
            'id_dokter' => $this->post('id_dokter'),
            'id_pasien' => $this->post('id_pasien'),
            'Deskripsi' => $this->post('Deskripsi'),
        ];

        if ($this->resep->update($data, $id) > 0) {
            $this->OK('data has been updated');
        } else {
            $this->BAD_REQUEST('data failed to update');
        }
    }

    public function OK($data, $message = null, $status = true)
    {
        $this->response([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ], REST_Controller::HTTP_OK);
    }
    public function CREATED($message, $status = true)
    {
        $this->response([
            'status' => $status,
            'message' => $message
        ], REST_Controller::HTTP_CREATED);
    }
    public function NOT_FOUND($message, $status = true)
    {
        $this->response([
            'status' => $status,
            'message' => $message
        ], REST_Controller::HTTP_NOT_FOUND);
    }
    public function BAD_REQUEST($message, $status = false)
    {
        $this->response([
            'status' => $status,
            'message' => $message
        ], REST_Controller::HTTP_BAD_REQUEST);
    }
}
