<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends REST_Controller
{
    private $t_id = 'id_dokter';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/t_dokter', 'dokter');
    }

    public function index_post()
    {
        $data = [
            #'id_dokter' => $this->post('id_dokter'),
            'nama' => $this->post('nama'),
            'no_telp' => $this->post('no_telp'),
            'alamat' => $this->post('alamat'),
            'id_spesialis' => $this->post('id_spesialis'),
            'id_user' => $this->post('id_user'),
        ];

        if ($this->dokter->create($data) > 0) {
            $this->CREATED('data has been created');
        } else {
            $this->BAD_REQUEST('data failed to created');
        }
    }

    public function index_get()
    {
        $data = $this->dokter->get();
        $this->OK($data);
    }

    public function index_delete()
    {
        $id = $this->delete($this->t_id);

        if ($id <= 0) {
            $this->BAD_REQUEST('id not provide');
        } else {
            if ($this->dokter->delete($id) > 0) {
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
            'nama' => $this->post('nama'),
            'no_telp' => $this->post('no_telp'),
            'alamat' => $this->post('alamat'),
            'id_spesialis' => $this->post('id_spesialis'),
            'id_user' => $this->post('id_user'),
        ];

        if ($this->dokter->update($data, $id) > 0) {
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
