<?php 

include('includes/db.php');
$get_id=$_GET['admin_id'];


mysqli_query($con,"delete from admin where admin_id='$get_id'")or die(mysqli_error());
header('location:personnel.php');
?>