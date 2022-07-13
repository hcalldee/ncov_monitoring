<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends REST_Controller
{
    private $t_id = 'id_pasien';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/t_pasien', 'pasien');
    }

    public function index_post()
    {
        $data = [
            #'id_pasien' => $this->post('id_pasien'),
            'nama' => $this->post('nama'),
            'umur' => $this->post('umur'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'tinggi_badan' => $this->post('tinggi_badan'),
            'berat_badan' => $this->post('berat_badan'),
            'riwayat_penyakit' => $this->post('riwayat_penyakit'),
            'alamat' => $this->post('alamat'),
            'Rapid' => $this->post('Rapid'),
            'PCR' => $this->post('PCR'),
            'status' => $this->post('status'),
        ];

        if ($this->pasien->create($data) > 0) {
            $this->CREATED('data has been created');
        } else {
            $this->BAD_REQUEST('data failed to created');
        }
    }

    public function index_get()
    {
        $data = $this->pasien->get();
        $this->OK($data);
    }

    public function index_delete()
    {
        $id = $this->delete($this->t_id);

        if ($id <= 0) {
            $this->BAD_REQUEST('id not provide');
        } else {
            if ($this->pasien->delete($id) > 0) {
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
            'umur' => $this->post('umur'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'tinggi_badan' => $this->post('tinggi_badan'),
            'berat_badan' => $this->post('berat_badan'),
            'riwayat_penyakit' => $this->post('riwayat_penyakit'),
            'alamat' => $this->post('alamat'),
            'Rapid' => $this->post('Rapid'),
            'PCR' => $this->post('PCR'),
            'status' => $this->post('status'),
        ];

        if ($this->pasien->update($data, $id) > 0) {
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
