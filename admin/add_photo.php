<?php
	include('includes/db.php');
							
							if (!isset($_FILES['image']['tmp_name'])) {
							echo "";
							}else{
							$file=$_FILES['image']['tmp_name'];
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];

							if ($error > 0){
										die("Error uploading file! Code $error.");
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
									else
										{

									move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
									$location="upload/" . $_FILES["image"]["name"];
									$product=$_SESSION['id'];
									$product_name=$_POST['product_name'];
									$product_brand=$_POST['product_brand'];
									$product_description=$_POST['product_description'];
									$product_price=$_POST['product_price'];
									$supplier_name=$_POST['supplier_name'];
									$product_quantity=$_POST['product_quantity'];
									$date_added=$_POST['date_added'];
									
									$update=mysqli_query($con,"INSERT INTO products (product_name,product_brand,product_description,product_price,supplier_name,product_quantity,date_added,location) 
									VALUES ('$product_name','$product_brand','$product_description','$product_price','$supplier_name','$product_quantity',NOW(),'$location')") or die(mysqli_error());
									}
										header('location:products.php');
									}
							}
?>