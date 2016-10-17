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
									$supplier_company_name=$_POST['supplier_company_name'];
									$supplier_address=mysqli_real_escape_string($con,$_POST['supplier_address']);
									$supplier_contact=$_POST['supplier_contact'];
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									
									mysqli_query($con,"INSERT INTO suppliers (supplier_company_name,supplier_address,supplier_contact,firstname,lastname,date_added,location) 
									VALUES ('$supplier_company_name','$supplier_address','$supplier_contact','$firstname','$lastname',NOW(),'$location')") or die(mysqli_error());
									echo "<script>alert('Supplier has been added'); window.location='suppliers.php'</script>";
									}
									}
							}
?>	