<?php

class Perawat_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        $this->load->model('db/T_location', 'location');
        $this->load->model('db/T_place', 'place');
        $this->load->model('db/T_jadwal', 'jadwal');
        $this->load->model('db/T_tindakan', 'tindakan');
        $this->load->model('db/T_pasien', 'pasien');
        $this->load->model('db/T_dokter', 'dokter');
        $this->load->model('db/T_perawat', 'perawat');
        $this->load->model('db/T_resep', 'resep');
    }
    public function getPasien($id = '')
    {
        $this->db->select('*');
        $this->db->from('t_pasien');
        if ($id) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }
}
