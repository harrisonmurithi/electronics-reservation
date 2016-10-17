<?php include ('includes/db.php');
$ID=$_GET['supplier_id'];
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>k24 Electronics</title>
    <link href="css/home.css" rel="stylesheet" type="text/css" />
	

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

	<style type="text/css" >
.logo_banner {
float: left;
width: 400px;
height: 75px;
margin-left: 15px;
}
</style>
	
</head>

<body>

	<div id="wrapper">
		<!---start header-->
			<div id="header">
          <h1><a href="home.php"><img src="images/logo/shop.png" class="logo_banner"></a></h1>
				<a href="log_out.php" title="LOGOUT" class="link">LOGOUT</a>
		<!--- start clock	
				<a href="" title="DATE" class="link">					
					<form name="clock" class="link">
						<font color="white"></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
					</form>
				</a>
		end  -->
		<?php include ('session.php'); ?>
		<a href="" title="ADMIN" class="active"><img src="<?php echo $row['profile_pic']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['username']; ?></a>
			</div>
		<!---end header-->
		
		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="link">PRODUCTS</a>
				<a href="customers.php" title="CUSTOMERS" class="link">CUSTOMERS</a>
				<a href="suppliers.php" title="SUPPLIERS" class="active">SUPPLIERS</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				<a href="personnel.php" title="PERSONNEL" class="link">PERSONNEL</a>
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center>Edit Supplier</center></h3></legend>

<?php
  $query=mysqli_query($con,"select * from suppliers where supplier_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

 <form class="form-horizontal" method="post"  enctype="multipart/form-data"> 
	<table class="product_table" cellspacing="5" cellpadding="5">
		<tr>
			<td><img src="<?php echo $row['location']; ?>" style="width:75px; height:75px;"></td>
			<td width="50px"></td>
			<td>
			<input type="file" name="image">
			<br />
			<br />
			<input type="submit" class="btn-submit-photo" value="Update Profile" name="image" />
			</td>
		</tr>
		<tr>
			<td><label>Company Name</label></td>
			<td width="50px"></td>
			<td><input type="text" name="supplier_company_name" value="<?php echo $row['supplier_company_name']; ?>" placeholder="Firstname..." /></td>
		</tr>
		<tr>
			<td><label>Company Address</label></td>
			<td width="50px"></td>
			<td><input type="text" name="supplier_address" value="<?php echo $row['supplier_address']; ?>" placeholder="Lastname..." /></td>
		</tr>
		<tr>
			<td><label>Company No.</label></td>
			<td width="50px"></td>
			<td><input type="text" name="supplier_contact" value="<?php echo $row['supplier_contact']; ?>" placeholder="Username..." /></td>
		</tr>
		<tr>
			<td><label>Company Representative</label></td>
			<td width="50px"></td>
			<td><input type="text" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="Password..." /></td>
		</tr>
		<tr>
			<td></td>
			<td width="50px"></td>
			<td><input type="text" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Contact no..." /></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:center;">
			<button class="btn-submit-photo" name="update" style="text-align:center; margin-left:10px; margin-right:10px;">Save Update</button>
			<a href="suppliers.php"><input type="button" class="btn-cancel-photo" value="Cancel" style="text-align:center; margin-left:10px; margin-right:10px;"></a>
			</td>
		</tr>
	</table>
</form>

<?php
$id =$_GET['supplier_id'];
if (isset($_POST['image'])) {

//image
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$location="upload/" . $_FILES["image"]["name"];

mysqli_query($con," UPDATE suppliers SET location='$location' WHERE supplier_id = '$id' ")or die(mysqli_error());
header('location:suppliers.php');
}
?>

<?php
$id =$_GET['supplier_id'];
if (isset($_POST['update'])) {

$supplier_company_name=$_POST['supplier_company_name'];
$supplier_address=$_POST['supplier_address'];
$supplier_contact=$_POST['supplier_contact'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

mysqli_query($con," UPDATE suppliers SET supplier_company_name='$supplier_company_name', supplier_address='$supplier_address',
 supplier_contact='$supplier_contact', firstname='$firstname', lastname='$lastname' WHERE supplier_id = '$id' ")or die(mysqli_error());
header('location:suppliers.php');
}
?>

</div>
		
		</div>	
	</div>
	
</body>

</html>
