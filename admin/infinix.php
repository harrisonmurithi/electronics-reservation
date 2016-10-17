<?php include ('includes/db.php'); ?>
<?php include ('session.php'); ?>
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
				<a href="" title="ADMIN" class="active"><img src="<?php echo $row['profile_pic']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['username']; ?></a>
			</div>
		<!---end header-->
		
		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="active">PRODUCTS</a>
				<a href="customers.php" title="CUSTOMERS" class="link">CUSTOMERS</a>
				<a href="suppliers.php" title="SUPPLIERS" class="link">SUPPLIERS</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				<a href="personnel.php" title="PERSONNEL" class="link">PERSONNEL</a>
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<!---start content-->
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center>Products List</center></h3></legend>

<a href="#add_products" data-toggle="modal" class="btn btn-inverse" style="text-decoration:none; text-align:center;">Add Products</a>
<br>
<br>
<!--- modal -->
<div id="add_products" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<p><div class="alert alert-danger" style="text-align:center; font-size:20px;">Add Products</p></div>
</div>
<div class="modal-body">

<form method="post" enctype="multipart/form-data">
	<table class="product_table" cellspacing="5" cellpadding="5">
		<tr>
			<td><label>Product Name</label></td>
			<td width="50px"></td>
			<td><input type="text" name="product_name" placeholder="Product name..." required /></td>
		</tr>
		<tr>
			<td><label>Product Brand</label></td>
			<td width="50px"></td>
			<td><input type="text" name="product_brand" placeholder="Product brand..." required /></td>
		</tr>
		<tr>
			<td><label>Product Description</label></td>
			<td width="50px"></td>
			<td><textarea name="product_description" placeholder="Product description..." style="height:100px;" required /></textarea></td>
		</tr>
		<tr>
			<td><label>Product Price</label></td>
			<td width="50px"></td>
			<td><input type="number" value="0" step="1" name="product_price" placeholder="Product price..." required /></td>
		</tr>
		<tr>
			<td><label>Supplier Name</label></td>
			<td width="50px"></td>
			<td>
				<input type="number"  name="supplier_id" placeholder="Supplier Number..." required />
			</td>
		</tr>
		<tr>
			<td><label>Status</label></td>
			<td width="50px"></td>
			<td>
				<select name="product_status" required>
					<option>Available</option>
					<option>Not Available</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>Image</label></td>
			<td width="50px"></td>
			<td><input type="file" name="image" required /></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:center;">
			<button class="btn-submit-photo" name="Submit" style="text-align:center; margin-left:10px; margin-right:10px;">Add Product</button>
			<a href="products.php"><input type="button" class="btn-cancel-photo" value="Cancel" style="text-align:center; margin-left:10px; margin-right:10px;"></a>
			</td>
		</tr>
	</table>
	
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
									$product_description=$_POST['product_description'];
									$supplier_id=$_POST['supplier_id'];
									$product_price=$_POST['product_price']; 
									$product_status=$_POST['product_status'];
									
									mysqli_query($con,"INSERT INTO products (product_name,product_brand,product_type,product_description,product_price,supplier_id,product_status,date_added,location) 
									VALUES ('$product_name','$product_brand','$product_type','$product_description','$product_price','$supplier_id','$product_status',NOW(),'$location')") or die(mysqli_error());
									}
									header('location:products.php');
									}
							}
?>		
	
</form>

<!---
<div class="modal-footer">
<button name="Submit" class="btn btn-inverse" data-dismiss="modal" aria-hidden="true" style="text-decoration:none; text-align:center;">ADD</button>
<a href="products.php" class="btn btn-danger" style="text-decoration:none; text-align:center;">Cancel</a>
</div>
-->
</div>
</div>

<!--- end modal -->

<!--- table -->
<table style="width:100%; margin:auto;" class="table table-hover table-striped" id="example">
<caption><div class="pagination">
  <ul>
    <li><a href="products.php"><font color="#000000">All</font></a></li>
    <li><a href="samsung.php"><font color="#000000">Samsung</font></a></li>
    <li><a href="alcatel.php"><font color="#000000">Alcatel</font></a></li>
    <li><a href="nokia.php"><font color="#000000">Nokia</font></a></li>
    <li class="active"><a href="infinix.php"><font color="#000000">Infinix</font></a></li>
    <li><a href="wiko.php"><font color="#000000">Wiko</a></font></li>
  </ul>
</div></caption>

<thead style="text-align:center;">

<tr>
<th style="text-align:center; width:200px;">Image</th>
<th style="text-align:center; width:200px;">Name</th>
<th style="text-align:center; width:200px;">Brand</th>
<th style="text-align:center; width:200px;">Type</th>
<th style="text-align:center; width:445px;">Description</th>
<th style="text-align:center; width:200px;">Price</th>
<th style="text-align:center; width:200px;">Supplier Number</th>
<th style="text-align:center; width:150px;">Status</th>
<th style="text-align:center;">Action</th>

</tr>

</thead>
<tbody>
<?php

			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}

$result= mysqli_query($con,"select * from products where product_brand='Infinix' ") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['product_id'];
?>

<tr>
<td style="text-align:center; word-break:break-all; width:200px;"> <a href=""><img src="<?php echo $row['location']; ?>" width="75px" height="75px"></a></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['product_name']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['product_brand']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['product_type']; ?></td>
<td style="text-align:center; word-break:break-all; width:445px;"> <?php echo $row ['product_description']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;">Ksh <?php $oprice=$row['product_price']; echo formatMoney($oprice, true);?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['supplier_id']; ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"> <?php echo $row ['product_status']; ?></td>

<td style="text-align:center; width:236px;"> 
	<a href="edit_products.php<?php echo '?product_id='.$id; ?>" class="btn btn-info" style="text-decoration:none; text-align:center;">Edit</a>
	<a href="#<?php echo $id;?>" data-toggle="modal" class="btn btn-danger" style="text-decoration:none; text-align:center;">Delete </a>
	</td>

		<!-- Modal -->
<div id="<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
</div>
<div class="modal-body">
<p><div class="alert alert-danger">Are you Sure you want Delete?</p>
</div>
<hr>
<div class="modal-footer">
<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true" style="text-decoration:none; text-align:center;">No</button>
<a href="delete_products.php<?php echo '?product_id='.$id; ?>" class="btn btn-danger" style="text-decoration:none; text-align:center;">Yes</a>
</div>
</div>
	
    </tr>
	<?php } ?>
    </tbody>
    </table>
	</div>
	
	<!-- end table -->
</div>
</div>
</div>
		</div>
		<!---end content-->
		
		
	</div>
	
</body>

</html>
