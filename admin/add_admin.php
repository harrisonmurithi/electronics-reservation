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
									$profile_pic="upload/" . $_FILES["image"]["name"];
									$firstname=$_POST['firstname'];	
									$lastname=$_POST['lastname'];	
									$username=$_POST['username'];	
									$password=$_POST['password'];	
									$contact=$_POST['contact'];	


									mysqli_query($con,"INSERT INTO admin (firstname,lastname,username,password,contact,date_added,profile_pic) 
									VALUES ('$firstname','$lastname','$username','$password','$contact',NOW(),'$profile_pic')") or die(mysqli_error());
									echo "<script>alert('Supplier has been added'); window.location='personnel.php'</script>";
									
									}
										header('location:personnel.php');
									}
							}
?>	