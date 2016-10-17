<?php
						include('includes/db.php');

						if(isset($_POST['enter']))
						{
							$username=$_POST['email'];
							$password=$_POST['password'];
						{
							$result = mysqli_query($con,"SELECT * FROM members WHERE username = '$email' and password='$password'")
							or die(mysqli_error());
							
							$row = mysqli_fetch_array($result);
							$count = mysqli_num_rows($result);				
								if ($count == 0) 
									{
									echo "<script>alert('Please check your email and password!'); window.location='index.php'</script>";
									} 
								else if ($count > 0)
									{
										session_start();
										$_SESSION['id'] = $row['admin_id'];
										header("location:index.php");
									}
						}				
						}
						?>