<?php 

include('includes/db.php');
$get_id=$_GET['supplier_id'];


mysqli_query($con,"delete  from suppliers where supplier_id='$get_id'")or die(mysqli_error());
header('location:suppliers.php');
?>