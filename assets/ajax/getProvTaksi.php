<?php
if (isset($_POST['provName']) === true && empty($_POST['provName']) === false) {

    $con = include 'connectionRoute.php';

    $sql = "SELECT biayaTaksi FROM `resource_tujuan_provinsi` WHERE namaProvinsi = '" . $_POST['provName'] . "'";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['biayaTaksi'];
    }
}
