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
				<input type="text" name="supplier_id" class="txt_box" title="SUPPLIERNUMBER" placeholder="Supplier Number" required />
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
							$supplier_id=$_POST['supplier_id'];
							$password=$_POST['password'];
						{
							$result = mysqli_query($con,"SELECT * FROM suppliers WHERE supplier_id= '$supplier_id' and password='$password'")
							or die(mysqli_error($con));
							
							$row = mysqli_fetch_array($result);
							$count = mysqli_num_rows($result);				
								if ($count == 0) 
									{
									echo "<script>alert('Please check your username and password!'); window.location='index.php'</script>";
									} 
								else if ($count > 0)
									{
										session_start();
										$_SESSION['id'] = $row['supplier_id'];
										header('location:products.php');
									}
						}				
						}
						?>
			
		</div>
	
	</div>
	
</body>

</html>
