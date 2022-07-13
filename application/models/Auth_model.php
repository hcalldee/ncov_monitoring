<?php

use GuzzleHttp\Client;

class Auth_model extends CI_model
{
    private $client;
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('db/T_location', 'location');
        $this->load->model('db/T_user', 'user');
        // $this->form_validation->CI = &$this;
        // $this->client = new Client;
    }
    function account()
    {
        //simulasi pengambilan data dari tabel pada db
        return array(
            "admin" => "admin",
        );
    }

    public function getUser($username, $password)
    {
        $response = $this->client->request('GET', base_url('api/user'), [
            'query' => [
                'usr' => $username,
                'pass' => $password
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result['data'];
    }

    public function getLogin($username)
    {
        return $this->db->get_where('t_user', ['username' => $username]);
    }

    public function cekUser()
    {
        $id = $this->session->userdata('id_user');
        if ($this->session->userdata('role_id') == '3') {
            return $this->db->get_where('t_dokter', ['id_user' => $id]);
        } else  if ($this->session->userdata('role_id') == '4' || $this->session->userdata('role_id') == '2') {
            return $this->db->get_where('t_perawat', ['id_user' => $id]);
        }
    }

    public function getBiodata()
    {
        $id = $this->session->userdata('id_user');
        if ($this->session->userdata('role_id') == '3') {
            $this->db->select('t_dokter.*, t_spesialis.nama as spesialis');
            $this->db->from('t_dokter');
            $this->db->join('t_spesialis', 't_dokter.id_spesialis = t_spesialis.id_spesialis');
            $this->db->where('t_dokter.id_user', $id);
            return $this->db->get();
        } else  if ($this->session->userdata('role_id') == '4' || $this->session->userdata('role_id') == '2') {
            return $this->db->get_where('t_perawat', ['id_user' => $id]);
        }
    }


    public function arr_spesialis()
    {
        $data = $this->getSpesialis()->result();
        $list_spesialis[''] = '-- Pilih Spesialis --';
        foreach ($data as $spesialis) {
            $list_spesialis[$spesialis->id_spesialis] = $spesialis->nama;
        }
        return $list_spesialis;
    }

    public function getSpesialis($id = '')
    {
        $this->db->select('*');
        $this->db->from('t_spesialis');
        if ($id) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }


    public function generateId()
    {
        if ($this->session->userdata('role_id') == '3') {
            if (!$idDokter = $this->model->getLastUser()->row()) {
                return 'D0001';
            } else {
                if ((int) $idDokter->id + 1 < 10) {
                    $zero = '000';
                } else if ((int) $idDokter->id + 1 < 100) {
                    $zero = '00';
                } else if ((int) $idDokter->id + 1 < 1000) {
                    $zero = '0';
                } else {
                    $zero = '';
                }
                $id = 'D' . $zero . strval((int) $idDokter->id + 1);
                return $id;
            }
        } else  if ($this->session->userdata('role_id') == '4' | $this->session->userdata('role_id') == '2') {
            if (!$idPerawat = $this->model->getLastUser()->row()) {
                return 'P0001';
            } else {
                if ((int) $idPerawat->id + 1 < 10) {
                    $zero = '000';
                } else if ((int) $idPerawat->id + 1 < 100) {
                    $zero = '00';
                } else if ((int) $idPerawat->id + 1 < 1000) {
                    $zero = '0';
                } else {
                    $zero = '';
                }
                $id = 'P' . $zero . strval((int) $idPerawat->id + 1);
                return $id;
            }
        }
    }

    public function getLastUser()
    {
        $this->db->select('*');
        if ($this->session->userdata('role_id') == '3') {
            $this->db->from('t_dokter');
        } else if ($this->session->userdata('role_id') == '4' || $this->session->userdata('role_id') == '2') {
            $this->db->from('t_perawat');
        }

        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function getUsername($id = '')
    {
        $this->db->select('username');
        $this->db->from('t_user');
        if ($id) {
            $this->db->where('id_user', $id);
        }
        return $this->db->get();
    }

    public function tambahDokter()
    {
        $data = [
            "id_dokter" => $this->input->post('id-dokter', true),
            "nama" => $this->input->post('nama-dokter', true),
            "no_telp" => $this->input->post('no-telp', true),
            "alamat" => $this->input->post('alamat-dokter', true),
            "id_spesialis" => $this->input->post('spesialis', true),
            "id_user" => $this->session->userdata('id_user')
        ];
        $this->db->insert('t_dokter', $data);
        return $this->db->affected_rows();
    }

    public function tambahPerawat()
    {
        $data = [
            "id_perawat" => $this->input->post('id-perawat', true),
            "nama" => $this->input->post('nama-perawat', true),
            "no_telp" => $this->input->post('no-telp', true),
            "alamat" => $this->input->post('alamat-perawat', true),
            "id_user" => $this->session->userdata('id_user')
        ];
        $this->db->insert('t_perawat', $data);
        return $this->db->affected_rows();
    }
}
