<?php
echo "hiiii";
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
    $query = "delete from status";
    $result = mysqli_query($conn, $query);
    header("Refresh:0");
?>