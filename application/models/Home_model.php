<?php

class Home_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('db/t_tindakan', 'tindakan');
    }
}
