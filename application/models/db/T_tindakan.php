<?php
class T_tindakan extends CI_Model
{
    private $tb = 't_tindakan';
    private $t_id = 'id_tindakan';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->query(
                "select t_tindakan.id_tindakan, t_jadwal.tanggal as tanggal, t_jadwal.jam as jam, t_tindakan.temp, t_tindakan.tekanan_darah, t_tindakan.denyut_jantung, t_tindakan.jml_nafas, t_tindakan.gcs, t_tindakan.kesadaran ,
                t_tindakan.Keadaan_Umum, t_jadwal.deskripsi as deskripsi, t_dokter.nama as dokter, t_pasien.nama as pasien, 
                t_perawat.nama as perawat from t_tindakan 
                inner join t_dokter on t_dokter.id_dokter = t_tindakan.id_dokter
                inner join t_jadwal on t_jadwal.id_jadwal = t_tindakan.id_jadwal
                inner join t_pasien on t_pasien.id_pasien = t_tindakan.id_pasien
                inner join t_perawat on t_perawat.id_perawat = t_tindakan.id_perawat"
            )->result();
        } else {
            $sql = "
            select t_tindakan.id_tindakan, t_jadwal.deskripsi as deskripsi, t_jadwal.jam as jam, t_tindakan.Keadaan_Umum, 
            t_tindakan.temp, t_tindakan.tekanan_darah, t_tindakan.denyut_jantung, t_tindakan.jml_nafas, t_tindakan.gcs, t_tindakan.kesadaran ,t_dokter.nama as dokter, t_pasien.nama as pasien, t_perawat.nama as perawat  
            from t_tindakan 
            inner join t_dokter on t_dokter.id_dokter = t_tindakan.id_dokter
            inner join t_jadwal on t_jadwal.id_jadwal = t_tindakan.id_jadwal
            inner join t_pasien on t_pasien.id_pasien = t_tindakan.id_pasien
            inner join t_perawat on t_perawat.id_perawat = t_tindakan.id_perawat where id_tindakan = ?
            ";
            return $this->db->query($sql, $id);
        }
    }
    public function create($data)
    {
        $this->db->insert($this->tb, $data);
        return $this->db->affected_rows();
    }

    public function getTindakan($id = null)
    {
        return $this->db->get_where($this->tb, [$this->t_id => $id]);
    }
    public function update($data, $id)
    {
        $this->db->update($this->tb, $data, [$this->t_id => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete($this->tb, [$this->t_id => $id]);
        return $this->db->affected_rows();
    }
    public function query($query)
    {
        return $this->db->query($query)->result();
    }

    public function select($data)
    {
        $kirim = [
            'id_jadwal' => $data['id_jadwal'],
            'id_dokter' => $data['id_dokter'],
            'id_perawat' => $data['id_perawat'],
            'id_pasien' => $data['id_pasien'],
        ];
        if ($data['Keadaan_Umum'] != null) {
            $kirim['Keadaan_Umum'] =  $data['Keadaan_Umum'];
        }
        if ($data['temp'] != null) {
            $kirim['temp'] = $data['temp'];
        }
        if ($data['tekanan_darah'] != null) {
            $kirim['tekanan_darah'] = $data['tekanan_darah'];
        }
        if ($data['jml_nafas'] != null) {
            $kirim['jml_nafas'] = $data['jml_nafas'];
        }

        if ($data['denyut_jantung'] != null) {
            $kirim['denyut_jantung'] = $data['denyut_jantung'];
        }
        if ($data['gcs'] != null) {
            $kirim['gcs'] = $data['gcs'];
        }
        if ($data['kesadaran'] == null) {
        } else {
            $kirim['kesadaran'] = $data['kesadaran'];
        }
        return $kirim;
    }
}
