<?php
if (isset($_POST['user_name']) === true && empty($_POST['user_pass']) === false) {

    $con = include 'connectionRoute.php';

    $sql  = "SELECT idBagian FROM resource_bagian WHERE username = '" . mysqli_escape_string($con, $_POST['user_name']) . "' AND password = MD5('" . mysqli_escape_string($con, $_POST['user_pass']) . "')";

    $result = mysqli_query($con, $sql);

    if ($result === FALSE) {
        die(mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['idBagian'];
    }
}
