<?php

use PhpParser\Node\Stmt\Echo_;

defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/T_spesialis', 'spesialis');
        $this->load->model('db/T_jadwal', 'jadwal');
        $this->load->model('db/T_tindakan', 'tindakan');
        $this->load->model('db/T_pasien', 'pasien');
        $this->load->model('db/T_dokter', 'dokter');
        $this->load->model('db/T_perawat', 'perawat');
        $this->load->model('db/T_resep', 'resep');
    }
    public function index()
    {
        $data['judul'] = 'Ncov Monitoring';
        $data['total'] = $this->pasien->getJml()->num_rows();
        $data['pdp'] = $this->pasien->getStatus('PDP')->num_rows();
        $data['odp'] = $this->pasien->getStatus('ODP')->num_rows();
        $data['positif'] = $this->pasien->getStatus('Positif')->num_rows();
        $this->load->view('landing/index', $data);
    }

    public function getGrafik()
    {
        $data['total'] = $this->pasien->getJml()->num_rows();
        $data['pdp'] = $this->pasien->getStatus('PDP')->num_rows();
        $data['odp'] = $this->pasien->getStatus('ODP')->num_rows();
        $data['positif'] = $this->pasien->getStatus('Positif')->num_rows();
        echo json_encode($data);
    }
}
