<?php 

include('includes/db.php');
$get_id=$_GET['product_id'];


mysqli_query($con,"delete  from products where product_id='$get_id'")or die(mysqli_error());
header('location:products.php');
?>