<?php
if (isset($_POST['nampeg']) === true && empty($_POST['nampeg']) === false) {

    $con = include 'connectionRoute.php';

    $sql  = "SELECT golongan FROM `pegawai_table` WHERE namaPegawai = '" . $_POST['nampeg'] . "'";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['golongan'];
    }
}
