<?php


class M_kode_sipd extends CI_Model
{

    public function getKodeSIPD($idBagian){
        $sql = 
        "select rk.idKegiatan, rk.descKegiatan,  rsk.idSubKegiatan, rsk.descSubKegiatan
        from resource_kegiatan as rk
        INNER JOIN resource_sub_kegiatan as rsk
        on rsk.idKegiatan = rk.idKegiatan
        where idBagian = ".$idBagian;

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function getSIPDUmum(){
        $sql = 
        "select rk.idKegiatan, rk.descKegiatan,  rsk.idSubKegiatan, rsk.descSubKegiatan
        from resource_kegiatan as rk
        INNER JOIN resource_sub_kegiatan as rsk
        on rsk.idKegiatan = rk.idKegiatan
        where idBagian = 7";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}