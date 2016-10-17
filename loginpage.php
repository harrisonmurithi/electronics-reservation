<!DOCTYPE html>
<html>
<head>
    <title>k24 Electronics</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />

	
</head>

<body>

	<div id="wrapper">
	
		<div id="login_form">
			<b>k24 Electronics</b>
			<br />
			<br />
			<form method="post" >
				<input type="text" name="email" class="txt_box" title="EMAIL" placeholder="eg. har@gmail.com" required />
				<br />
				<br />
				<input type="password" name="password" class="txt_box" title="PASSWORD" placeholder="Password" required>
				<br />
				<br />
				<button name="enter" value="Login" title="LOGIN" class="login_button">Login</button>
				<button name="forgot" value="reset" title="RESET PASSWORD" class="login_button">Forgot Password</button>
			</form>
			
<?php
						include('admin/includes/db.php');

						if(isset($_POST['enter']))
						{
							$email=$_POST['email'];
							$password=$_POST['password'];
						{
							$result = mysqli_query($con,"SELECT email,password FROM members WHERE email = '$email'")
							or die(mysqli_error());
							

							$count = mysqli_num_rows($result);				
								if ($count == 0) 
									{
									echo "<script>alert('Please check your email and password!'); window.location='index.php'</script>";
									} 
								else if ($count > 0)
									{
									$row = $result->fetch_array(MYSQLI_ASSOC);
												if (password_verify($password, $row['password'])) {
                                    				//Password matches, so create the session
                                    			session_start();
                                                $_SESSION['id'] = $row['member_id'];
                                                header('location:index.php');
                                    			}else{
                                    				$errors[] = "The username or password do not match";
                                    			}

									}
						}				
						}
						?>
			
		</div>
	
	</div>
	
</body>

</html>
