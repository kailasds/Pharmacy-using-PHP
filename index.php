<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a684c606ac.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


    <title>Medical Shop</title>



</head>
<body>
    <center>
    <form method="post" action="">
    <table border="2" align="center" cellpadding="5" cellspacing="5">
    <tr>
        <td> Medicine Name : </td>
        <td> <input type="text" name="name" placeholder="enter medicine name"></td>
    </tr>
    <tr>
        <td>Brand Name : </td>
        <td><input type="text" name="brand" placeholder="enter brand name"></td>
    </tr>
    <tr>
        <td>Amount :  </td>
        <td><input type="number" name="amt" placeholder="enter amount"></td>
    </tr>
    </table><br>
    <input type="submit" name="submit">
    </form>
    </center>
</body>
</html>



<?php
if (isset($_POST["submit"])) {
    $amt = $_POST["amt"];
    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
    $sql = "insert into medicines(name,brand,amount) values ('$name','$brand','$amt')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        ?>
                <script>
                  alert('Entered Successfully'); {
                 };
                </script>

              <?php
} else {
        ?>
                <script>
                  alert('Something went wrong.Try again');
                </script>
              <?php
}
}
?>




<?php
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
$query = "select * from medicines";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    ?>

<table id="table_id" class="display" >
    <thead>
    <tr>
        <th> ID</th>
        <th> Medicine Name </th>
        <th> Brand </th>
        <th> Amount </th>
        <th>Quantity </th>
        <th> Edit </th>
        <th> Delete </th>
        <th> Take </th>
    </tr>
    </thead>
    <tbody>
<?php while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr class="row">
        <td><input type="number" class="num2" value="<?php echo $row["id"]; ?>" > </td>
        <td><input type="text" class="num3" value="<?php echo $row["name"]; ?> "> </td>
        <td><input type="text" class="num1" value="<?php echo $row["brand"]; ?> "></td>
        <td><input type="number" class="num4" value="<?php echo $row["amount"]; ?>" > </td>
        <td><input type="number" class="qty"  value="1"></td>
        <td><button  class="btn1">Update</button></td>
        <td><button  class="btn2"><i class="far fa-trash-alt"></i></button></td>
        <td><button  class="btn3" id="btn1">Take</button></td>
    </tr>


<?php
}?>
    </tbody>
    <p id="result2"></p>

<script>$(".btn1").click(function () {
        row = $(this).closest(".row");
        num2 = row.find(".num2")[0].value;
        num3 = row.find(".num3")[0].value;
        alert(num3);
        $.ajax({
            url: "update.php",
            type: "post",
            datatype: "json",
            data: {
                num2: num2,
                num3: num3
            },
            success: function (result) {
                alert("success");
                $("#result2").html(result);
            }
        })
    })
</script>

<script>$(".btn3").click(function () {
        row = $(this).closest(".row");
        num3 = row.find(".num3")[0].value;
        num4 = row.find(".num4")[0].value;
        qty = row.find(".qty")[0].value;
        $.ajax({
            url: "takemed.php",
            type: "post",
            datatype: "json",
            data: {
                num3: num3,
                num4: num4,
                qty:qty
            },
            success: function (result) {
                location.reload(true);
            }
        })
    })
</script>



<script>
    $(document).ready(function(){
        $(".btn2").click(function () {
            row = $(this).closest(".row");
            num2 = row.find(".num2")[0].value;
            $.ajax({
                url: "delete.php",
                type: "post",
                datatype: "json",
                data: {
                    num2: num2
                },
                success: function (result) {
                    alert("success");
                    location.reload(true);
                   // $("#result2").html(result);
                },
                error: function(result){
                  alert(result);
                }
            });
        })
    })
</script>
</table>

    <br><br><br>
<?php
}
?>


<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
    });
</script>




<?php
$conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
$query = "select * from status";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    ?>

<div id="printdivcontent"  >
<table id="table_id2" class="display" >
    <thead>
    <tr>
        <th> Medicine Name </th>
        <th> Amount </th>
        <th> Quantity </th>
    </tr>
    </thead>
    <tbody>
<?php while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr class="row">
        <td><input type="text" id="name" value="<?php echo $row["name"]; ?> "> </td>
        <td><input type="number" class="amt" value="<?php echo $row["amt"]; ?>" > </td>
        <td><input type="number" class="qty" value="<?php echo $row["qty"]; ?>" > </td>
    </tr>
    <?php
}
    ?>

</table>
<center>
<?php
calc();?>

<br>
<input type="button" onclick="PrintDiv();" value="Print" />
</div>

<br>
<?php
}
?>

<center>
<form action="" method="POST">
 <input type="submit" name="newbill" value="NewBill">
</form>

<?php
if (isset($_POST["newbill"])) {
    newbill();
}
?>
<?php
function newbill()
{
    $conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
    $query = "delete from status";
    $result = mysqli_query($conn, $query);
    header("Refresh:0");
}
?>









<script>
    function PrintDiv() {
        var divContents = document.getElementById("printdivcontent").innerHTML;
        var printWindow = window.open('', '', 'height=800,width=800');
        printWindow.document.write('<html><head><title>Print DIV Content</title>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>







<!-- <button onclick="display()" >Click to Print</button>
      <script>
         function display() {
            window.print();
         }
      </script> -->



<?php
function calc()
{
    $conn = mysqli_connect("localhost", "root", "", "medicalshop") or die(mysqli_error($conn));
    $query = "select sum(amt*qty) from status";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    foreach ($row as $value) {
        echo "Total = " . $value . "<br>";
    }
}
?>

<script>
    $(document).ready( function () {
    $('#table_id2').DataTable();
    });
</script>


