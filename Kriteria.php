<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        $this->load->model('Kriteria_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Kriteria';
        // $data['kriteria'] = $this->model->getKriteria()->result();
        render('kriteria/index', $data); //helper template view
    }
}
