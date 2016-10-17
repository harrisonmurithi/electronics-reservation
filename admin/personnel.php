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
				<a href="products.php" title="PRODUCTS" class="link">PRODUCTS</a>
				<a href="customers.php" title="CUSTOMERS" class="link">CUSTOMERS</a>
				<a href="suppliers.php" title="SUPPLIERS" class="link">SUPPLIERS</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				<a href="personnel.php" title="PERSONNEL" class="active">PERSONNEL</a>
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center>Admin List</center></h3></legend>

<a href="#add_admin" data-toggle="modal" class="btn btn-inverse" style="text-decoration:none; text-align:center;">Add Admin</a>
<br>
<br>
<!--- modal add admin -->
<div id="add_admin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<p><div class="alert alert-danger" style="text-align:center; font-size:20px;">Add Admin</p></div>
</div>
<div class="modal-body">

<form method="post" action="add_admin.php" enctype="multipart/form-data">
	<table class="product_table" cellspacing="5" cellpadding="5">
		<tr>
			<td><label>Firstname</label></td>
			<td width="50px"></td>
			<td><input type="text" name="firstname" placeholder="Firstname..." required /></td>
		</tr>
		<tr>
			<td><label>Lastname</label></td>
			<td width="50px"></td>
			<td><input type="text" name="lastname" placeholder="Lastname..." required /></td>
		</tr>
		<tr>
			<td><label>Username</label></td>
			<td width="50px"></td>
			<td><input type="text" name="username" placeholder="Username..." required /></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td width="50px"></td>
			<td><input type="password" name="password" placeholder="Password..." required /></td>
		</tr>
		<tr>
			<td><label>Contact No.</label></td>
			<td width="50px"></td>
			<td><input type="text" name="contact" placeholder="Contact no..." required /></td>
		</tr>
		<tr>
			<td><label>Image</label></td>
			<td width="50px"></td>
			<td><input type="file" name="image" /></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align:center;">
			<button class="btn-submit-photo" name="Submit" style="text-align:center; margin-left:10px; margin-right:10px;">Add Admin</button>
			<a href="personnel.php"><input type="button" class="btn-cancel-photo" value="Cancel" style="text-align:center; margin-left:10px; margin-right:10px;"></a>
			</td>
		</tr>
	</table>
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

<thead style="text-align:center;">

<tr>
<th style="text-align:center; width:200px;">Image</th>
<th style="text-align:center; width:200px;">Firstname</th>
<th style="text-align:center; width:200px;">Lastname</th>
<th style="text-align:center; width:200px;">Username</th>
<th style="text-align:center; width:200px;">Password</th>
<th style="text-align:center; width:200px;">Contact No.</th>
<th style="text-align:center;">Action</th>

</tr>

</thead>
<tbody>
<?php
$result= mysqli_query($con,"select * from admin order by admin_id ASC") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['admin_id'];
?>
<tr>
<td style="text-align:center; word-break:break-all; width:200px;"> <img src="<?php echo $row['profile_pic']; ?>" width="100px" height="100px"></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['firstname']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['lastname']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['username']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['password']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['contact']; ?></td>

<td style="text-align:center; width:231px;"> 
	<a href="edit_admin.php<?php echo '?admin_id='.$id; ?>" class="btn btn-info" style="text-decoration:none; text-align:center;">Edit</a>
	<a href="#<?php  echo $id;?>"  data-toggle="modal"  class="btn btn-danger" style="text-decoration:none; text-align:center;">Delete </a>
</td>
		<!-- Modal delete admin -->
<div id="<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
</div>
<div class="modal-body">
<p><div class="alert alert-danger">Are you Sure you want Delete?</p>
</div>
<hr>
<div class="modal-footer">
<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true" style="text-decoration:none; text-align:center;">No</button>
<a href="delete_admin.php<?php echo '?admin_id='.$id; ?>" class="btn btn-danger" style="text-decoration:none; text-align:center;">Yes</a>
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
	
</body>

</html>
