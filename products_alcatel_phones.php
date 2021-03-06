<!DOCTYPE html>
<html>
<head>
    <title>k24 Electronics</title>
    <link href="css/home.css" rel="stylesheet" type="text/css" />
	


<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

	
</head>

<body>

	<div id="wrapper">

		
    <div id="header" style="width: 1157px; margin-left: 29px;">
      <div id="logo" style="width: 1157px;">
	  <img src="images/header.png" width="1157px" height="140px">
      </div>
      <div id="menubar" style="width: 1157px; margin-left: 1px;">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Home</a></li>
          <li><a href="about_us.php">About Us</a></li>
          <li class="selected"><a href="products.php">Products</a></li>
          <li><a href="branches.php">Branches</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="news_event.php">News and Event</a></li>
<li><div class="dropdown">
  <button class="dropbtn">My Account</button>
  <div class="dropdown-content">

  <a href="loginpage.php">Login</a>
    <a href="signup.php">Signup</a>

 
  </li>
          <li><a href="view_cart.php">Cart</a></li>

        </ul>
      </div>
    </div>
		
		<!---start content-->
		<div id="content" style="width: 1157px; margin-left: 32px;">

<div class="row-fluid">
<div class="span12">
<div class="hero-unit-3">
			<h4 style="color:#0000ff;">Cellphones Brand:<b>&nbsp;Alcatel</b></h4>
<br />
<br />
<!--- table -->
<table style="width:100%; margin:auto;" class="table table-hover table-striped" id="example">
<caption><div class="pagination">
			<h5 style=" margin-right: 270px;">Alcatel Products</h5>
  <ul>
    <li><a href="products_alcatel.php"><font color="#000000">All</font></a></li>
    <li class="active"><a href="products_alcatel_phones.php"><font color="#000000">Phones</font></a></li>
    <li><a href="products_alcatel_smartphones.php"><font color="#000000">Smartphones</font></a></li>
    <li><a href="products_alcatel_tablets.php"><font color="#000000">Tablets</font></a></li>
    <li><a href="products_alcatel_accessories.php"><font color="#000000">Accessories</font></a></li>
  </ul>
</div></caption>

<thead style="text-align:center;">

<tr>
<th style="text-align:center; width:200px;">Image</th>
<th style="text-align:center; width:200px;">Name</th>
<th style="text-align:center; width:200px;">Brand</th>
<th style="text-align:center; width:200px;">Price</th>
<th style="text-align:center;">Action</th>

</tr>

</thead>
<tbody>
<?php

include('admin/includes/db.php');
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

$result= mysqli_query($con,"select * from products where product_brand='Alcatel' and product_type='Phones' and product_status='Available' order by product_id ASC ") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$product_id=$row['product_id'];
?>

<tr>
<td style="text-align:center; word-break:break-all; width:200px;"> <a href="#<?php  echo $product_id;?>" data-toggle="modal"><img src="<?php echo "admin/".$row['location']; ?>" width="75px" height="75px"></a></td>
<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['product_name']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['product_brand']; ?></td>
<td style="text-align:center; word-break:break-all; width:200px;">Ksh <?php $oprice=$row['product_price']; echo formatMoney($oprice, true);?></td>

<td style="text-align:center; width:236px;">
<?php echo "<a href='view_cart.php?product_id=".$product_id."&action=add' class='btnCart'><img src = 'images/cart_1.png'></a>";?>
</td>
    </tr>
 <!-- Modal Bigger Image -->
    <div id="<?php  echo $product_id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">

    <h3 id="myModalLabel"><b><?php echo $row['product_name']; ?></b></h3>
    </div>
    <div class="modal-body">
	<img src="<?php echo "admin/". $row['location']; ?>" style="width:390px; border-radius:9px; border:5px solid #d0d0d0; margin-left: 63px; height:387px;">
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
    </div>
	
	<?php } ?>
    </tbody>
    </table>
	
	<!-- end table -->
</div>
</div>
</div>
		</div>
		<!---end content-->
		
	</div>		
	
</body>

</html>
