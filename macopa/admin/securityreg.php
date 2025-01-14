<?php include('session.php'); ?>
<?php 
include('connect.php');
$id=$_POST['Idno'];
$a=$_POST['name'];
$b=$_POST['username'];
$c=$_POST['password'];

mysqli_query($conn, "INSERT INTO admin (Idno, name, username, password)
    values ('$id', '$a', '$b', '$c')");
header('location:index.php');
?>