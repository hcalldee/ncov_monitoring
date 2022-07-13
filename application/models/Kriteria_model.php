<?php

class Kriteria_model extends CI_model
{
    public function getKriteria($id = '')
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        if ($id) {
            $this->db->where('id_kriteria', $id);
        }
        return $this->db->get();
    }

    function getbobotKriteria()
    {
        //simulasi pengambilan data dari tabel pada db
        return array(
            "" => "-- Pilih bobot kriteria --",
            "1" => "Sangat kurang",
            "2" => "Kurang",
            "3" => "Cukup",
            "4" => "Penting",
            "5" => "Sangat Penting",
        );
    }

    function getTipe()
    {
        //simulasi pengambilan data dari tabel pada db
        return array(
            "" => "-- Pilih Kriteria --",
            "benefit" => "Benefit",
            "cost" => "Cost"
        );
    }

    public function tambahKriteria()
    {
        $data = [
            "nama" => $this->input->post('nama-kriteria', true),
            "type" => $this->input->post('tipe-kriteria', true),
            "bobot" => $this->input->post('bobot-kriteria', true)
        ];
        $this->db->insert('kriteria', $data);
    }

    public function hapusKriteria($id)
    {
        $this->db->where('id_kriteria', $id);
        $this->db->delete('kriteria');
    }

    public function editKriteria($id)
    {
        $data = [
            "nama" => $this->input->post('nama-kriteria', true),
            "type" => $this->input->post('tipe-kriteria', true),
            "bobot" => $this->input->post('bobot-kriteria', true)
        ];
        $this->db->where('id_kriteria', $id);
        $this->db->update('kriteria', $data);
    }
}
