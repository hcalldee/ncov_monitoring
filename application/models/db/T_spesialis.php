<?php
class T_spesialis extends CI_Model
{
    private $tb = 't_spesialis';
    private $t_id = 'id_spesialis';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->get($this->tb)->result();
        } else {
            return $this->db->get_where($this->tb, [$this->t_id => $id])->result();
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
