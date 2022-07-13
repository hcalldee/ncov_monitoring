<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'model');
    }

    public function index()
    {
        // $data['judul'] = 'Kalender Ncov Monitoring';
        // $data['jadwal'] = $this->tindakan->get();
        // render('errors/index', $data); //helper template view
    }
}
