<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

defined('BASEPATH') or exit('No direct script access allowed');

class Tindakan extends REST_Controller
{
    private $t_id = 'id_tindakan';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/t_tindakan', 'tindakan');
    }

    public function index_post()
    {
        $data = [
            #'id_tindakan' => $this->post('id_tindakan'),
            'Tanggal' => $this->post('Tanggal'),
            'Keadaan_Umum' => $this->post('Keadaan_Umum'),
            'Temp' => $this->post('Temp'),
            'Tekanan_Darah' => $this->post('Tekanan_Darah'),
            'Jml_Nafas' => $this->post('Jml_Nafas'),
            'Denyut_Jantung' => $this->post('Denyut_Jantung'),
            'GCS' => $this->post('GCS'),
            'Kesadaran' => $this->post('Kesadaran'),
            'Deskripsi' => $this->post('Deskripsi'),
            'id_dokter' => $this->post('id_dokter'),
            'id_perawat' => $this->post('id_perawat'),
            'id_pasien' => $this->post('id_pasien'),
        ];

        if ($this->tindakan->create($data) > 0) {
            $this->CREATED('data has been created');
        } else {
            $this->BAD_REQUEST('data failed to created');
        }
    }

    public function index_get()
    {
        $data = $this->tindakan->get();
        $this->OK($data);
    }

    public function index_delete()
    {
        $id = $this->delete($this->t_id);

        if ($id <= 0) {
            $this->BAD_REQUEST('id not provide');
        } else {
            if ($this->tindakan->delete($id) > 0) {
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
            'Tanggal' => $this->post('Tanggal'),
            'Keadaan_Umum' => $this->post('Keadaan_Umum'),
            'Temp' => $this->post('Temp'),
            'Tekanan_Darah' => $this->post('Tekanan_Darah'),
            'Jml_Nafas' => $this->post('Jml_Nafas'),
            'Denyut_Jantung' => $this->post('Denyut_Jantung'),
            'GCS' => $this->post('GCS'),
            'Kesadaran' => $this->post('Kesadaran'),
            'Deskripsi' => $this->post('Deskripsi'),
            'id_dokter' => $this->post('id_dokter'),
            'id_perawat' => $this->post('id_perawat'),
            'id_pasien' => $this->post('id_pasien'),
        ];

        if ($this->tindakan->update($data, $id) > 0) {
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
