<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        is_logged_in();
        $this->load->model('Profile_model', 'model');
    }

    public function index()
    {


        $data['judul'] = 'Profile';
        $data['user'] = $this->model->getUser($this->session->userdata('id_user'))->row();


        if ($this->session->userdata('role_id') == '1') {
            render('profile/index', $data); //helper template view  
        } else if ($this->session->userdata('role_id') == '2') {
            $data['biodata'] = $this->model->getBiodata($this->session->userdata('id_user'))->row();
            render('profile/index', $data); //helper template view
        } else if ($this->session->userdata('role_id') == '3') {
            $data['spesialis'] = $this->model->arr_spesialis();
            $data['biodata'] = $this->model->getBiodata($this->session->userdata('id_user'))->row();
            render('profile/index', $data); //helper template view
        } else if ($this->session->userdata('role_id') == '4') {
            $data['biodata'] = $this->model->getBiodata($this->session->userdata('id_user'))->row();
            $center = $this->place->get();
            $data['place'] = $center;
            $data['mark'] = $this->location->get($this->session->userdata('id_user'))->row();
            render('profile/index', $data); //helper template view
        }
    }


    public function editProfile()
    {
        $id = $this->session->userdata('id_user');
        $data['judul'] = 'Biodata';
        $this->form_validation->set_rules($this->model->rules(TRUE));

        if ($this->session->userdata('role_id') == '3') {
            $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $validasi = array();

            $validasi['status'] = 'error';
            $validasi['message'] = 'Terdapat kesalahan pada inputan anda';

            foreach ($this->model->rules() as $value) {
                $validasi['error'][$value['field']] = form_error($value['field']);
            }
        } else {
            if ($this->model->editProfile($id) > 0) {
                setFlash('success', 'Profil berhasil diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Data Berhasil diedtt',
                ];
            } else {
                // setFlash('error', 'Profil gagal diedit'); //helper alert
                $validasi = [
                    'status' => 'error',
                    'message' => 'Profil tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function uploadFoto()
    {
        $foto = $_FILES['foto-profil']['name'];
        $res = [];
        $foto = $this->model->uploadImage($foto);
        if (!$foto->status) {
            $res['status'] = 'error';
            $res['message'] = 'Terdapat kesalahan pada inputan anda';
            $res['text'] = $foto->message;
        } else {
            $this->model->editFoto($foto->imageName);
            setFlash('success', 'Foto profil berhasil diubah'); //helper alert
            $res['status'] = 'success';
            $res['message'] = 'Data tersimpan';
            // $res['text'] = 'Data Berhasil disimpan';
            // $res['text'] = '<small class="form-text text-success ml-1"><p>Data berhasil disimpan</p></small>';
            $this->session->set_userdata('foto_profil', $foto->imageName);
            // echo '<pre>';
            // print_r($this->session->userdata('foto_profil'));
            // echo '</pre>';
            $res['text'] = '<div class="progress-bar bg-success progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
            Data berhasil disimpan
            </div>';
        }
        $res['foto'] = $foto;
        echo json_encode($res);
    }

    public function editPassword()
    {
        $id = $this->session->userdata('id_user');
        $this->form_validation->set_rules($this->model->rules_password(TRUE));

        if ($this->form_validation->run() == FALSE) {
            $validasi = array();
            $validasi['status'] = 'error';
            $validasi['message'] = 'Terdapat kesalahan pada inputan anda';

            foreach ($this->model->rules_password() as $value) {
                $validasi['error'][$value['field']] = form_error($value['field']);
            }
        } else {
            $passwordLama = $this->model->getPassword($id)->row();
            if (password_verify($this->input->post('password'), $passwordLama->password)) {
                if ($this->model->editPassword($this->input->post('password-baru2'))) {
                    $validasi = [
                        'status' => 'success',
                        'message' => 'Password Berhasil diganti',
                    ];
                }
            } else {
                $validasi = [
                    'status' => 'error',
                    'message' => 'Password lama salah',
                ];
            }
        }
        echo json_encode($validasi);
    }
}
