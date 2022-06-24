<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head>
<body></body>
</html>

<?php
echo "fsdea";
 $from = $_POST["from"];
 $to = $_POST["to"];
echo "fsdea";
$conn = mysqli_connect("localhost", "root", "", "airline") or die(mysqli_error($conn));
$query = "select * from flights where src_airport='$from' and dest_airport='$to'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    ?>

<table id="table_id" class="display" >
    <thead>
    <tr>
        <th> ID</th>
        <th> Name </th>
        <th> Airline </th>
        <th> From </th>
        <th> To </th>
        <th> Departure  </th>
        <th> Economy </th>
        <th> Business </th>
        <th> First Class</th>
        <th> Book</th>
    </tr>
    </thead>
    <tbody>
<?php while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr class="row">
        <td><input type="number" class="num2" value="<?php echo $row["id"]; ?>" > </td>
        <td><input type="text" class="num3" value="<?php echo $row["name"]; ?> "> </td>
        <td><input type="text" class="num1" value="<?php echo $row["airline"]; ?> "></td>
        <td><input type="number" class="num4" value="<?php echo $row["src_airport"]; ?>" > </td>
        <td><input type="number" class="num4" value="<?php echo $row["dest_airport"]; ?>" > </td>
        <td><input type="number" class="num4" value="<?php echo $row["dept"]; ?>" > </td>
        <td><input type="number" class="num4" value="<?php echo $row["tck_eco"]; ?>" > </td>
        <td><input type="number" class="num4" value="<?php echo $row["tck_bus"]; ?>" > </td>
        <td><input type="number" class="num4" value="<?php echo $row["tck_fst"]; ?>" > </td>
        <td><button  class="btn3" id="btn1">Book</button></td>
    </tr>
    <?php
}?>
    </tbody>
</table>

<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
    });
</script>
