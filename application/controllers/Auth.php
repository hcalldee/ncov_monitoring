<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')) {
            // redirect('profile');
        }
        $this->load->model('Auth_model', 'model');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('index.php/profile');
        }
        $data['judul'] = 'Login';
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('pass', TRUE);
        $lat = $this->input->post('lat', TRUE);
        $long = $this->input->post('long', TRUE);

        // $user = $this->db->get_where('user', ['username' => $username])->row_array();
        // $user  = $this->model->getUser($username, $password);
        $user  = $this->model->getLogin($username)->row_array();

        if ($user) { // jika user ada
            if (password_verify($password, $user['password'])) { //jika password benar
                $this->setSession($user);
                if ($this->session->userdata('role_id') == '1') {
                    $this->session->set_userdata(['username' => $user['username']]);
                    redirect('index.php/profile');
                } else {
                    $data['judul'] = 'Isi Biodata';
                    if ($this->session->userdata('role_id') == '2') {
                        if ($this->model->cekUser()->num_rows() > 0) {
                            $this->session->set_userdata(['username' => $user['username']]);
                            redirect('index.php/profile');
                        } else {
                            $data['idPerawat'] = $this->model->generateId();
                            renderBiodata($data);
                        }
                    } else if ($this->session->userdata('role_id') == '3') {
                        if ($this->model->cekUser()->num_rows() > 0) {
                            $this->session->set_userdata(['username' => $user['username']]);
                            $data = [
                                'Lat' => $lat,
                                'Long' => $long,
                            ];
                            if ($this->location->update($data, $user['id_location'])) {
                                redirect('index.php/profile');
                            } else {
                                redirect('index.php/profile');
                            }
                        } else {
                            $data['idDokter'] = $this->model->generateId();
                            $data['spesialis'] = $this->model->arr_spesialis();
                            renderBiodata($data);
                        }
                    } else if ($this->session->userdata('role_id') == '4') {
                        if ($this->model->cekUser()->num_rows() > 0) {
                            $this->session->set_userdata(['username' => $user['username']]);
                            $data = [
                                'Lat' => $lat,
                                'Long' => $long,
                            ];
                            if ($this->location->update($data, $user['id_location'])) {
                                redirect('index.php/profile');
                            } else {
                                redirect('index.php/profile');
                            }
                        } else {
                            $data['idPerawat'] = $this->model->generateId();
                            renderBiodata($data);
                        }
                    }
                }
            } else {
                //jika password salah
                setFlash('error', 'username atau password salah');
                redirect('index.php/auth');
            }
        } else { //jika user tidak ada
            setFlash('error', 'username atau password salah');
            redirect('index.php/auth');
        }
    }

    public function tambahDokter()
    {
        $data['judul'] = 'Biodata';
        $data['idDokter'] = $this->model->generateId();
        $data['spesialis'] = $this->model->arr_spesialis();
        $this->form_validation->set_rules('id-dokter', 'ID Dokter', 'required|trim');
        $this->form_validation->set_rules('nama-dokter', 'Nama', 'required|trim');
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim');
        $this->form_validation->set_rules('alamat-dokter', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no-telp', 'No telp', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            renderBiodata($data);
        } else {
            if ($this->model->tambahDokter() > 0) {
                $data = [
                    'id_location' => $this->session->userdata('id_user'),
                    'Lat' => $this->input->post('lat'),
                    'Long' => $this->input->post('long')
                ];
                $this->location->create($data);
                $send = [
                    'id_location' => $this->session->userdata('id_user')
                ];
                $this->user->update($send, $this->session->userdata('id_user'));
                setFlash('success', 'Data telah disimpan'); //helper alert
                $user  = $this->model->getUsername($this->session->userdata('id_user'))->row_array();
                $this->session->set_userdata(['username' => $user['username']]);
                redirect('index.php/profile');
            } else {
                setFlash('error', 'Data gagal disimpan'); //helper alert
            }
        }
    }


    public function tambahPerawat()
    {
        $data['judul'] = 'Biodata';
        $data['idPerawat'] = $this->model->generateId();
        $this->form_validation->set_rules('id-perawat', 'ID Perawat', 'required|trim');
        $this->form_validation->set_rules('nama-perawat', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat-perawat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no-telp', 'No telp', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            renderBiodata($data);
        } else {
            if ($this->model->tambahPerawat() > 0) {
                setFlash('success', 'Data telah disimpan'); //helper alert
                $user  = $this->model->getUsername($this->session->userdata('id_user'))->row_array();
                $data = [
                    'id_location' => $this->session->userdata('id_user'),
                    'Lat' => $this->input->post('lat'),
                    'Long' => $this->input->post('long')
                ];
                $this->location->create($data);
                $send = [
                    'id_location' => $this->session->userdata('id_user')
                ];
                $this->user->update($send, $this->session->userdata('id_user'));
                $this->session->set_userdata(['username' => $user['username']]);
                redirect('index.php/profile');
            } else {
                setFlash('error', 'Data gagal disimpan'); //helper alert
            }
        }
    }

    public function tambahSupervisor()
    {
        $data['judul'] = 'Biodata';
        $data['idPerawat'] = $this->model->generateId();
        $this->form_validation->set_rules('id-perawat', 'ID Perawat', 'required|trim');
        $this->form_validation->set_rules('nama-perawat', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat-perawat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no-telp', 'No telp', 'required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {
            renderBiodata($data);
        } else {
            if ($this->model->tambahPerawat() > 0) {
                setFlash('success', 'Data telah disimpan'); //helper alert
                $user  = $this->model->getUsername($this->session->userdata('id_user'))->row_array();
                $this->session->set_userdata(['username' => $user['username']]);
                redirect('index.php/profile');
            } else {
                setFlash('error', 'Data gagal disimpan'); //helper alert
            }
        }
    }

    public function setSession($user)
    {
        $data = [
            'id_user' => $user['id_user'],
            'foto_profil' => $user['image'],
            // 'username' => $user['username'],
            'role_id' => $user['role_id']
        ];
        $this->session->set_userdata($data);
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('foto_profil');
        $this->session->unset_userdata('check');
        redirect('index.php/Auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
