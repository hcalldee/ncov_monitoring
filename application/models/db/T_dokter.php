<?php
class T_dokter extends CI_Model
{
    private $tb = 't_dokter';
    private $t_id = 'id_dokter';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->get($this->tb)->result();
        } else {
            return $this->db->get_where($this->tb, [$this->t_id => $id])->result_array();
        }
    }
    public function create($data)
    {
        $this->db->insert($this->tb, $data);
        return $this->db->affected_rows();
    }

    public function getNama($id)
    {
        $sql = "
            SELECT * FROM t_dokter join t_user ON t_user.id_user = t_dokter.id_user group by username having role_id != 2 and t_dokter.id_user = ?
            ";
        return $this->db->query($sql, $id);
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
