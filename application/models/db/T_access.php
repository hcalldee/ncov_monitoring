<?php
class T_access extends CI_Model
{
    private $tb = 'user_access_menu';
    private $t_id = 'id';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->get($this->tb)->result_array();
        } else {
            return $this->db->get_where($this->tb, [$this->t_id => $id])->result_array();
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
