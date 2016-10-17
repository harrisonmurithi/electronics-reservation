<?php
include("includes/db.php");
session_start();
if (!isset($_SESSION['id'])){
header('location:index.php');
}

$id = $_SESSION['id'];

$query=mysqli_query ($con,"SELECT * FROM suppliers WHERE supplier_id ='$id'") or die(mysqli_error());
$row=mysqli_fetch_array($query);
$location=$row['location'];
$firstname=$row['firstname'];
$lastname=$row['lastname'];
$supplier_id=$row['supplier_id'];
?>