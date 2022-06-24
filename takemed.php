<?php
$name = $_POST["num3"];
$amt = $_POST["num4"];
$qty = $_POST["qty"];
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
$sql = "insert into status (name,amt,qty) values('$name','$amt','$qty')";
$result = mysqli_query($conn, $sql);
$ret = "successfull";
echo $ret;
?>
<?php ?>
