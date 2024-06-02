<?php

class M_dashboard extends CI_Model
{

    public function showAllAmountOfPerdin()
    {
        $this->db->select('COUNT(idRecap) as JumlahPerdin');
        $this->db->from('recap');
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function showAllSumOfMoney()
    {
        $this->db->select('sum(totalPembayaran) as TotalBayar');
        $this->db->from('recap');
        $query = $this->db->get();

        // Select namaPegawai, nip, jabatan FROM pegawai_table where idBagian = 9

        return $query->result_array();
    }

    public function dataGrafikJumlahPerdin()
    {
        $this->db->select('count(*) as totalPerdin,
        count(case when bagian_id="1" then 1 else null end) as tapum,
        count(case when bagian_id="2" then 1 else null end) as hukum,
        count(case when bagian_id="3"then 1 else null end) as bagor,
        count(case when bagian_id="4" then 1 else null end) as ekonom,
        count(case when bagian_id="5" then 1 else null end) as barjas,
        count(case when bagian_id="6" then 1 else null end) as kerjas,
        count(case when bagian_id="7" then 1 else null end) as umum,
        count(case when bagian_id="8" then 1 else null end) as prokopim,
        count(case when bagian_id="9" then 1 else null end) as renkeu,
        count(case when bagian_id="10" then 1 else null end) as admpem,
        count(case when bagian_id="11" then 1 else null end) as sda,
        count(case when bagian_id="12" then 1 else null end) as kesra');
        $this->db->from('recap');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function dataGrafikRealisasiPerdin()
    {
        $this->db->select('sum(totalPembayaran) as totalRealisasi,
        sum(case when bagian_id="1" then totalPembayaran end) as tapum,
        sum(case when bagian_id="2" then totalPembayaran end) as hukum,
        sum(case when bagian_id="3" then totalPembayaran end) as bagor,
        sum(case when bagian_id="4" then totalPembayaran end) as ekonom,
        sum(case when bagian_id="5" then totalPembayaran end) as barjas,
        sum(case when bagian_id="6" then totalPembayaran end) as kerjas,
        sum(case when bagian_id="7" then totalPembayaran end) as umum,
        sum(case when bagian_id="8" then totalPembayaran end) as prokopim,
        sum(case when bagian_id="9" then totalPembayaran end) as renkeu,
        sum(case when bagian_id="10" then totalPembayaran end) as admpem,
        sum(case when bagian_id="11" then totalPembayaran end) as sda,
        sum(case when bagian_id="12" then totalPembayaran end) as kesra');

        $this->db->from('recap');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function countPerdin($idBag){
        $sql = "select count(gi.idSubmit) as JumlahPerdin
                from recap_all_general_information as gi
                INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
                where assoc.idBagian = '".$idBag."' and gi.idStatus != 1";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function countSumOfMoney($idBag)
    {
        $sql = "select sum(mon.nominalGtAll) as TotalBayar    
                from recap_all_money_details as mon
                INNER JOIN recap_all_general_information as gi
                    on gi.idSubmit = mon.idSubmit
                INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on mon.idSubmit = assoc.idSubmit
                where assoc.idBagian = '".$idBag."' and gi.idStatus != 1";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function countPerdinTitipan($idBag){
        $sql = "select count(gi.idSubmit) as JumlahPerdin
                from recap_all_general_information as gi
                INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
                where assoc.idBagian = '".$idBag."' and gi.idStatus != 0";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function countSumOfMoneyTitipan($idBag)
    {
        $sql = "select sum(mon.nominalGtAll) as TotalBayar    
                from recap_all_money_details as mon
                INNER JOIN recap_all_general_information as gi
                    on gi.idSubmit = mon.idSubmit
                INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on mon.idSubmit = assoc.idSubmit
                where assoc.idBagian = '".$idBag."' and gi.idStatus != 0";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function countAllPerSection($idBag){
        $sql = "select kat.descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
        from recap_all_general_information as gi
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit
        INNER join resource_kategori as kat
            on gi.idKategori = kat.idKategori
        inner join recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        where assoc.idBagian = '".$idBag."' and gi.idStatus != 1 and gi.idKategori = 'dd'
        
        union all
        
        select kat.descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
        from recap_all_general_information as gi
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit
        INNER join resource_kategori as kat
            on gi.idKategori = kat.idKategori
        inner join recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        where assoc.idBagian = '".$idBag."' and gi.idStatus != 1 and gi.idKategori = 'ld'
        
        union all
        
        select kat.descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
        from recap_all_general_information as gi
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit
        INNER join resource_kategori as kat
            on gi.idKategori = kat.idKategori
        inner join recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        where assoc.idBagian = '".$idBag."' and gi.idStatus != 1 and gi.idKategori = 'lp'
        
        union all
        
        select 'Perjalanan Dinas Dalam Daerah (Titipan)' as descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
        from recap_all_general_information as gi
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit
        INNER join resource_kategori as kat
            on gi.idKategori = kat.idKategori
        inner join recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        where assoc.idBagian = '".$idBag."' and gi.idStatus != 0 and gi.idKategori = 'dd'
        
        union all
        
        select 'Perjalanan Dinas Luar Daerah (Titipan)' as descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
        from recap_all_general_information as gi
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit
        INNER join resource_kategori as kat
            on gi.idKategori = kat.idKategori
        inner join recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        where assoc.idBagian = '".$idBag."' and gi.idStatus != 0 and gi.idKategori = 'ld'
        
        union all
        
        select 'Perjalanan Dinas Luar Provinsi (Titipan)' as descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
        from recap_all_general_information as gi
        INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
            on gi.idSubmit = assoc.idSubmit
        INNER join resource_kategori as kat
            on gi.idKategori = kat.idKategori
        inner join recap_all_money_details as mon
            on gi.idSubmit = mon.idSubmit
        where assoc.idBagian = '".$idBag."' and gi.idStatus != 0 and gi.idKategori = 'lp';";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function countTotalPerSection($idBag){
        $sql = "select sum(JumlahPerdin) as JumlahPerdin, sum(TotalBayar) as TotalBayar
            from (
                select kat.descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
            from recap_all_general_information as gi
            INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
            INNER join resource_kategori as kat
                on gi.idKategori = kat.idKategori
            inner join recap_all_money_details as mon
                on gi.idSubmit = mon.idSubmit
            where assoc.idBagian = '".$idBag."' and gi.idStatus != 1 and gi.idKategori = 'dd'
            
            union all
            
            select kat.descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
            from recap_all_general_information as gi
            INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
            INNER join resource_kategori as kat
                on gi.idKategori = kat.idKategori
            inner join recap_all_money_details as mon
                on gi.idSubmit = mon.idSubmit
            where assoc.idBagian = '".$idBag."' and gi.idStatus != 1 and gi.idKategori = 'ld'
            
            union all
            
            select kat.descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
            from recap_all_general_information as gi
            INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
            INNER join resource_kategori as kat
                on gi.idKategori = kat.idKategori
            inner join recap_all_money_details as mon
                on gi.idSubmit = mon.idSubmit
            where assoc.idBagian = '".$idBag."' and gi.idStatus != 1 and gi.idKategori = 'lp'
            
            union all
            
            select 'Perjalanan Dinas Dalam Daerah (Titipan)' as descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
            from recap_all_general_information as gi
            INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
            INNER join resource_kategori as kat
                on gi.idKategori = kat.idKategori
            inner join recap_all_money_details as mon
                on gi.idSubmit = mon.idSubmit
            where assoc.idBagian = '".$idBag."' and gi.idStatus != 0 and gi.idKategori = 'dd'
            
            union all
            
            select 'Perjalanan Dinas Luar Daerah (Titipan)' as descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
            from recap_all_general_information as gi
            INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
            INNER join resource_kategori as kat
                on gi.idKategori = kat.idKategori
            inner join recap_all_money_details as mon
                on gi.idSubmit = mon.idSubmit
            where assoc.idBagian = '".$idBag."' and gi.idStatus != 0 and gi.idKategori = 'ld'
            
            union all
            
            select 'Perjalanan Dinas Luar Provinsi (Titipan)' as descKategori, count(gi.idSubmit) as JumlahPerdin, sum(mon.nominalGtAll) as TotalBayar
            from recap_all_general_information as gi
            INNER JOIN recap_associative_all_idsubmit_idbagian as assoc
                on gi.idSubmit = assoc.idSubmit
            INNER join resource_kategori as kat
                on gi.idKategori = kat.idKategori
            inner join recap_all_money_details as mon
                on gi.idSubmit = mon.idSubmit
            where assoc.idBagian = '".$idBag."' and gi.idStatus != 0 and gi.idKategori = 'lp') total;";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function countAllPerSectionGlobal(){

        $this->db->select('count(*) as totalPerdin,
        count(case when idBagian="1" then 1 else null end) as tapum,
        count(case when idBagian="2" then 1 else null end) as hukum,
        count(case when idBagian="3"then 1 else null end) as bagor,
        count(case when idBagian="4" then 1 else null end) as ekonom,
        count(case when idBagian="5" then 1 else null end) as barjas,
        count(case when idBagian="6" then 1 else null end) as kerjas,
        count(case when idBagian="7" then 1 else null end) as umum,
        count(case when idBagian="8" then 1 else null end) as prokopim,
        count(case when idBagian="9" then 1 else null end) as renkeu,
        count(case when idBagian="10" then 1 else null end) as admpem,
        count(case when idBagian="11" then 1 else null end) as sda,
        count(case when idBagian="12" then 1 else null end) as kesra');
        $this->db->from('recap_associative_all_idsubmit_idbagian');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getRecapGlobal(){

        $baseSql = "";
        $arraySql = array();
        $combinedSql = "";

        for ($idBagian=1; $idBagian <= 12 ; $idBagian++) { 
            $baseSql = 
            "select bag.idBagian, bag.namaBagian, 
                (select COUNT(asbag.idSubmit) 
                from recap_associative_all_idsubmit_idbagian as asbag 
                INNER JOIN recap_all_general_information as gi on asbag.idSubmit = gi.idSubmit
                WHERE asbag.idBagian = '".$idBagian."') allPerjadin,
                (select COUNT(asbag.idSubmit) 
                from recap_associative_all_idsubmit_idbagian as asbag 
                INNER JOIN recap_all_general_information as gi on asbag.idSubmit = gi.idSubmit
                WHERE asbag.idBagian = '".$idBagian."' and gi.idKategori = 'dd') PerjadinDD,
                (select COUNT(asbag.idSubmit) 
                from recap_associative_all_idsubmit_idbagian as asbag 
                INNER JOIN recap_all_general_information as gi on asbag.idSubmit = gi.idSubmit
                WHERE asbag.idBagian = '".$idBagian."' and gi.idKategori = 'ld') PerjadinLD,
                (select COUNT(asbag.idSubmit) 
                from recap_associative_all_idsubmit_idbagian as asbag 
                INNER JOIN recap_all_general_information as gi on asbag.idSubmit = gi.idSubmit
                WHERE asbag.idBagian = '".$idBagian."' and gi.idKategori = 'lp') PerjadinLP
            from resource_bagian as bag
            where bag.idBagian = '".$idBagian."'";

            if ($idBagian <12) {
                $combinedSql = $baseSql . " UNION ";
            }else{
                $combinedSql = $baseSql;
            }
            array_push($arraySql, $combinedSql);
        }
        $combinedSql = "";
        $totalQuery = "union select '' as idBagian, 'Total' as namaBagian, sum(allPerjadin), sum(PerjadinDD), sum(PerjadinLD), sum(PerjadinLP) from
        (";

        for($idBagian=0; $idBagian < 12; $idBagian++){
            $combinedSql = $combinedSql . $arraySql[$idBagian];
        }

        $finalQuery = $combinedSql . $totalQuery . $combinedSql . ") totalQuery;";

        $query = $this->db->query($finalQuery);

        return $query->result_array();
    }
}
