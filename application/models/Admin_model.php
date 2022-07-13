<?php

class Admin_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        $this->load->model('db/T_location', 'location');
        $this->load->model('db/T_place', 'place');
        $this->load->model('db/T_spesialis', 'spesialis');
        $this->load->model('db/T_jadwal', 'jadwal');
        $this->load->model('db/T_tindakan', 'tindakan');
        $this->load->model('db/T_pasien', 'pasien');
        $this->load->model('db/T_dokter', 'dokter');
        $this->load->model('db/T_perawat', 'perawat');
        $this->load->model('db/T_resep', 'resep');
    }

    public function arr_role()
    {
        $data = $this->getRole()->result();
        $list_role = [];
        foreach ($data as $role) {
            $list_role[$role->role_id] = $role->name;
        }
        return $list_role;
    }

    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('t_role');
        $this->db->where('role_id != 1');
        return $this->db->get();
    }

    public function arr_editRole()
    {
        $data = $this->getEditRole()->result();
        $list_role = [];
        foreach ($data as $role) {
            $list_role[$role->role_id] = $role->name;
        }
        return $list_role;
    }

    public function getEditRole()
    {
        $this->db->select('*');
        $this->db->from('t_role');
        $this->db->where('role_id != 1 and role_id != 3');
        return $this->db->get();
    }

    public function generateUsername()
    {
        if (!$username = $this->model->getLastUsername()->row()) {
            return '0001_user';
        } else {
            if ((int) $username->id_user + 1 < 10) {
                $zero = '000';
            } else if ((int) $username->id_user + 1 < 100) {
                $zero = '00';
            } else if ((int) $username->id_user + 1 < 1000) {
                $zero = '0';
            } else {
                $zero = '';
            }
            $id = $zero . strval((int) $username->id_user + 1) . '_user';
            return $id;
        }
    }

    public function getLastUsername()
    {
        $this->db->select('*');
        $this->db->from('t_user');
        $this->db->limit(1);
        $this->db->order_by('id_user', "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function getAkun($id = '')
    {
        $this->db->select('t_user.id_user, t_user.username, t_user.image, t_user.role_id, t_role.name as role');
        $this->db->from('t_user');
        $this->db->join('t_role', 't_user.role_id = t_role.role_id');
        $this->db->where('t_role.role_id != 1');
        if ($id) {
            $this->db->where('id_user', $id);
        }
        $this->db->order_by('t_user.id_user', 'ASC');
        return $this->db->get();
    }

    public function tambahAkun()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => password_hash($this->input->post('username'), PASSWORD_DEFAULT),
            "image" => 'image.jpg',
            "role_id" => $this->input->post('role')
        ];
        $this->db->insert('t_user', $data);
        return $this->db->affected_rows();
    }

    public function editAkun($id)
    {
        $data = [
            "role_id" => $this->input->post('role-edit', true),
        ];
        $this->db->where('id_user', $id);
        $this->db->update('t_user', $data);
        return $this->db->affected_rows();
    }
    public function hapusAkun($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('t_user');
        return $this->db->affected_rows();
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

    public function getPerawat($id = '')
    {
        $this->db->select('*');
        $this->db->from('t_perawat');
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

    public function getSpesialis($id = '')
    {
        $this->db->select('*');
        $this->db->from('t_spesialis');
        if ($id) {
            $this->db->where('id_spesialis', $id);
        }
        return $this->db->get();
    }

    public function tambahSpesialis()
    {
        $data = [
            "nama" => $this->input->post('spesialis', true),
        ];
        $this->db->insert('t_spesialis', $data);
        return $this->db->affected_rows();
    }

    public function editSpesialis($id)
    {
        $data = [
            "nama" => $this->input->post('spesialis', true),
        ];
        $this->db->where('id_spesialis', $id);
        $this->db->update('t_spesialis', $data);
        return $this->db->affected_rows();
    }

    public function hapusSpesialis($id)
    {
        $this->db->where('id_spesialis', $id);
        $this->db->delete('t_spesialis');
        return $this->db->affected_rows();
    }
}
