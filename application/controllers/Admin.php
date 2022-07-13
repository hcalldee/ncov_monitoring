<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        is_logged_in();
        if ($this->session->userdata('username') != '' && $this->session->userdata('role_id') == 1) {
            $this->load->model('Admin_model', 'model');
        } else {
            redirect('index.php/auth');
        }
    }

    public function location()
    {
        $data['judul'] = 'Location';
        $data['perawat'] = $this->location->getPerawat();
        $data['dokter'] = $this->location->getDokter();
        $center = $this->place->get();
        $data['place'] = $center;
        $center = $center[0];
        $data['edit'] = $center;
        $data['center'] = [$center->LatRT, $center->LongRT];
        render('admin/location/index', $data); //helper template view
    }

    public function editLokasi()
    {
        $this->form_validation->set_rules('name', 'Nama Lokasi', 'required|trim');
        $this->form_validation->set_rules('latrt', 'RT Lat', 'required|trim');
        $this->form_validation->set_rules('latrb', 'RB Lat', 'required|trim');
        $this->form_validation->set_rules('latlt', 'LT Lat', 'required|trim');
        $this->form_validation->set_rules('latlb', 'LB Lat', 'required|trim');
        $this->form_validation->set_rules('longrt', 'RT Long', 'required|trim');
        $this->form_validation->set_rules('longrb', 'RB Long', 'required|trim');
        $this->form_validation->set_rules('longlt', 'LT Long', 'required|trim');
        $this->form_validation->set_rules('longlb', 'LB Long', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'nama_err' => form_error('name'),
                'latrt_err' => form_error('latrt'),
                'latrb_err' => form_error('latrb'),
                'latlt_err' => form_error('latlt'),
                'latlb_err' => form_error('latlb'),
                'longrt_err' => form_error('longrt'),
                'longrb_err' => form_error('longrb'),
                'longlt_err' => form_error('longlt'),
                'longlb_err' => form_error('longlb'),
            ];
        } else {
            $send = [
                'loc_name' => $this->input->post('name'),
                'LatRT' => $this->input->post('latrt'),
                'LatRB' => $this->input->post('latrb'),
                'LatLT' => $this->input->post('latlt'),
                'LatLB' => $this->input->post('latlb'),
                'LongRT' => $this->input->post('longrt'),
                'LongRB' => $this->input->post('longrb'),
                'LongLT' => $this->input->post('longlt'),
                'LongLB' => $this->input->post('longlb'),
            ];
            if ($this->place->update($send, $this->input->post('id')) > 0) {
                setFlash('success', 'Lokasi telah diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Lokasi berhasil di edit',
                ];
            } else {
                setFlash('error', 'Jadwal tidak ada perubahan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Lokasi tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['odp'] = $this->pasien->getStatus('ODP')->num_rows();
        $data['pdp'] = $this->pasien->getStatus('PDP')->num_rows();
        $data['positif'] = $this->pasien->getStatus('Positif')->num_rows();
        $data['jumlah'] = $this->pasien->getJml()->num_rows();
        $data['petugas'] = $this->perawat->jaga(date("Y-m-d", time()));

        render('admin/index', $data); //helper template view
    }

    public function kalender()
    {
        $data['judul'] = 'Kalender';
        $data['jadwal'] = $this->tindakan->get();
        render('admin/kalender/index', $data); //helper template view
        // render('home/index', $data); //helper template view
    }

    public function jadwal()
    {
        $data['judul'] = 'Jadwal';
        $data['jadwal'] = $this->jadwal->get();
        render('admin/jadwal/index', $data); //helper template view
    }

    public function hapusJadwal($id)
    {
        if ($this->jadwal->delete($id)) {
            setFlash('success', 'Jadwal telah dihapus'); //helper alert
        } else {
            setFlash('error', 'Jadwal gagal dihapus'); //helper alert
        }
        $message = 'deleted';
        echo json_encode($message);
    }

    public function tambahJadwal()
    {
        $this->form_validation->set_rules('tambah-tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('tambah-jam', 'Jam', 'required|trim');
        $this->form_validation->set_rules('tambah-kegiatan', 'Kegiatan', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'tambah_tgl_error' => form_error('tambah-tanggal'),
                'tambah_jam_error' => form_error('tambah-jam'),
                'tambah_kegiatan_error' => form_error('tambah-kegiatan'),
            ];
        } else {
            $send = [
                'tanggal' => $this->input->post('tambah-tanggal'),
                'jam' => preg_replace('/\s/', '', $this->input->post('tambah-jam') . ':00'),
                'deskripsi' => $this->input->post('tambah-kegiatan')
            ];
            if ($this->jadwal->create($send) > 0) {
                setFlash('success', 'Jadwal telah ditambhakan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Jadwal berhasil di Tambah',
                ];
            } else {
                setFlash('error', 'Jadwal gagal ditambahkan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Jadwal gagal di Tambah',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function editJadwal()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('jam', 'Jam', 'required|trim');
        $this->form_validation->set_rules('nama-kegiatan', 'Kegiatan', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'tgl_error' => form_error('tanggal'),
                'jam_error' => form_error('jam'),
                'nama_kegiatan_error' => form_error('nama-kegiatan'),
            ];
        } else {
            $send = [
                'tanggal' => $this->input->post('tanggal'),
                'jam' => preg_replace('/\s/', '', $this->input->post('jam') . ':00'),
                'deskripsi' => $this->input->post('nama-kegiatan')
            ];
            if ($this->jadwal->update($send, $this->input->post('id')) > 0) {
                setFlash('success', 'Jadwal telah diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Jadwal berhasil di edit',
                ];
            } else {
                // setFlash('error', 'Jadwal tidak ada perubahan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Jadwal tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function getJadwal()
    {
        echo json_encode($this->jadwal->get($this->input->post('id'))->row());
    }


    public function getTindakan()
    {
        echo json_encode($this->tindakan->get($this->input->post('id'))->row());
    }

    public function tindakan()
    {
        $data['judul'] = 'Tindakan';
        $data['tindakan'] = $this->tindakan->get();
        $data['pasien'] = $this->pasien->get();
        render('admin/tindakan/index', $data); //helper template view
    }

    public function tambahTindakan()
    {
        $this->form_validation->set_rules('pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required|trim');
        $this->form_validation->set_rules('dokter', 'Dokter', 'required|trim');
        $this->form_validation->set_rules('perawat', 'Perawat', 'required|trim');
        $this->form_validation->set_rules('keadaan_umum', 'Keadaan Umum', 'trim');
        $this->form_validation->set_rules('temperatur', 'Temperatur', 'trim');
        $this->form_validation->set_rules('tekanan_darah', 'Tekanan darah', 'trim');
        $this->form_validation->set_rules('jml_nafas', 'Jumlah Nafas', 'trim');
        $this->form_validation->set_rules('denyut_jantung', 'Denyut Jantung', 'trim');
        $this->form_validation->set_rules('gcs', 'GCS', 'trim');
        $this->form_validation->set_rules('kesadaran', 'Kesadaran', 'trim');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tindakan';
            $data['perawat'] = $this->perawat->get();
            $data['pasien'] = $this->pasien->get();
            $data['dokter'] = $this->dokter->get();
            $data['jadwal'] = $this->jadwal->get();
            render('admin/tindakan/tambah_tindakan', $data); //helper template view
        } else {
            $send = [
                'id_jadwal' => $this->input->post('jadwal'),
                'Keadaan_Umum' => $this->input->post('keadaan_umum'),
                'temp' => $this->input->post('temperatur'),
                'tekanan_darah' => $this->input->post('tekanan_darah'),
                'jml_nafas' => $this->input->post('jml_nafas'),
                'denyut_jantung' => $this->input->post('denyut_jantung'),
                'gcs' => $this->input->post('gcs'),
                'kesadaran' => $this->input->post('kesadaran'),
                'id_dokter' => $this->input->post('dokter'),
                'id_perawat' => $this->input->post('perawat'),
                'id_pasien' => $this->input->post('pasien'),
            ];
            $send = $this->tindakan->select($send);
            if ($this->tindakan->create($send) > 0) {
                setFlash('success', 'Tindakan telah ditambhakan'); //helper alert
            } else {
                setFlash('error', 'Tindakan gagal ditambhakan'); //helper alert
            }
            redirect('index.php/admin/tindakan');
        }
    }

    public function editTindakan($id = null)
    {
        if ($id == null) {
            redirect('index.php/admin/tindakan');
        } else {
            $this->form_validation->set_rules('pasien', 'Pasien', 'required|trim');
            $this->form_validation->set_rules('jadwal', 'Jadwal', 'required|trim');
            $this->form_validation->set_rules('dokter', 'Dokter', 'required|trim');
            $this->form_validation->set_rules('perawat', 'Perawat', 'required|trim');
            $this->form_validation->set_rules('keadaan_umum', 'Keadaan Umum', 'trim');
            $this->form_validation->set_rules('temperatur', 'Temperatur', 'trim');
            $this->form_validation->set_rules('tekanan_darah', 'Tekanan Darah', 'trim');
            $this->form_validation->set_rules('jml_nafas', 'Jumlah Nafas', 'trim');
            $this->form_validation->set_rules('denyut_jantung', 'Denyut Jantung', 'trim');
            $this->form_validation->set_rules('gcs', 'GCS', 'trim');
            $this->form_validation->set_rules('kesadaran', 'Kesadaran', 'trim');
            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Edit Tindakan';
                $data['tindakan'] = $this->tindakan->get($id)->row();
                $data['perawat'] = $this->perawat->get();
                $data['pasien'] = $this->pasien->get();
                $data['dokter'] = $this->dokter->get();
                $data['jadwal'] = $this->jadwal->get();
                render('admin/tindakan/edit_tindakan', $data); //helper template view
            } else {
                $send = [
                    'id_jadwal' => $this->input->post('jadwal'),
                    'Keadaan_Umum' => $this->input->post('keadaan_umum'),
                    'temp' => $this->input->post('temperatur'),
                    'tekanan_darah' => $this->input->post('tekanan_darah'),
                    'jml_nafas' => $this->input->post('jml_nafas'),
                    'denyut_jantung' => $this->input->post('denyut_jantung'),
                    'gcs' => $this->input->post('gcs'),
                    'kesadaran' => $this->input->post('kesadaran'),
                    'id_dokter' => $this->input->post('dokter'),
                    'id_perawat' => $this->input->post('perawat'),
                    'id_pasien' => $this->input->post('pasien'),
                ];
                $send = $this->tindakan->select($send);
                if ($this->tindakan->update($send, $id) > 0) {
                    setFlash('success', 'Tindakan telah diedit'); //helper alert
                } else {
                    setFlash('error', 'Tindakan gagal diedit'); //helper alert
                }
                redirect('index.php/admin/tindakan');
            }
        }
    }

    public function hapusTindakan()
    {
        if ($this->input->post('id') === null) {
            redirect('index.php/admin/tindakan');
        } else {
            if ($this->tindakan->delete($this->input->post('id')) > 0) {
                setFlash('success', 'Tindakan telah dihapus'); //helper alert
            } else {
                setFlash('error', 'Tindakan gagal dihapus'); //helper alert
            }
        }
    }



    public function resep()
    {
        $data['judul'] = 'Resep';
        $data['resep'] =  $this->resep->get();
        $data['pasien'] = $this->pasien->get();
        $data['dokter'] = $this->dokter->get();
        render('admin/resep/index', $data); //helper template view
    }

    public function tambahResep()
    {
        $this->form_validation->set_rules('tambah_dokter', 'Dokter', 'required|trim');
        $this->form_validation->set_rules('tambah_pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('tambah-resep', 'Deskripsi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'tambah_dokter_error' => form_error('tambah_dokter'),
                'tambah_pasien_error' => form_error('tambah_pasien'),
                'tambah_deskripsi_error' => form_error('tambah-resep'),
            ];
        } else {
            $send = [
                'id_dokter' => $this->input->post('tambah_dokter'),
                'id_pasien' => $this->input->post('tambah_pasien'),
                'deskripsi' => $this->input->post('tambah-resep')
            ];
            if ($this->resep->create($send) > 0) {
                setFlash('success', 'Resep telah ditambahkan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'data resep berhasil ditambah',
                ];
            } else {
                setFlash('error', 'Resep gagal disimpan'); //helper alert
                $validasi = [
                    'status' => 'error',
                    'message' => 'Resep gagal disimpan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function editResep()
    {
        $this->form_validation->set_rules('dokter', 'Dokter', 'required|trim');
        $this->form_validation->set_rules('pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('edit-resep', 'Deskripsi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'dokter_error' => form_error('dokter'),
                'pasien_error' => form_error('pasien'),
                'deskripsi_error' => form_error('edit-resep'),
            ];
        } else {
            $send = [
                'id_dokter' => $this->input->post('dokter'),
                'id_pasien' => $this->input->post('pasien'),
                'deskripsi' => $this->input->post('edit-resep')
            ];
            if ($this->resep->update($send, $this->input->post('id')) > 0) {
                setFlash('success', 'Jadwal telah diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Resep berhasil di edit',
                ];
            } else {
                // setFlash('error', 'Resep tidak ada perubahan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Resep tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function getResep()
    {
        echo json_encode($this->resep->get($this->input->post('id'))->row());
    }

    public function hapusResep()
    {
        if ($this->input->post('id') === null) {
            redirect('index.php/admin/resep');
        } else {
            if ($this->resep->delete($this->input->post('id')) > 0) {
                setFlash('success', 'Resep telah dihapus'); //helper alert
            } else {
                setFlash('error', 'Resep gagal dihapus'); //helper alert
            }
        }
    }

    public function akun()
    {
        $data['judul'] = 'Manajemen Akun';
        $data['role'] = $this->model->arr_role();
        $data['username'] = $this->model->generateUsername();
        $data['akun'] = $this->model->getAkun()->result();
        render('admin/akun/index', $data); //helper template view
    }

    public function tambahAkun()
    {
        $data['judul'] = 'Manajemen Akun';
        $data['role'] = $this->model->arr_role();
        $data['username'] = $this->model->generateUsername();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            render('admin/akun/tambah_akun', $data); //helper template view
        } else {
            if ($this->model->tambahAkun() > 0) {
                setFlash('success', 'Akun telah ditambhakan'); //helper alert
            } else {
                setFlash('error', 'Akun gagal ditambhakan'); //helper alert
            }
            redirect('index.php/admin/akun');
        }
    }

    public function editAkun()
    {
        if (!$this->input->post('role-edit')) {
            setFlash('error', 'Tidak dapat mengedit akun'); //helper alert

        } else {
            if ($this->model->editAkun($this->input->post('id-user')) > 0) {
                setFlash('success', 'Akun berhasil diedit');
            } else {
                setFlash('error', 'Akun gagal diedit');
            }
        }
        redirect('index.php/admin/akun');
    }

    public function getAkun()
    {
        $data = array();
        $data['role'] = $this->model->arr_editRole();
        $data['akun'] = $this->model->getAkun($this->input->post('id'))->row();
        echo json_encode($data);
    }

    public function hapusAkun($id)
    {
        if ($this->model->hapusAkun($id)) {
            setFlash('success', 'Akun telah dihapus'); //helper alert
        } else {
            setFlash('error', 'Akun gagal dihapus'); //helper alert
        }
        $message = 'deleted';
        echo json_encode($message);
    }


    public function dokter()
    {
        $data['judul'] = 'Manajemen Dokter';
        $data['dokter'] = $this->model->getDokter()->result();
        render('admin/dokter/index', $data); //helper template view
    }

    public function detailDokter()
    {
        echo json_encode($this->model->getDokter($this->input->post('id'))->row());
    }

    // public function tambahDokter()
    // {
    //     $data['judul'] = 'Manajemen Dokter';
    //     render('admin/dokter/tambah_dokter', $data); //helper template view
    // }

    public function perawat()
    {
        $data['judul'] = 'Manajemen Perawat';
        $data['perawat'] = $this->model->getPerawat()->result();
        render('admin/perawat/index', $data); //helper template view
    }

    public function detailPerawat()
    {
        echo json_encode($this->model->getPerawat($this->input->post('id'))->row());
    }

    // public function tambahPerawat()
    // {
    //     $data['judul'] = 'Manajemen Perawat';
    //     render('admin/perawat/tambah_perawat', $data); //helper template view
    // }

    public function pasien()
    {
        $data['judul'] = 'Manajemen Pasien';
        $data['pasien'] = $this->model->getPasien()->result();
        render('admin/pasien/index', $data); //helper template view
    }

    public function detailPasien()
    {
        echo json_encode($this->model->getPasien($this->input->post('id'))->row());
    }

    public function tambahPasien()
    {
        $data['judul'] = 'Manajemen Pasien';
        $data['idPasien'] = $this->model->generateIdPasien();

        $this->form_validation->set_rules('id-pasien', 'ID Pasien', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('umur', 'umur', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tinggi-badan', 'Tinggi Badan', 'required|trim|numeric');
        $this->form_validation->set_rules('berat-badan', 'Berat Badan', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            render('admin/pasien/tambah_pasien', $data); //helper template view
        } else {
            if ($this->model->tambahPasien() > 0) {
                setFlash('success', 'Pasien telah ditambhakan'); //helper alert
            } else {
                setFlash('error', 'Pasien gagal ditambhakan'); //helper alert
            }
            redirect('index.php/admin/pasien');
        }
    }

    public function editPasien($id)
    {
        $data['judul'] = 'Manajemen Pasien';
        $data['pasien'] = $this->model->getPasien($id)->row();

        $this->form_validation->set_rules('id-pasien', 'ID Pasien', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('umur', 'umur', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('tinggi-badan', 'Tinggi Badan', 'required|trim|numeric');
        $this->form_validation->set_rules('berat-badan', 'Berat Badan', 'required|trim|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            render('admin/pasien/edit_pasien', $data); //helper template view
        } else {
            if ($this->model->editPasien($id) > 0) {
                setFlash('success', 'Pasien telah diedit'); //helper alert
            } else {
                setFlash('error', 'Pasien gagal diedit'); //helper alert
            }
            redirect('index.php/admin/pasien');
        }
    }

    public function hapusPasien($id)
    {
        if ($this->model->hapusPasien($id)) {
            setFlash('success', 'Pasien telah dihapus'); //helper alert
        } else {
            setFlash('error', 'Pasien gagal dihapus'); //helper alert
        }
        $message = 'deleted';
        echo json_encode($message);
    }

    public function spesialis()
    {
        $data['judul'] = 'Spesialis';
        $data['spesialis'] = $this->model->getSpesialis()->result();
        render('admin/spesialis/index', $data); //helper template view
    }

    public function getSpesialis()
    {
        echo json_encode($this->model->getSpesialis($this->input->post('id'))->row());
    }

    public function simpanSpesialis()
    {
        $id = $this->input->post('id', true);
        $data['judul'] = 'Spesialis';
        $this->form_validation->set_rules('spesialis', 'Spesialis', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $validasi = [
                'status' => 'error',
                'message' => 'Spesialis wajib diisi',
            ];
        } else {
            if (!$id) { //insert
                if ($this->model->tambahSpesialis() > 0) {
                    setFlash('success', 'Spesialis telah ditambahkan'); //helper alert
                    $validasi = [
                        'status' => 'success',
                        'message' => 'Data Berhasil ditambahkan',
                    ];
                } else {
                    setFlash('error', 'Spesialis gagal ditambahkan'); //helper alert
                }
            } else {
                if ($this->model->getSpesialis($id)->num_rows() > 0) {
                    if ($this->model->editSpesialis($id) > 0) { //update
                        setFlash('success', 'Spesialis telah diedit'); //helper alert
                        $validasi = [
                            'status' => 'success',
                            'message' => 'Data Berhasil diedtt',
                        ];
                    } else {
                        setFlash('error', 'Spesialis gagal diedit'); //helper alert
                        $validasi = [
                            'status' => 'error',
                            'message' => 'Spesialis tidak ada perubahan',
                        ];
                    }
                } else {
                    if ($this->model->tambahSpesialis() > 0) { //insert
                        setFlash('success', 'Spesialis telah tambahkan'); //helper alert
                        $validasi = [
                            'status' => 'success',
                            'message' => 'Data Berhasil ditambahkan',
                        ];
                    } else {
                        setFlash('error', 'Spesialis gagal ditambahkan'); //helper alert
                    }
                }
            }
        }
        echo json_encode($validasi);
    }

    public function hapusSpesialis($id)
    {
        if ($this->model->hapusSpesialis($id)) {
            setFlash('success', 'Spesialis telah dihapus'); //helper alert
        } else {
            setFlash('error', 'Spesialis gagal dihapus'); //helper alert
        }
        $message = 'deleted';
        echo json_encode($message);
    }
}
