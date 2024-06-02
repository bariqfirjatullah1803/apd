<?php
if (isset($_POST['namaKotaKec']) === true && empty($_POST['namaKotaKec']) === false) {

    $con = include 'connectionRoute.php';

    // $sql  = "SELECT uangTransport FROM radius WHERE idRadius = '" . $_POST['nampeg'] . "'";
    $sql  = "SELECT uangTransport 
            FROM radius 
            WHERE idRadius = (
                SELECT radius_id
                FROM tujuan
                WHERE namaTujuan = '" . $_POST['namaKotaKec'] . "')";

    // "SELECT uangTransport 
    // FROM radius
    // WHERE idRadius = (
    //     SELECT radius_id 
    //     FROM tujuan 
    //     WHERE namaTujuan = 'Kota Batu')"

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['uangTransport'];
    }
}
