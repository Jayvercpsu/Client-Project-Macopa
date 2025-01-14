<?php include('session.php'); ?>
<?php 
include('connect.php');
$a=$_POST['name'];
$b=$_POST['username'];
$c=$_POST['email'];
$d=$_POST['password'];

mysqli_query($conn, "INSERT INTO security (name, username, email, password)
    values ('$a', '$b', '$c', '$d')");
header('location:Accounts.php');
?>