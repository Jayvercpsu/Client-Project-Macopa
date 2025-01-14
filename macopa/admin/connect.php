<?php 
$conn = mysqli_connect("localhost", "root", "", "macopa_db");
if(mysqli_connect_errno())
{
	echo "Failed to connect to Mysql:". mysqli_connect_error();
}
?> 