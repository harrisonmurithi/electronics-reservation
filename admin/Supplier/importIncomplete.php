<?php include ('includes/db.php'); ?>
<?php include ('session.php'); ?>



<?php
$data = array();

function add_product( $product_name, $product_brand, $product_type, $product_description,$product_price, $number, $reservefee, $status,$image )
{
global $data;
$data []= array(
'product_name' => $product_name,
'product_brand' => $product_brand,
'product_type' => $product_type,
'product_description' => $product_description,
'product_price' => $product_price,
'number' => $number,
'reservefee' => $reservefee,
'status' => $status,
'image' => $image
);
}

if ( $_FILES['file']['tmp_name'] )
{
$dom = new DOMDocument;
$dom -> load( $_FILES['file']['tmp_name'] );
$rows = $dom->getElementsByTagName( 'Row' );
$first_row = true;
foreach ($rows as $row)
{
if ( !$first_row )
{
$product_name = "";
$product_brand = "";
$product_type = "";
$product_description = "";
$product_price = "";
$number = "";
$reservefee = "";
$status = "";
$image  = "";

$index = 1;
$cells = $row->getElementsByTagName( 'Cell' );
foreach( $cells as $cell )
{
$ind = $cell->getAttribute( 'Index' );
if ( $ind != null ) $index = $ind;

if ( $index == 1 ) $product_name = $cell->nodeValue;
if ( $index == 2 ) $product_brand = $cell->nodeValue;
if ( $index == 3 ) $product_type = $cell->nodeValue;
if ( $index == 4 ) $product_description = $cell->nodeValue;
if ( $index == 5 ) $product_price = $cell->nodeValue;
if ( $index == 6 ) $number = $cell->nodeValue;

if ( $index == 7 ) $reservefee = $cell->nodeValue;
if ( $index == 8 ) $status = $cell->nodeValue;
if ( $index == 9 ) $image = $cell->nodeValue;

$index += 1;
}
add_product( $product_name, $product_brand, $product_type, $product_description,$product_price, $number, $reservefee, $status,$image );
}
$first_row = false;
}
}
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
				<a href="" title="SUPPLIER" class="active"><img src="<?php echo $row['location']; ?>" style="width:50px; height:50px; margin-top:10px;""> &nbsp; <?php echo $row['supplier_id']; ?></a>
			</div>
		<!---end header-->

		<!---start navbar-->
			<div id="navbar">
				<a href="products.php" title="PRODUCTS" class="active">PRODUCTS</a>
				<a href="addProductFile.php" title="PRODUCTS File">UPLOAD PRODUCTS FILE</a>

				<a href="suppliers.php" title="SUPPLIERS" class="link">PROFILE</a>
				<a href="reports.php" title="REPORTS" class="link">REPORTS</a>

				<a href="feedback.php" title="FEEDBACK" class="link">FEEDBACK</a>
			</div>
		<!---end navbar-->

		<!---start content-->
		<div id="content">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
<legend><h3><center> Added Products List</center></h3></legend>

<table>
<tr>
<th>Name</th>
<th>Brand</th>
<th>Type</th>
<th>Description</th>
<th>Price</th>
<th>Number</th>
<th>Reserve Fee</th>

<th>Status</th>
<th></th>
</tr>
<?php foreach( $data as $row ) { ?>
<tr>
<td><?php echo( $row['product_name'] ); ?></td>
<td><?php echo( $row['product_brand'] ); ?></td>
<td><?php echo( $row['product_type'] ); ?></td>
<td><?php echo( $row['product_description'] ); ?></td>
<td><?php echo( $row['product_price'] ); ?></td>
<td><?php echo( $row['number'] ); ?></td>
<td><?php echo( $row['reservefee'] ); ?></td>
<td><?php echo( $row['status'] ); ?>
</td>

<td><?php echo( $row['image'] ); ?>
</td>
</tr>

<?php } ?>
</table


	<!-- end table -->
</div>
</div>
</div>
		</div>
		<!---end content-->


	</div>

</body>

</html>

