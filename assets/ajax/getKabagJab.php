<?php
if (isset($_POST['input']) === true && empty($_POST['input']) === false) {

    $con = include 'connectionRoute.php';
    
    $sql = "SELECT jabPegawai FROM `resource_pegawai` where flagSoftDelete IS NULL AND jabPegawai LIKE 'Kepala Bagian%' and idBagian = ".$_POST['input'];

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['jabPegawai'];
    }
}
