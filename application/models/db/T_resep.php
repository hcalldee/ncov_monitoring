<?php
class T_resep extends CI_Model
{
    private $tb = 't_resep';
    private $t_id = 'id_resep';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->query(
                "select t_resep.id_resep, t_dokter.nama as dokter, t_pasien.nama as pasien, t_resep.deskripsi as deskripsi
                from t_resep 
                inner join t_dokter on t_dokter.id_dokter = t_resep.id_dokter
                inner join t_pasien on t_pasien.id_pasien = t_resep.id_pasien"
            )->result();
        } else {
            $sql = "select t_resep.id_resep, t_dokter.nama as dokter, t_pasien.nama as pasien, t_resep.deskripsi as deskripsi
                from t_resep 
                inner join t_dokter on t_dokter.id_dokter = t_resep.id_dokter
                inner join t_pasien on t_pasien.id_pasien = t_resep.id_pasien
                where id_resep = ?
                ";
            // $this->db->query($sql, $id);
            return $this->db->get_where($this->tb, [$this->t_id => $id]);
        }
    }
    public function create($data)
    {
        $this->db->insert($this->tb, $data);
        return $this->db->affected_rows();
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
}
