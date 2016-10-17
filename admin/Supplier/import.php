
<?php
include ('includes/db.php');
include('session.php');


$data = array();

function add_product( $product_name, $product_brand, $product_type, $product_description,$product_price, $number, $reservefee, $status,$image )
{
 global $data,$sth;

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
add_product( $product_name, $product_brand, $product_type, $product_description,$product_price, $number, $reservefee, $status,$image);
}
$first_row = false;
}
}
?>
<html>
<body>
<table>
<tr>
<th  style="text-align:center; width:200px;">Image</th>
<th  style="text-align:center; width:200px;">Name</th>
<th  style="text-align:center; width:200px;">Brand</th>
<th  style="text-align:center; width:200px;">Type</th>
<th  style="text-align:center; width:200px;">Description</th>
<th  style="text-align:center; width:200px;">Price</th>
<th  style="text-align:center; width:200px;">Number</th>
<th  style="text-align:center; width:200px;">Reserve Fee</th>
<th  style="text-align:center; width:200px;">Status</th>

<th></th>
</tr>
<?php foreach( $data as $row ) { ?>
<tr>
<td style="text-align:center; word-break:break-all; width:150px;"> <a href=""><img src="<?php echo( $row['image']); ?>" width="75px" height="75px">
</td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['product_name'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['product_brand'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['product_type'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['product_description'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['product_price'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['number'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['reservefee'] ); ?></td>
<td style="text-align:center; word-break:break-all; width:150px;"><?php echo( $row['status'] ); ?>
</td >


</td>
</tr>


</table>

<?php

$product_name=$row['product_name'];
$product_brand=$row['product_brand'];
$product_type=$row['product_type'];
$product_description=$row['product_description'];
$product_price=$row['product_price'];
$number=$row['number'];
$reservefee=$row['reservefee'];
$status= $row['status'];
$image=$row['image'];

mySQLi_query($con,"INSERT INTO products (product_name,product_brand,product_type,product_description,product_price,supplier_id,product_status,date_added,location,number,reservefee)
									VALUES ('$product_name','$product_brand','$product_type','$product_description','$product_price','$supplier_id','$status',NOW(),'$image','$number','$reservefee')") or die(mysqli_error());

?>
<?php } ?>
</body>
</html>