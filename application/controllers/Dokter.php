<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        is_logged_in();
        $this->load->model('Dokter_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Dokter';
        $data['odp'] = $this->pasien->getStatus('ODP')->num_rows();
        $data['pdp'] = $this->pasien->getStatus('PDP')->num_rows();
        $data['positif'] = $this->pasien->getStatus('Positif')->num_rows();
        $data['jumlah'] = $this->pasien->getJml()->num_rows();
        $data['petugas'] = $this->perawat->jaga(date("Y-m-d", time()));
        render('dokter/index', $data); //helper template view
    }

    public function kalender()
    {
        $data['judul'] = 'Kalender';
        $data['jadwal'] = $this->tindakan->get();
        $data['session'] = $this->dokter->getNama($this->session->userdata('id_user'))->row();
        render('dokter/kalender/index', $data); //helper template view
        // render('home/index', $data); //helper template view
    }

    public function getTindakan()
    {
        echo json_encode($this->tindakan->get($this->input->post('id'))->row());
    }

    public function tindakan()
    {
        $data['judul'] = 'Tindakan';
        $data['tindakan'] = $this->tindakan->get();
        $data['pasien'] = $this->pasien->get();
        $data['session'] = $this->dokter->getNama($this->session->userdata('id_user'))->row();
        render('dokter/tindakan/index', $data); //helper template view
    }

    public function pasien()
    {
        $data['judul'] = 'Pasien';
        $data['pasien'] = $this->model->getPasien()->result();
        render('dokter/pasien/index', $data); //helper template view
    }

    public function detailPasien()
    {
        echo json_encode($this->model->getPasien($this->input->post('id'))->row());
    }


    public function resep()
    {
        $data['judul'] = 'Resep';
        $data['resep'] =  $this->resep->get();
        $data['pasien'] = $this->pasien->get();
        $data['session'] = $this->dokter->getNama($this->session->userdata('id_user'))->row();
        render('dokter/resep/index', $data); //helper template view
    }

    public function tambahResep()
    {
        $this->form_validation->set_rules('tambah_pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('tambah-resep', 'Deskripsi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'tambah_pasien_error' => form_error('tambah_pasien'),
                'tambah_deskripsi_error' => form_error('tambah-resep'),
            ];
        } else {
            $send = [
                'id_dokter' => $this->input->post('id_dokter'),
                'id_pasien' => $this->input->post('tambah_pasien'),
                'deskripsi' => $this->input->post('tambah-resep')
            ];
            if ($this->resep->create($send) > 0) {
                setFlash('success', 'Reseo telah ditambah'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'data resep berhasil ditambah',
                ];
            } else {
                setFlash('error', 'Resep gagal ditambah'); //helper alert
                $validasi = [
                    'status' => 'error',
                    'message' => 'Resep gagal disimpan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function editResep()
    {
        $this->form_validation->set_rules('pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('edit-resep', 'Deskripsi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'pasien_error' => form_error('pasien'),
                'deskripsi_error' => form_error('edit-resep'),
            ];
        } else {
            $send = [
                'id_pasien' => $this->input->post('pasien'),
                'deskripsi' => $this->input->post('edit-resep')
            ];
            if ($this->resep->update($send, $this->input->post('id')) > 0) {
                setFlash('success', 'Resep telah diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Resep berhasil di edit',
                ];
            } else {
                // setFlash('error', 'Resep tidak ada perubahan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Resep tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function getResep()
    {
        echo json_encode($this->resep->get($this->input->post('id'))->row());
    }

    public function hapusResep()
    {
        if ($this->input->post('id') === null) {
            redirect('index.php/dokter/resep');
        } else {
            if ($this->resep->delete($this->input->post('id')) > 0) {
                setFlash('success', 'Resep telah dihapus'); //helper alert
            } else {
                setFlash('error', 'Resep gagal dihapus'); //helper alert
            }
        }
    }
}
