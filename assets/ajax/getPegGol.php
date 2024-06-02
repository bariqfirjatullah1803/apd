<?php
if (isset($_POST['nampeg']) === true && empty($_POST['nampeg']) === false) {

    $con = include 'connectionRoute.php';

    $cleanedUpNampeg = $_POST['nampeg'];
    if (strpos($_POST['nampeg'], "'") !== False) {
        $cleanedUpNampeg = str_replace("'", "\'", $_POST['nampeg']);
    }

    $sql  = "SELECT golPegawai FROM `resource_pegawai` WHERE namaPegawai = '" . $cleanedUpNampeg . "' AND flagSoftDelete IS NULL";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['golPegawai'];
    }
}
