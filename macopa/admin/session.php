<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("location:admin_dashboard.php");
}
?>