<?php include('session.php'); ?>
<?php 
include('connect.php');
$idno = $_POST['idno']; // Hidden field to identify the user
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
mysqli_query($conn,"UPDATE security SET name='$name', username='$username', email='$email' WHERE idno='$idno'");
header('location:Accounts.php');
 ?>
