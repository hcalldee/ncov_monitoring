<?php

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

defined('BASEPATH') or exit('No direct script access allowed');

class User extends REST_Controller
{
    private $t_id = 'id_user';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/t_user', 'user');
    }

    public function index_post()
    {
        $data = [
            'username' => $this->post('username'),
            'password' => $this->post(md5('password')),
            'image' => $this->post('image'),
            'role_id' => $this->post('role_id'),
        ];

        if ($this->user->create($data) > 0) {
            $this->CREATED('data has been created');
        } else {
            $this->BAD_REQUEST('data failed to created');
        }
    }

    public function index_get()
    {
        $usr = $this->get('usr');
        $pass = $this->get('pass');

        if ($usr != null && $pass != null) {
            $data = [
                'usr' => $usr,
                'pass' => md5($pass)
            ];
            $var = $this->user->search($data);
            if ($var) {
                $this->OK($var, 'data found');
            } else {
                return false;
            }
        } else {
            $data = $this->user->get();
            $this->OK($data);
        }
    }

    public function index_delete()
    {
        $id = $this->delete($this->t_id);

        if ($id <= 0) {
            $this->BAD_REQUEST('id not provide');
        } else {
            if ($this->spesialis->delete($id) > 0) {
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
            'username' => $this->post('username'),
            'password' => $this->post(md5('password')),
            'image' => $this->post('image'),
            'role_id' => $this->post('role_id'),
        ];

        if ($this->user->update($data, $id) > 0) {
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
