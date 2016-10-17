<?php
						include('includes/db.php');

						if(isset($_POST['enter'], $_POST['username'],$_POST['password']))
						{


							$username=$_POST['username'];
							$password=$_POST['password'];
						{
							$result = mysqli_query($con,"SELECT * FROM admin WHERE username = '$username' and password='$password'")
							or die(mysqli_error());
							
							$row = mysqli_fetch_array($result);
							$count = mysqli_num_rows($result);				
								if ($count == 0) 
									{
									echo "<script>alert('Please check your username and password!'); window.location='index.php'</script>";
									} 
								else if ($count > 0)
									{
										session_start();
										$_SESSION['id'] = $row['admin_id'];
										header("location:home.php");
									}
						}				
						}
						?>