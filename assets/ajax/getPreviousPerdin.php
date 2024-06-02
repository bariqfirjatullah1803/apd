<?php
if (isset($_POST['tanggal']) === true && empty($_POST['tanggal']) === false) {
    if (isset($_POST['lokasi']) === true && empty($_POST['lokasi']) === false) {
        if (isset($_POST['namaPegawai']) === true && empty($_POST['namaPegawai']) === false) {

            $con = include 'connectionRoute.php';

            // $sql = "SELECT idRecap FROM `pegawai_table` WHERE namaPegawai = '" . $_POST['nampeg'] . "'";
            // $sql = "SELECT idRecap FROM `recap` WHERE tglBerangkat like '%" . $_POST['tanggal'] . "%' and 
            // tujuan_nama like '%" . $_POST['lokasi'] . "%' and namaPegawai like '%" . $_POST['namaPegawai'] . "%'";

            $sql = "
            select gi.idSubmit, dur.tanggalBerangkat, dest.kotaKecamatan, peg.namaAll
            from recap_all_general_information as gi
            inner JOIN recap_all_date_and_durations as dur
                on gi.idSubmit = dur.idSubmit
            inner JOIN recap_all_destination_information as dest
                on gi.idSubmit = dest.idSubmit
            inner JOIN recap_all_pegawai as peg
                on gi.idSubmit = peg.idSubmit
            where 
            dur.tanggalBerangkat like '%".$_POST['tanggal']."%' and 
            dest.kotaKecamatan like '%".$_POST['lokasi']."%' and 
            peg.namaAll like '%".$_POST['namaPegawai']."%';";

            $result = mysqli_query($con, $sql);

            if ($result === FALSE) {
                die(mysqli_error($con));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo $row['idSubmit'];
            }
        }
    }
}
