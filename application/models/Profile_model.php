<?php

class Profile_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        $this->load->model('db/T_location', 'location');
        $this->load->model('db/T_place', 'place');
    }

    public function rules()
    {
        $rules = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'no-telp',
                'label' => 'No Telp',
                'rules' => 'required|trim|numeric'
            ],
        ];

        if ($this->session->userdata('role_id') == '3') {
            array_push($rules, [
                'field' => 'spesialis',
                'label' => 'Spesialis',
                'rules' => 'required|trim'
            ]);
        }

        return $rules;
    }

    public function rules_password()
    {
        $rules = [
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'password-baru',
                'label' => 'Password Baru',
                'rules' => 'required'
            ],
            [
                'field' => 'password-baru2',
                'label' => 'Re-Type Password',
                'rules' => 'required|matches[password-baru]'
            ],
        ];
        return $rules;
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

    public function getUser($id = '')
    {
        $this->db->select('t_user.id_user, t_user.username, t_user.image, t_user.role_id, t_role.name as role');
        $this->db->from('t_user');
        $this->db->join('t_role', 't_user.role_id = t_role.role_id');
        if ($id) {
            $this->db->where('id_user', $id);
        }
        return $this->db->get();
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

    public function editProfile($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "no_telp" => $this->input->post('no-telp', true),
        ];

        if ($this->session->userdata('role_id') == '3') {
            $data['id_spesialis'] = $this->input->post('spesialis');
            $this->db->where('id_user', $id);
            $this->db->update('t_dokter', $data);
        } else if ($this->session->userdata('role_id') == '4' || $this->session->userdata('role_id') == '2') {
            $this->db->where('id_user', $id);
            $this->db->update('t_perawat', $data);
        }
        return $this->db->affected_rows();
    }


    function uploadImage($foto)
    {
        // $file_name = sha1($label . '_' . $email . $periodeId->pdfPrdId);
        $file_path = FCPATH . '/assets/img/profile';
        $file_path_thumb =  FCPATH . '/assets/img/thumbnail';
        $file_name = 'fp_' . $this->session->userdata('id_user');

        $config['upload_path']          = $file_path;
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 2048;
        $config['file_name']             = $file_name;
        //			$config['file_name'] = md5(date("Ymdhis"));
        $config['overwrite'] = TRUE;

        $this->load->library('Handle_file', $config, 'upload');
        $this->upload->initialize($config);

        $open = '';
        $open = '<small class="form-text text-danger ml-1">';
        $close = '</small>';

        // jika ada error
        if (!$this->upload->do_upload('foto-profil')) {
            return (object) array('status' => false, 'message' => $open . $this->upload->display_errors() . $close, 'imageName' => null);
        } else {
            $image = $this->upload->data();
            $imageName = $image['file_name'];

            $config['image_library'] = 'gd2';
            $config['source_image'] = $file_path . '/' . $imageName;
            $config['create_thumb'] = FALSE;
            $config['width'] = '400';
            $config['new_image'] = $file_path_thumb . '/thumb_' . $imageName;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            // hapus foto asli
            $without_extension = substr($imageName, 0, strrpos($imageName, "."));
            $files = glob($file_path . '/' . $without_extension . '.*');
            foreach ($files as $file) {
                if ($file != $file_path . '/' . $imageName) {
                    unlink($file);
                }
            }

            // hapus foto thumbnails
            $without_extension = substr($imageName, 0, strrpos($imageName, "."));
            $files = glob($file_path_thumb . '/' . $without_extension . '.*');
            foreach ($files as $file) {
                if ($file != $file_path_thumb . '/' . $imageName) {
                    unlink($file);
                }
            }
            return (object) array('status' => true, 'message' =>  '', 'imageName' => $imageName);
        }
    }

    public function editFoto($foto)
    {
        $data = [
            "image" => $foto
        ];
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('t_user', $data);

        return $this->db->affected_rows();
    }

    public function getPassword($id = '')
    {
        $this->db->select('password');
        $this->db->from('t_user');
        if ($id) {
            $this->db->where('id_user', $id);
        }
        return $this->db->get();
    }
    public function editPassword($password)
    {
        $data = [
            "password" => password_hash($password, PASSWORD_DEFAULT),
        ];
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('t_user', $data);

        return $this->db->affected_rows();
    }
}
