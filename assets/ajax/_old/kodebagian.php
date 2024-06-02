<?php
if (isset($_POST['idBag']) === true && empty($_POST['idBag']) === false) {

    $con = include 'connectionRoute.php';

    $sql  = "SELECT kodebagian FROM `bagian` WHERE idBagian = '" . $_POST['idBag'] . "'";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['kodebagian'];
    }
}
