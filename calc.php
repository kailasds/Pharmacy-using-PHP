<?php
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
$query = "select sum(amt) from status";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
foreach ($row as $value) {
    echo "Total = " . $value . "<br>";
}
?>
<?php?>
