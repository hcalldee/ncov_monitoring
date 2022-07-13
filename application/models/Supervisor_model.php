<?php

class Supervisor_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        $this->load->model('db/T_jadwal', 'jadwal');
        $this->load->model('db/T_tindakan', 'tindakan');
        $this->load->model('db/T_pasien', 'pasien');
        $this->load->model('db/T_dokter', 'dokter');
        $this->load->model('db/T_perawat', 'perawat');
        $this->load->model('db/T_resep', 'resep');
    }
    public function getDokter($id = '')
    {
        $this->db->select('t_dokter.*, t_spesialis.nama as spesialis');
        $this->db->from('t_dokter');
        $this->db->join('t_spesialis', 't_dokter.id_spesialis = t_spesialis.id_spesialis', 'left');
        if ($id) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
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

    public function generateIdPasien()
    {
        if (!$idPasien = $this->model->getLastPasien()->row()) {
            return 'A0001';
        } else {
            if ((int) $idPasien->id + 1 < 10) {
                $zero = '000';
            } else if ((int) $idPasien->id + 1 < 100) {
                $zero = '00';
            } else if ((int) $idPasien->id + 1 < 1000) {
                $zero = '0';
            } else {
                $zero = '';
            }
            $id = 'A' . $zero . strval((int) $idPasien->id + 1);
            return $id;
        }
    }

    public function getLastPasien()
    {
        $this->db->select('*');
        $this->db->from('t_pasien');
        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function tambahPasien()
    {
        $data = [
            "id_pasien" => $this->input->post('id-pasien', true),
            "nama" => $this->input->post('nama', true),
            "umur" => $this->input->post('umur', true),
            "jenis_kelamin" => $this->input->post('jk', true),
            "tinggi_badan" => $this->input->post('tinggi-badan', true),
            "berat_badan" => $this->input->post('berat-badan', true),
            "riwayat_penyakit" => $this->input->post('riwayat-penyakit', true),
            "alamat" => $this->input->post('alamat', true),
            "rapid" => $this->input->post('rapid', true),
            "pcr" => $this->input->post('pcr', true),
            "status" => $this->input->post('status', true)
        ];
        $this->db->insert('t_pasien', $data);
        return $this->db->affected_rows();
    }

    public function editPasien($id)
    {
        $data = [
            "id_pasien" => $this->input->post('id-pasien', true),
            "nama" => $this->input->post('nama', true),
            "umur" => $this->input->post('umur', true),
            "jenis_kelamin" => $this->input->post('jk', true),
            "tinggi_badan" => $this->input->post('tinggi-badan', true),
            "berat_badan" => $this->input->post('berat-badan', true),
            "riwayat_penyakit" => $this->input->post('riwayat-penyakit', true),
            "alamat" => $this->input->post('alamat', true),
            "rapid" => $this->input->post('rapid', true),
            "pcr" => $this->input->post('pcr', true),
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('t_pasien', $data);
        return $this->db->affected_rows();
    }

    public function hapusPasien($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('t_pasien');
        return $this->db->affected_rows();
    }
}
