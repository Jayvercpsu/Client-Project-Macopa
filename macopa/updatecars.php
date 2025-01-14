<?php include('session.php'); ?>
<?php 
include('connect.php');
$id=$_GET['cid'];
$a = $_POST['idno'];
$b = $_POST['brand'];
$c = $_POST['model'];
$d = $_POST['power'];
$e = $_POST['color'];
$f = $_POST['price'];
mysqli_query($conn,"UPDATE cars SET idno='$a',brand='$b',model='$c',power='$d',color='$e',price='$f' WHERE idno='$id'");
header('location:cars.php');
 ?>