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
				<a href="customers.php" title="CUSTOMERS" class="active">CUSTOMERS</a>
				<a href="suppliers.php" title="SUPPLIERS" class="link">SUPPLIERS</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				<a href="personnel.php" title="PERSONNEL" class="link">PERSONNEL</a>
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->
		
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center>Customers</center></h3></legend>
<a href="#add_products" data-toggle="modal" class="btn btn-inverse" style="text-decoration:none; text-align:center;">Add customers</a>
<br>
<br>
<!--- modal -->
<div id="add_products" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<p><div class="alert alert-danger" style="text-align:center; font-size:20px;">Add customers</p></div>
</div>
<div class="modal-body">

<form method="post" action="add_customers.php" enctype="multipart/form-data">
	<table class="product_table" cellspacing="5" cellpadding="5">
		<tr>
			<td><label>FIRST NAME</label></td>
			<td width="50px"></td>
			<td><input type="text" name="firstname" placeholder="first name..." required /></td>
		</tr>
		<tr>
			<td><label>LAST NAME</label></td>
			<td width="50px"></td>
			<td><input type="text" name="lastname" placeholder="lastname..." required /></td>
		</tr>
		<tr>
			<td><label>EMAIL</label></td>
			<td width="50px"></td>
			<td><input type="text" name="email" placeholder="email..." required /></td>
		</tr>
		<tr>
			<td><label>PASSWORD</label></td>
			<td width="50px"></td>
			<td><input type="text" name="password" placeholder="" required /></td>
		</tr>
		<tr>
			<td><label>MOBILE NUMBER</label></td>
			<td width="50px"></td>
			<td><input type="text" name="contactno" placeholder="07..." required /></td>
		</tr>
		<tr>
			<td><label>POSTAL ADDRESS</label></td>
			<td width="50px"></td>
			<td><input type="text" name="postaladdress"  placeholder="81-01045 NAIROBI" required /></td>
		</tr>
                <tr>
			<td><label>DATE OF BIRTH</label></td>
			<td width="50px"></td>
			<td><input type="text" name="daterange" value="01/01/2015" />

<script type="text/javascript">
$(function() {
    $('input[name="daterange"]').daterangepicker();
});
</script></td>

        
   
		</tr>
		<tr>
			<td colspan="3" style="text-align:center;">
			<button class="btn-submit-photo" name="Submit" style="text-align:center; margin-left:10px; margin-right:10px;">Add customers</button>
			<a href="customers.php"><input type="button" class="btn-cancel-photo" value="Cancel" style="text-align:center; margin-left:10px; margin-right:10px;"></a>
			</td>
		</tr>
	</table>
</form>

</div>
</div>

<!--- end modal -->


<!--- table -->
<table style="width:100%; margin:auto;" class="table table-hover table-striped" id="example">
<thead style="text-align:center;">

<tr>
<th style="text-align:center; width:200px;">Name</th>
<th style="text-align:center; width:200px;">Email</th>
<th style="text-align:center; width:100px;">Contact No.</th>
<th style="text-align:center; width:200px;">Address</th>

</tr>

</thead>
<tbody>
<?php
$result= mysqli_query($con,"select * from members order by member_id DESC") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$id=$row['member_id'];
?>

<tr <?php echo $row['member_id']; ?>>
<td style="text-align:center; word-break:break-all; line-height: 45px;"> <?php echo $row ['firstname']." ".$row['lastname']; ?></td>
<td style="text-align:center; word-break:break-all; line-height: 45px;"> <?php echo $row ['email']; ?></td>
<td style="text-align:center; word-break:break-all; line-height: 45px;"> <?php echo $row ['contact_no']; ?></td>
<td style="text-align:center; word-break:break-all; line-height: 45px;"> <?php echo $row ['address']; ?></td>

		
	
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
