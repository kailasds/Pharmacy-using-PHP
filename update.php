<?php
$id = $_POST["num2"];
$name = $_POST["num3"];
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
$sql = "update medicines set name='$name' where id='$id'";
$result = mysqli_query($conn, $sql);
$ret = "successfull";
echo $ret;
?>
<?php ?>
