<?php
class T_perawat extends CI_Model
{
    private $tb = 't_perawat';
    private $t_id = 'id_perawat';
    public function get($id = null)
    {
        if ($id === null) {
            $sql = "
            SELECT * FROM t_perawat join t_user ON t_user.id_user = t_perawat.id_user group by username having role_id != 2
            ";
            return $this->db->query($sql)->result();
        } else {
            $sql = "
            SELECT * FROM t_perawat join t_user ON t_user.id_user = t_perawat.id_user group by username having role_id != 2 and t_perawat.id = ?
            ";
            return $this->db->query($sql, $id);
        }
    }

    public function getNama($id)
    {
        $sql = "
            SELECT * FROM t_perawat join t_user ON t_user.id_user = t_perawat.id_user group by username having role_id != 2 and t_perawat.id_user = ?
            ";
        return $this->db->query($sql, $id);
    }

    public function create($data)
    {
        $this->db->insert($this->tb, $data);
        return $this->db->affected_rows();
    }

    public function jaga($data)
    {
        $sql = "
        SELECT * FROM `t_perawat` 
        join t_tindakan on t_tindakan.id_perawat =  t_perawat.id_perawat 
        join t_jadwal on t_tindakan.id_jadwal =  t_jadwal.id_jadwal 
        join t_user on t_user.id_user = t_perawat.id_user
        where t_jadwal.tanggal= ? and t_user.role_id != 2 group by t_perawat.nama
        ";
        return $this->db->query($sql, $data)->result();
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
