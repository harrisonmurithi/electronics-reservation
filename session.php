<?php
include("admin/includes/db.php");
session_start();
if (!isset($_SESSION['id'])){
header('location:loginpage.php');
}

$id = $_SESSION['id'];

$query=mysqli_query ($con,"SELECT * FROM members WHERE member_id ='$id'") or die(mysqli_error());
$row=mysqli_fetch_array($query);
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$email=$row['email'];
?>