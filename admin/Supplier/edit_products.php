<?php include ('includes/db.php');
$ID=$_GET['product_id'];
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
		<a href="" title="ADMIN" class="active"><img src="<?php echo $row['location']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['supplier_id']; ?></a>
			</div>
		<!---end header-->
		
		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="active">PRODUCTS</a>
				
				<a href="suppliers.php" title="SUPPLIERS" class="link">PROFILE</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center>Edit Product</center></h3></legend>

<?php
  $query=mysqli_query($con,"select * from products where product_id='$ID'")or die(mysqli_error());
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
			<td><label>Product Name</label></td>
			<td width="50px"></td>
			<td><input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" /></td>
		</tr>
		<tr>
			<td><label>Product Brand</label></td>
			<td width="50px"></td>
			<td><input type="text" name="product_brand" value="<?php echo $row['product_brand']; ?>" /></td>
		</tr>
		<tr>
			<td><label>Product Type</label></td>
			<td width="50px"></td>
			<td>
				<select name="product_type" required>
					<option><?php echo $row['product_type']; ?></option>
					<option>-----</option>
					<option>Phones</option>
					<option>Smartphones</option>
					<option>Tablets</option>
					<option>Accessories</option>
					<option>Smart Products</option>
					<option>Cignal HD TV</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>Product Description</label></td>
			<td width="50px"></td>
			<td>
			<textarea name="product_description" style="height: 120px;"><?php echo $row['product_description']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td><label>Product Price</label></td>
			<td width="50px"></td>
			<td><input type="number" name="product_price" value="<?php echo $row['product_price']; ?>" /></td>
		</tr>
		<tr>
			<td><label>Status</label></td>
			<td width="50px"></td>
			<td>
				<select name="product_status">
					<option>Available</option>
					<option>Not Available</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td colspan="3" style="text-align:center;">
			<button class="btn-submit-photo" name="update" style="text-align:center; margin-left:10px; margin-right:10px;">Save Update</button>
			<a href="products.php"><input type="button" class="btn-cancel-photo" value="Cancel" style="text-align:center; margin-left:10px; margin-right:10px;"></a>
			</td>
		</tr>
	</table>
</form>

<?php
$id =$_GET['product_id'];
if (isset($_POST['image'])) {

//image
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$location="upload/" . $_FILES["image"]["name"];

mysqli_query($con," UPDATE products SET location='$location' WHERE product_id = '$id' ")or die(mysqli_error());
header('location:products.php');
}
?>

<?php
$id =$_GET['product_id'];
if (isset($_POST['update'])) {

$product_name=$_POST['product_name'];
$product_brand=$_POST['product_brand'];
$product_type=$_POST['product_type'];
$product_description=$_POST['product_description'];

$product_price=$_POST['product_price'];
$product_status=$_POST['product_status'];

mysqli_query($con," UPDATE products SET product_name='$product_name', product_brand='$product_brand', product_type='$product_type',
 product_description='$product_description', supplier_id='$supplier_id', product_price='$product_price', product_status='$product_status' WHERE product_id = '$id' ")or die(mysqli_error());
header('location:products.php');
}
?>

</div>
		
		</div>	
	</div>
	
</body>

</html>
