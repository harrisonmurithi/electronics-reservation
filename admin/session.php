<?php
include("includes/db.php");
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}

$id = $_SESSION['id'];

$query=mysqli_query ($con,"SELECT * FROM admin WHERE admin_id ='$id'") or die(mysqli_error());
$row=mysqli_fetch_array($query);
$profile_pic=$row['profile_pic'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$username=$row['username'];
?>