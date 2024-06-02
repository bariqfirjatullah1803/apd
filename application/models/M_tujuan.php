<?php


class M_tujuan extends CI_Model
{

    public function getTujuanAndNominalTransport(){
        $sql = "select rtuj.namaTujuan, rtuj.jarak, rtuj.idRadius, rrad.uangTransport 
        from resource_tujuan as rtuj 
        INNER JOIN resource_radius as rrad 
        on rtuj.idRadius = rrad.idRadius 
        ORDER by rtuj.jarak ASC;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // {Dalam Daerah}
    public function getTujuanDD(){
        $sql = "
        select 
        rtuj.namaTujuan, rtuj.jarak, rtuj.idRadius, 
        rrad.uangTransport 
        from resource_tujuan as rtuj 
            INNER JOIN resource_radius as rrad 
            on rtuj.idRadius = rrad.idRadius 
        where rtuj.idRadius like '%dd%'
        ORDER by rtuj.jarak ASC;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // {Luar Daerah}
    public function getTujuanLD(){
        $sql = "
        select 
        rtuj.namaTujuan, rtuj.jarak, rtuj.idRadius, 
        rrad.uangTransport 
        from resource_tujuan as rtuj 
            INNER JOIN resource_radius as rrad 
            on rtuj.idRadius = rrad.idRadius 
        where rtuj.idRadius like '%ld%'
        ORDER by rtuj.jarak ASC;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    // {Luar Provinsi}
    public function getTujuanLP(){
        $sql = "select * from resource_tujuan_provinsi";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}