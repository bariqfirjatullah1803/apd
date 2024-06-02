<?php
if (isset($_POST['kegiatan']) === true && empty($_POST['kegiatan']) === false) {

    $con = include 'connectionRoute.php';

    // $sql  = "SELECT uangTransport FROM `resource_tujuan` WHERE namaTujuan = '" . $_POST['cityName'] . "'";

    $sql = "select idSubKegiatan from resource_sub_kegiatan where descSubKegiatan = '".$_POST['kegiatan']."'";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['idSubKegiatan'];
    }
}

