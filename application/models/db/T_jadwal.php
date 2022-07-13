<?php
class T_jadwal extends CI_Model
{
    private $tb = 't_jadwal';
    private $t_id = 'id_jadwal';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->get($this->tb)->result();
        } else {
            $sql = "SELECT " . $this->t_id . ", DATE_FORMAT(tanggal,'%Y-%m-%d') as tanggal, TIME_FORMAT(jam,'%H:%i') as jam , deskripsi FROM " . $this->tb . " where " . $this->t_id . " = ?";
            return $this->db->query($sql, array($id));
        }
    }
    public function create($data)
    {
        $this->db->query("ALTER TABLE " . $this->tb . " AUTO_INCREMENT = 0");
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
        return $this->db->query($query);
    }
}
