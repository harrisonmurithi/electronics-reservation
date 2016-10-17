<?php include ('includes/db.php'); ?>
<?php include ('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>k24 Electronics</title>
    <link href="css/home.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/css3clock.css" />



	

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
		
				<a href="" title="ADMIN" class="active"><img src="<?php echo $row['profile_pic']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['username']; ?></a>
			</div>
		<!---end header-->
		
		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="link">PRODUCTS</a>
				<a href="customers.php" title="CUSTOMERS" class="link">CUSTOMERS</a>
				<a href="suppliers.php" title="SUPPLIERS" class="link">SUPPLIERS</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>
				<a href="personnel.php" title="PERSONNEL" class="link">PERSONNEL</a>
				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->

<div id="content">
<div style="margin:auto; width:1235px; margin-top: 25px; margin-left: 517px; float:left;">
<p><?php include ('analog.php'); ?></p>
<p style="margin-left: 33px;"><?php include ('digital.php'); ?></p>
<p style="margin-left:1px; font-size:15px;"><?php include ('fulldate.php'); ?></p>

</div>
	<div style="float:left; line-height:35px; color:#333333; margin-top: -290px; border: 3px solid #00C6F0; border-radius: 10px; width: 500px; font-size: 25px; text-indent:20px;">
	<h3 style="color:#0000ff;">Mission</h3>
	<p style="margin-left:10px;">
	k24 Electronics is a company of effectiveness and efficiency when it comes
	to the concern of our valued customers. We will achieve our goals and 
	objectives by means of merging team building together with work to maximize
	resources and to produce a better future not just to the company but to its 
	environment as well.
	</p>
	</div>
	<div style="float:right; line-height:56px; color:#333333; margin-top: -290px; border: 3px solid #00C6F0; border-radius: 10px; width: 500px; font-size: 25px; text-indent:20px;">
	<h3 style="color:#0000ff;">Vision</h3>
	<p style="margin-left:10px;">
	k24 Electronics is a business oriented institution, aiming to govern the 
	IT world through relevant services and high end products wherein 
	proven as satisfactory as to the customers higher expectations.
	</p>
	</div>
<br />
	<div style="float:left; color:#333333; margin-top: 20px; margin-left: 277px; margin-bottom:50px; border: 3px solid #00C6F0; border-radius: 10px; width: 700px; font-size: 25px; ">
	<h3 style="color:#0000ff; text-indent:20px;">Objectives</h3>
		<ul style="margin-left:30px;">
			<li style="line-height:35px;">To Improve k24 Electronics&#8217;s customers and sellers handling in huge amount and in different locations.</li>
			<li style="line-height:35px;">Allows k24 Electronics to promote any of their sellers&#8217;s product.</li>
			<li style="line-height:35px;">To make k24 Electronics&#8217;s Sales go high.</li>
		</ul>
	</div>
</div>	
		
	</div>
	
</body>

</html>
