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
				<a href="" title="ADMIN" class="active"><img src="<?php echo $row['location']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['supplier_id']; ?></a>
			</div>
		<!---end header-->
		
		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="link">PRODUCTS</a>

				<a href="suppliers.php" title="PROFILE" class="link">PROFILE</a>
				<a href="reports.php" title="REPORTS" class="active">REPORTS</a>

				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center>Customers</center></h3></legend>

<!--- table -->
<table style="width:100%; margin:auto;" class="table table-hover table-striped" id="example">
<thead style="text-align:center;">

<tr>
<th style="text-align:center; width:200px;">Image Order</th>
<th style="text-align:center; width:200px;">Member Name</th>
<th style="text-align:center; width:200px;">Email</th>
<th style="text-align:center; width:200px;">Product Ordered</th>
<th style="text-align:center; width:200px;">Quantity</th>
<th style="text-align:center; width:100px;">Contact No.</th>
<th style="text-align:center; width:200px;">Address</th>
<th style="text-align:center; width:200px;">Shippers</th>
<th style="text-align:center; width:200px;">Date Ordered</th>
<th style="text-align:center; width:200px;">Total Payment</th>
<th style="text-align:center; width:200px;">Total Paid</th>

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

	 $query=mysqli_query($con,"select * from orders 
	 left join members on members.member_id = orders.member_id 
	 left join products on products.product_id = orders.product_id where supplier_id='$supplier_id'
	 group by orders.sales_id desc")or die(mysqli_error());
	 while($row=mysqli_fetch_array($query)){
?>

<tr <?php echo $row['sales_id']; ?>>
<td style="text-align:center; word-break:break-all; width:200px;"> <img src="<?php echo $row['location']; ?>" width="100px" height="100px"></td>
<td style="text-align:center; word-break:break-all; width:250px; line-height: 45px;"> <?php echo $row ['firstname']." ".$row['lastname']; ?></td>
<td style="text-align:center; word-break:break-all; width:300px; line-height: 45px;"> <?php echo $row ['email']; ?></td>
<td style="text-align:center; word-break:break-all; width:150px; line-height: 20px;"> <?php echo $row ['product_name']; ?></td>
<td style="text-align:center; word-break:break-all; line-height: 45px;"> <?php echo $row ['quantity']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px; line-height: 45px;"> <?php echo $row ['contact_no']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px; line-height: 45px;"> <?php echo $row ['address']; ?></td>
<td style="text-align:center; word-break:break-all; width:50px; line-height: 45px;"> <?php echo $row ['shippers']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px; line-height: 45px;"> <?php echo $row ['date']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px; line-height: 45px;"> Ksh <?php $oprice=$row['total']; echo formatMoney($oprice, true);?></td>
<td style="text-align:center; word-break:break-all; width:200px; line-height: 45px;"> Ksh <?php $rprice=$row['totalr']; echo formatMoney($rprice, true);?></td>
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
