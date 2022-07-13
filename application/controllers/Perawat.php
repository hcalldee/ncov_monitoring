<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        is_logged_in();
        $this->load->model('Perawat_model', 'model');
    }
    public function index()
    {
        redirect('index.php/perawat/kalender');
    }
    public function kalender()
    {
        $center = $this->place->get();
        $data['place'] = $center;
        $data['mark'] = $this->location->get($this->session->userdata('id_user'))->row();
        $data['judul'] = 'Kalender';
        $data['jadwal'] = $this->tindakan->get();
        $data['session'] = $this->perawat->getNama($this->session->userdata('id_user'))->row();
        render('perawat/kalender/index', $data); //helper template view
    }
    public function check()
    {
        return $this->session->set_userdata('check', $this->input->post('stat'));
    }
    public function tindakan()
    {
        if ($this->session->userdata('check')) {
            $data['judul'] = 'Tindakan';
            $data['tindakan'] = $this->tindakan->get();
            $data['pasien'] = $this->pasien->get();
            $data['session'] = $this->perawat->getNama($this->session->userdata('id_user'))->row();
            render('perawat/tindakan/index', $data); //helper template view
        } else {
            redirect('profile');
        }
    }
    public function getTindakan()
    {
        echo json_encode($this->tindakan->get($this->input->post('id'))->row());
    }


    public function editTindakan($id = null)
    {
        if ($id == null) {
            redirect('index.php/perawat/tindakan');
        } else {
            $this->form_validation->set_rules('keadaan_umum', 'keadaan umum', 'required|trim');
            $this->form_validation->set_rules('temperatur', 'temperatur', 'required|trim');
            $this->form_validation->set_rules('tekanan_darah', 'tekanan darah', 'required|trim');
            $this->form_validation->set_rules('jml_nafas', 'jumlah nafas', 'required|trim');
            $this->form_validation->set_rules('denyut_jantung', 'Denyut Jantung', 'required|trim');
            $this->form_validation->set_rules('gcs', 'gcs', 'required|trim');
            $this->form_validation->set_rules('kesadaran', 'kesadaran', 'trim');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Edit Tindakan';
                $data['tindakan'] = $this->tindakan->get($id)->row();
                $data['perawat'] = $this->perawat->get();
                $data['pasien'] = $this->pasien->get();
                $data['dokter'] = $this->dokter->get();
                $data['jadwal'] = $this->jadwal->get();
                render('perawat/tindakan/edit_tindakan', $data); //helper template view
            } else {
                $send = [
                    'Keadaan_Umum' => $this->input->post('keadaan_umum'),
                    'temp' => $this->input->post('temperatur'),
                    'tekanan_darah' => $this->input->post('tekanan_darah'),
                    'jml_nafas' => $this->input->post('jml_nafas'),
                    'denyut_jantung' => $this->input->post('denyut_jantung'),
                    'gcs' => $this->input->post('gcs'),
                    'kesadaran' => $this->input->post('kesadaran'),
                ];
                if ($this->tindakan->update($send, $id) > 0) {
                    setFlash('success', 'Tindakan telah diedit'); //helper alert
                } else {
                    setFlash('error', 'Tindakan gagal diedit'); //helper alert
                }
                redirect('index.php/perawat/tindakan');
            }
        }
    }
    public function pasien()
    {
        $center = $this->place->get();
        $data['place'] = $center;
        $data['mark'] = $this->location->get($this->session->userdata('id_user'))->row();
        $data['judul'] = 'Pasien';
        $data['pasien'] = $this->model->getPasien()->result();
        render('perawat/pasien/index', $data);
    }

    public function detailPasien()
    {
        echo json_encode($this->model->getPasien($this->input->post('id'))->row());
    }

    public function print()
    {
        $data['judul'] = 'Print';
        $data['tindakan'] = $this->tindakan->get();
        $data['pasien'] = $this->pasien->get();
        $data['session'] = $this->perawat->getNama($this->session->userdata('id_user'))->row();
        $this->load->view('perawat/print', $data);
    }
}
