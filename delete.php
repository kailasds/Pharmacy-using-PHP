<?php
$id = $_POST["num2"];
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
$sql = "delete from medicines where id='$id'";
$result = mysqli_query($conn, $sql);
$ret = "successfull";
echo $ret;
?>
<?php ?>
