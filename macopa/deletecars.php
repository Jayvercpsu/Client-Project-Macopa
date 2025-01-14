<?php include('session.php'); ?>
<?php 
$id=$_GET['cid'];
include('connect.php');
mysqli_query($conn, "DELETE FROM cars WHERE idno='$id' ");
header('location:cars.php');
 ?>