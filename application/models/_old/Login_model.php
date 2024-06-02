<?php

class Login_model extends CI_Model
{
    public function setSession()
    {
        $this->db->select('idBagian, namaBagian, kodeBagian');
        $this->db->from('bagian');

        $this->db->where('username', $this->input->post('user'));
        $this->db->where('password', md5($this->input->post('pass')));
        //$this->db->where('password', $this->input->post('idbag'));

        $query = $this->db->get();

        return $query->result_array();

        // $this->db->where('idBagian', 9);
    }
    public function removeSession()
    {
        unset(
            $_SESSION['idBagian'],
            $_SESSION['namaBagian'],
            $_SESSION['kodeBagian']
        );
    }
}
