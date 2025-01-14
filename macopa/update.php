<?php include('session.php'); ?>
<?php 
include('connect.php');

// getting and update household registered in households table
$id=$_GET['sid'];
$a = $_POST['household_id'];
$b = $_POST['purok'];
$c = $_POST['head_of_household'];
//$d = $_POST['lastname'];
//$f = $_POST['address'];
//$h = $_POST['contact'];
//mysqli_query($conn,"UPDATE households SET households_id='$a', purok='$b', head_of_household='$c',lastname='$d',gender='$e',address='$f',class='$g', contact='$h', status='$i' WHERE idno='$id'");

mysqli_query($conn,"UPDATE households SET households_id='$a', purok='$b', head_of_household='$c' WHERE household_id='$id'");
header('location:residents.php');
 ?>