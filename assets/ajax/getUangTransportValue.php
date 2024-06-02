<?php
if (isset($_POST['cityName']) === true && empty($_POST['cityName']) === false) {

    $con = include 'connectionRoute.php';

    // $sql  = "SELECT uangTransport FROM `resource_tujuan` WHERE namaTujuan = '" . $_POST['cityName'] . "'";

    $sql = "select tuj.namaTujuan, rad.uangTransport
            from resource_tujuan as tuj
            INNER JOIN resource_radius as rad
                on tuj.idRadius = rad.idRadius
            where tuj.namaTujuan = '".$_POST['cityName']."'";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['uangTransport'];
    }
}

