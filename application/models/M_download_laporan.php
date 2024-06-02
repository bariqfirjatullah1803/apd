<?php

class M_download_laporan extends CI_Model
{

    public function getRequestedData(){

        $baseSelectQuery = 
            "SELECT 
                gi.idSubmit, 
                reskat.descKategori, 
                dur.dateSorter, dur.tanggalBerangkat, dur.tanggalKembali, dur.durasiDenganHari,
                dest.lokasi, dest.kotaKecamatan, dest.acara,
                alpeg.namaAll, alpeg.jabAll, alpeg.nipAll,
                mon.nominalUh, mon.nominalUhAll, mon.nominalUt, mon.nominalUtAll, mon.nominalRep, mon.nominalGtAll ";

        $additionalSelectQuery = "";
        // 
        $fromQuery = "    
            FROM recap_all_general_information as gi
            INNER JOIN resource_kategori as reskat
                on gi.idKategori = reskat.idKategori
            INNER JOIN recap_all_date_and_durations as dur
                on dur.idSubmit = gi.idSubmit
            INNER JOIN recap_all_destination_information as dest
                on dest.idSubmit = gi.idSubmit
            INNER JOIN recap_all_pegawai as alpeg
                on alpeg.idSubmit = gi.idSubmit
            INNER JOIN recap_all_money_details as mon
                on mon.idSubmit = gi.idSubmit
            INNER JOIN recap_associative_all_idsubmit_idbagian as asbag
                on asbag.idSubmit = gi.idSubmit ";

        $additionalFromQuery = "
            INNER JOIN resource_kegiatan as reskeg
                on reskeg.idKegiatan = gi.idKegiatan
            INNER JOIN resource_sub_kegiatan as ressubkeg
                on ressubkeg.idSubKegiatan = gi.idSubKegiatan ";

        $whereQuery = 
            "WHERE asbag.idBagian = '".$_SESSION['idBagian']."' 
                AND gi.idKategori = '".$_SESSION['paramKategoriPerjadin']."' 
                AND (dur.tanggalBerangkat like '%".$_SESSION['paramBulan']."%' or dur.tanggalBerangkat like '%".$_SESSION['paramBulanEn']."%') ";

        $additionalWhereQuery = "";

        // {Determine the final conditional based on $paramDownload parameter}
            // {1 per bulan}
            if ($paramDownload == 1) { 
                $additionalSelectQuery = "";
                $additionalFromQuery = "";
            }
            // {2 per kegiatan}
            if ($paramDownload == 2) {
                $additionalSelectQuery = ", reskeg.idKegiatan, reskeg.descKegiatan";
                $additionalFromQuery = " INNER JOIN resource_kegiatan as reskeg on reskeg.idKegiatan = gi.idKegiatan";
                $additionalWhereQuery = "AND gi.idKegiatan = '".$_SESSION['paramKodeKegiatan']."'";
            }
            // {3 per sub kegiatan}
            if ($paramDownload == 3) {
                $additionalSelectQuery = ", reskeg.idKegiatan, reskeg.descKegiatan, ressubkeg.idSubKegiatan, ressubkeg.descSubKegiatan";
                $additionalFromQuery = " INNER JOIN resource_kegiatan as reskeg on reskeg.idKegiatan = gi.idKegiatan INNER JOIN resource_sub_kegiatan as ressubkeg on ressubkeg.idSubKegiatan = gi.idSubKegiatan ";
                $additionalWhereQuery = "AND gi.idKegiatan = '".$_SESSION['paramKodeKegiatan']."' AND gi.idSubKegiatan = '".$_SESSION['paramKodeSubKegiatan']."'";
            }

        $sql =  $baseSelectQuery . $additionalSelectQuery . 
                $fromQuery . $additionalFromQuery . 
                $whereQuery . $additionalWhereQuery;
        
        $query = $this->db->query($sql);

        return $query->result_array();
    }

}