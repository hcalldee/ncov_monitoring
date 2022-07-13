<?php
class T_location extends CI_Model
{
    private $tb = 't_location';
    private $t_id = 'id_location';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->get($this->tb)->result();
        } else {
            return $this->db->get_where($this->tb, [$this->t_id => $id]);
        }
    }

    public function getPerawat($id = null)
    {
        if (!$id) {
            $sql = "SELECT * from t_user join t_location on t_user.id_location = t_location.id_location join t_perawat on t_perawat.id_user = t_user.id_user where t_user.role_id != 2 ";
            return $this->db->query($sql)->result();
        } else {
        }
    }
    public function getDokter($id = null)
    {
        if (!$id) {
            $sql = "SELECT * from t_user join t_location on t_user.id_location = t_location.id_location join t_dokter on t_dokter.id_user = t_user.id_user";
            return $this->db->query($sql)->result();
        } else {
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
        return $this->db->query($query)->result();
    }
}
