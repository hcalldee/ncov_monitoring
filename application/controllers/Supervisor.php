<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supervisor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess();
        is_logged_in();
        $this->load->model('Supervisor_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['odp'] = $this->pasien->getStatus('ODP')->num_rows();
        $data['pdp'] = $this->pasien->getStatus('PDP')->num_rows();
        $data['positif'] = $this->pasien->getStatus('Positif')->num_rows();
        $data['jumlah'] = $this->pasien->getJml()->num_rows();
        $data['petugas'] = $this->perawat->jaga(date("Y-m-d", time()));
        render('supervisor/index', $data); //helper template view
    }


    public function kalender()
    {
        $data['judul'] = 'Kalender';
        $data['jadwal'] = $this->tindakan->get();
        render('supervisor/kalender/index', $data); //helper template view
    }

    public function jadwal()
    {
        $data['judul'] = 'Jadwal';
        $data['jadwal'] = $this->jadwal->get();
        render('supervisor/jadwal/index', $data); //helper template view
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
        echo json_encode($this->tindakan->getTindakan($this->input->post('id'))->row());
    }

    public function getinfo()
    {
        echo json_encode($this->tindakan->get($this->input->post('id'))->row());
    }

    public function tindakan()
    {
        $data['judul'] = 'Tindakan';
        $data['tindakan'] = $this->tindakan->get();
        $data['pasien'] = $this->pasien->get();
        $data['perawat'] = $this->perawat->get();
        $data['dokter'] = $this->dokter->get();
        $data['jadwal'] = $this->jadwal->get();
        render('supervisor/tindakan/index', $data); //helper template view
    }

    public function tambahTindakan()
    {
        $this->form_validation->set_rules('tambah_pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('tambah_jadwal', 'Jadwal', 'required|trim');
        $this->form_validation->set_rules('tambah_dokter', 'Dokter', 'required|trim');
        $this->form_validation->set_rules('tambah_perawat', 'Perawat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $validasi = [
                'status' => 'error',
                'tambah_pasien_error' => form_error('tambah_pasien'),
                'tambah_jadwal_error' => form_error('tambah_jadwal'),
                'tambah_dokter_error' => form_error('tambah_dokter'),
                'tambah_perawat_error' => form_error('tambah_perawat'),
            ];
        } else {
            $send = [
                'id_jadwal' => $this->input->post('tambah_jadwal'),
                'id_dokter' => $this->input->post('tambah_dokter'),
                'id_perawat' => $this->input->post('tambah_perawat'),
                'id_pasien' => $this->input->post('tambah_pasien'),
            ];
            if ($this->tindakan->create($send) > 0) {
                setFlash('success', 'Tindakan telah ditambahakan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Tindakan berhasil di edit',
                ];
            } else {
                setFlash('error', 'Tindakan gagal ditambahakan'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Tindakan tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function editTindakan()
    {
        $this->form_validation->set_rules('edit_pasien', 'Pasien', 'required|trim');
        $this->form_validation->set_rules('edit_jadwal', 'Jadwal', 'required|trim');
        $this->form_validation->set_rules('edit_dokter', 'Dokter', 'required|trim');
        $this->form_validation->set_rules('edit_perawat', 'Perawat', 'required|trim');
        if ($this->form_validation->run() == false) {
            $validasi = [
                'status' => 'error',
                'edit_pasien_error' => form_error('edit_pasien'),
                'edit_jadwal_error' => form_error('edit_jadwal'),
                'edit_dokter_error' => form_error('edit_dokter'),
                'edit_perawat_error' => form_error('edit_perawat'),
            ];
            //helper template view
        } else {
            $send = [
                'id_jadwal' => $this->input->post('edit_jadwal'),
                'id_dokter' => $this->input->post('edit_dokter'),
                'id_perawat' => $this->input->post('edit_perawat'),
                'id_pasien' => $this->input->post('edit_pasien'),
            ];
            if ($this->tindakan->update($send, $this->input->post('id')) > 0) {
                setFlash('success', 'Tindakan telah diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Tindakan berhasil di edit',
                ];
            } else {
                setFlash('error', 'Tindakan gagal diedit'); //helper alert
                $validasi = [
                    'status' => 'success',
                    'message' => 'Tindakan tidak ada perubahan',
                ];
            }
        }
        echo json_encode($validasi);
    }

    public function hapusTindakan()
    {
        if ($this->input->post('id') === null) {
            redirect('index.php/supervisor/tindakan');
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
        render('supervisor/resep/index', $data); //helper template view
    }

    public function getResep()
    {
        echo json_encode($this->resep->get($this->input->post('id'))->row());
    }

    public function dokter()
    {
        $data['judul'] = 'Manajemen Dokter';
        $data['dokter'] = $this->model->getDokter()->result();
        render('supervisor/dokter/index', $data); //helper template view
    }

    public function detailDokter()
    {
        echo json_encode($this->model->getDokter($this->input->post('id'))->row());
    }


    public function perawat()
    {
        $data['judul'] = 'Manajemen Perawat';
        $data['perawat'] = $this->perawat->get();
        render('supervisor/perawat/index', $data); //helper template view
    }

    public function detailPerawat()
    {
        echo json_encode($this->perawat->get($this->input->post('id'))->row());
    }


    public function pasien()
    {
        $data['judul'] = 'Manajemen Pasien';
        $data['pasien'] = $this->model->getPasien()->result();
        render('supervisor/pasien/index', $data); //helper template view
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
            render('supervisor/pasien/tambah_pasien', $data); //helper template view
        } else {
            if ($this->model->tambahPasien() > 0) {
                setFlash('success', 'Pasien telah ditambhakan'); //helper alert
            } else {
                setFlash('error', 'Pasien gagal ditambhakan'); //helper alert
            }
            redirect('index.php/supervisor/pasien');
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
            render('supervisor/pasien/edit_pasien', $data); //helper template view
        } else {
            if ($this->model->editPasien($id) > 0) {
                setFlash('success', 'Pasien telah diedit'); //helper alert
            } else {
                setFlash('error', 'Pasien gagal diedit'); //helper alert
            }
            redirect('index.php/supervisor/pasien');
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
}
