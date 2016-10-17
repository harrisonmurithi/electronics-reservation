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
				<input type="text" name="username" class="txt_box" title="USERNAME" placeholder="Username" required />
				<br />
				<br />
				<input type="password" name="password" class="txt_box" title="PASSWORD" placeholder="Password" required>
				<br />
				<br />
				<button name="enter" value="Login" title="LOGIN" class="login_button">Login</button>
			</form>
			
<?php
						include('includes/db.php');

						if(isset($_POST['enter']))
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
										header('location:home.php');
									}
						}				
						}
						?>
			
		</div>
	
	</div>
	
</body>

</html>
