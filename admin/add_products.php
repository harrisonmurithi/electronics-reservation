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
									$product_name=$_POST['product_name'];
									$product_brand=$_POST['product_brand'];
									$product_type=$_POST['product_type'];
									$product_description=$_POST['product_description'];
									$supplier=$_POST['supplier'];
									$product_price=$_POST['product_price'];
									$product_status=$_POST['product_status'];
									
									mysqli_query($con,"INSERT INTO products (product_name,product_brand,product_type,product_description,product_price,supplier,product_status,date_added,location) 
									VALUES ('$product_name','$product_brand','$product_type','$product_description','$product_price','$supplier','$product_status',NOW(),'$location')") or die(mysqli_error());
									echo "<script>alert('Products has been added'); window.location='products.php'</script>";
									}
									}
							}
?>	