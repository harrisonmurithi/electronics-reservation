<?php include ('includes/db.php'); ?>
<?php include ('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>K24 Electronics</title>
    <link href="css/home.css" rel="stylesheet" type="text/css" />


	
 	

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
				<a href="" title="Supplier" class="active"><img src="<?php echo $row['location']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['supplier_id']; ?></a>
			</div>
		<!---end header-->
		
		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="link">PRODUCTS</a>
				<a href="suppliers.php" title="SUPPLIERS" class="active">PROFILE</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<div id="content">

<div class="row-fluid">
<div class="span12">


<!--- table -->
<table style="width:100%; margin:auto;" class="table table-hover table-striped" id="example">
<caption><div class="pagination">
  <ul>
    <li class="active"><a href="suppliers.php"><font color="#000000">All</font></a></li>
    <li><a href="supplier_samsung.php"><font color="#000000">Samsung</font></a></li>
    <li><a href="supplier_alcatel.php"><font color="#000000">Alcatel</font></a></li>
    <li><a href="supplier_nokia.php"><font color="#000000">Nokia</font></a></li>
    
    <li><a href="supplier_tecno.php"><font color="#000000">Tecno</font></a></li>
    <li><a href="supplier_wiko.php"><font color="#000000">Wiko</font></a></li>
    <li><a href="supplier_infinix.php"><font color="#000000">Infinix</font></a></li>
    <li><a href="supplier_innjoo.php"><font color="#000000">Innjoo</font></a></li>
    <li ><a href="supplier_fly.php"><font color="#000000">Fly</a></font></li>
  </ul>
</div></caption>

<thead style="text-align:center;">

<tr>
<th style="text-align:center; width:200px;">Image</th>
<th style="text-align:center; width:200px;">Company Name</th>
<th style="text-align:center; width:200px;">Company Address</th>
<th style="text-align:center; width:100px;">Company No.</th>
<th style="text-align:center; width:200px;">Company Representative</th>
<th style="text-align:center;">Action</th>

</tr>

</thead>
<tbody>
<?php
$result= mysqli_query($con,"select * from suppliers where supplier_id='$supplier_id'") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['supplier_id'];
?>

<tr>
<td style="text-align:center; word-break:break-all; width:200px;"> <img src="<?php echo $row['location']; ?>" width="100px" height="100px"></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['supplier_company_name']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['supplier_address']; ?></td>
<td style="text-align:center; word-break:break-all; width:100px;"> <?php echo $row ['supplier_contact']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['firstname']." ".$row['lastname']; ?></td>

<td style="text-align:center; width:231px;"> 
	<a href="edit_suppliers.php<?php echo '?supplier_id='.$id; ?>" class="btn btn-info" style="text-decoration:none; text-align:center;">Edit</a>
	<a href="#<?php  echo $id;?>"  data-toggle="modal"  class="btn btn-danger" style="text-decoration:none; text-align:center;">Delete </a>
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
<a href="delete_suppliers.php<?php echo '?supplier_id='.$id; ?>" class="btn btn-danger" style="text-decoration:none; text-align:center;">Yes</a>
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