<?php

class M_pegawai extends CI_Model
{
    public function getAllPegawaiData(){
        $sql = "select namaPegawai, nipPegawai, jabPegawai from resource_pegawai";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getPegawaiData($idBag){
        $sql = "select namaPegawai, jabPegawai from resource_pegawai where idBagian = '".$idBag."' and (flagSoftDelete = '0' or flagSoftDelete IS NULL) order by namaPegawai asc";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function insertPegawaiData($idBag){

        // {Get Data}
            $data = array(
                'idPegawai' => time(),
                'idBagian' => $idBag,
                'namaPegawai' => $this->input->post('nama-container'),
                'nipPegawai' => $this->input->post('nip-container'),
                'golPegawai' => $this->input->post('gol-container'),
                'panPegawai' => $this->input->post('pan-container'),
                'jabPegawai' => $this->input->post('jab-container'),
                'isAbleToSign' => $this->input->post('tandatangan-container')
            );
        // 
            $this->db->insert(RES_PEG, $data); 
    }

    public function updatePegawaiData($idBag){

        // {Get Data}
            $data = array(
                'namaPegawai' => $this->input->post('nama-container'),
                'nipPegawai' => $this->input->post('nip-container'),
                'golPegawai' => $this->input->post('gol-container'),
                'panPegawai' => $this->input->post('pan-container'),
                'jabPegawai' => $this->input->post('jab-container'),
                'isAbleToSign' => $this->input->post('tandatangan-container')
            );
        // 
            $this->db->where('idPegawai', $this->input->post('id-container'));
            $this->db->update(RES_PEG, $data); 
    }

    public function hapusPegawaiData(){

        $sql = "UPDATE `resource_pegawai` SET `flagSoftDelete`='1' WHERE idPegawai = '".$this->input->post('id-container')."'";

        $query = $this->db->query($sql);

        return $query;
    }

    public function getPenandaTangan($idBag){
        $sql = "SELECT * FROM resource_pegawai
        where 
        (((jabPegawai like 'KEPALA%' or isAbleToSign = '1') and idBagian = '".$idBag."') 
        or jabPegawai like '%Asisten%'
        or jabPegawai like 'Staf Ahli%'  
        or jabPegawai like 'Sekretaris Daerah') and (flagSoftDelete = '0' or flagSoftDelete IS NULL)
        ORDER BY `resource_pegawai`.`idBagian` ASC;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}
