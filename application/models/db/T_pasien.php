<?php
class T_pasien extends CI_Model
{
    private $tb = 't_pasien';
    private $t_id = 'id_pasien';
    private $t_status = 'status';
    public function get($id = null)
    {
        if ($id === null) {
            return $this->db->get($this->tb)->result();
        } else {
            return $this->db->get_where($this->tb, [$this->t_id => $id])->result_array();
        }
    }

    public function getStatus($tipe, $id = null)
    {
        if ($id === null) {
            return $this->db->get_where($this->tb, [$this->t_status => $tipe]);
        } else {
            return $this->db->get_where($this->tb, [$this->t_id => $id]);
        }
    }

    public function getJml()
    {
        return $this->db->get($this->tb);
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
