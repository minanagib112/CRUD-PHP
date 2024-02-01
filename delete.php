<?php
include "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM forms WHERE id = '$id'";
    $retval = mysqli_query($conn, $sql);
    if ($retval) {
        header("location: index.php");
    } else {
        die('Could not delete data: ' . mysqli_error($conn));
    }
}
