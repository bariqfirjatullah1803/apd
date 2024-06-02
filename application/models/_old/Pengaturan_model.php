<?php

class Pengaturan_model extends CI_Model
{
    public function getPegawai($idBag)
    {
        $this->db->select('idPegawai, namaPegawai, nip, golongan, pangkat, jabatan');
        $this->db->from('pegawai_table');
        $this->db->where('idBagian', $idBag);
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function updateDataPegawai(){

        $data = array(
            'namaPegawai' => $this->input->post('nama-pegawai-container'),
            'golongan' => $this->input->post('gol-pegawai-container'),
            'pangkat' => $this->input->post('pan-pegawai-container'),
            'jabatan' => $this->input->post('jab-pegawai-container')

        );
        $this->db->where('nip', $this->input->post('nip-pegawai-container'));
        $this->db->update('pegawai_table', $data);

        $dataPPTK = array(
            'namaPejabat' => $this->input->post('nama-pegawai-container'),
            'gol' => $this->input->post('gol-pegawai-container'),
            'pangkat' => $this->input->post('pan-pegawai-container'),
            'jabatan' => $this->input->post('jab-pegawai-container'),
        );
        $this->db->where('nip', $this->input->post('nip-pegawai-container'));
        $this->db->update('pejabat', $dataPPTK);
    }
}
