<!DOCTYPE HTML>
<html>

<head>
  <title>k24 Electronnics</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/php; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  
  
    
 

<style>



</style>
  
</head>

<body>
   <div id="main"  width="1200px">
    <div id="header" width="1200px">
      <div id="logo">
	  <img src="images/header.png" width="1000px" height="140px">
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="index.php">Home</a></li>
          <li><a href="about_us.php">About Us</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="branches.php">Branches</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="news_event.php">News and Event</a></li>
<li><div class="dropdown">
  <a>My Account</a>

  <div class="dropdown-content">

  <a href="loginpage.php">Login</a>
    <a href="signup.php">Signup</a>
</div>
 </div>
  </li>
          <li><a href="view_cart.php">Cart</a></li>

        </ul>
			 
<form method="get" action="result.php" enctype="multipart/form-data" >
<input type="search" name="search" placeholder="search" style=" padding: 4px 4px 4px 5px;line-height: 1.5em;margin-top:6px;">

</form>
      

</div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
      <div id="banner">
<!--slider-->
			<div id="slidy-container">
				<figure id="slidy">
					<img src="images/slider/posdigital1.jpg" alt="">
					<img src="images/slider/posdigital2.jpg" alt="">
					<img src="images/slider/posdigital3.jpg" alt="">
					<img src="images/slider/posdigital4.jpg" alt="">
					<img src="images/slider/posdigital5.jpg" alt="">
				</figure>
			</div>
<!--script-->
			<script>
			var timeOnSlide = 3,
			timeBetweenSlides = 1,
			animationstring = 'animation',
			animation = false,
			keyframeprefix = '',
			domPrefixes = 'Webkit Moz O Khtml'.split(' '),
			pfx = '',
			slidy = document.getElementById("slidy");
			if (slidy.style.animationName !== undefined) { animation = true; }
			if ( animation === false ) {
			for ( var i = 0; i < domPrefixes.length; i++ ) {
			if ( slidy.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
			pfx = domPrefixes[ i ];
			animationstring = pfx + 'Animation';
			keyframeprefix = '-' + pfx.toLowerCase() + '-';
			animation = true;
			break;
			} } }
			if ( animation === false ) {
			// animate using a JavaScript fallback, if you wish
			} else {
			var images = slidy.getElementsByTagName("img"),
			firstImg = images[0],
			imgWrap = firstImg.cloneNode(false);
			slidy.appendChild(imgWrap);
			var imgCount = images.length,
			totalTime = (timeOnSlide + timeBetweenSlides) * (imgCount - 1),
			slideRatio = (timeOnSlide / totalTime)*100,
			moveRatio = (timeBetweenSlides / totalTime)*100,
			basePercentage = 100/imgCount,
			position = 0,
			css = document.createElement("style");
			css.type = "text/css";
			css.innerHTML += "#slidy { text-align: left; margin: 0; font-size: 0; position: relative; width: " + (imgCount * 100) + "%; }";
			css.innerHTML += "#slidy img { float: left; width: " + basePercentage + "%; }";
			css.innerHTML += "@"+keyframeprefix+"keyframes slidy {";
			for (i=0;i<(imgCount-1); i++) {
			position+= slideRatio;
			css.innerHTML += position+"% { left: -"+(i * 100)+"%; }";
			position += moveRatio;
			css.innerHTML += position+"% { left: -"+((i+1) * 100)+"%; }";
			}
			css.innerHTML += "}";
			css.innerHTML += "#slidy { left: 0%; "+keyframeprefix+"transform: translate3d(0,0,0); "+keyframeprefix+"animation: "+totalTime+"s slidy infinite; }";
			document.body.appendChild(css);
			}
			</script>
	  </div>
	  <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
		<div class="side_bar">	
			<a href="phones.php" class="sidebar_menu"><img src="images/icon/phonesicon.png" width="33" alt="Phones">&nbsp;&nbsp;Phones</a>
		</div>
		<div class="side_bar">	
			<a href="smartphones.php" class="sidebar_menu"><img src="images/icon/smartphone.png" width="33" alt="Phones">&nbsp;&nbsp;Smartphones</a>
		</div>
		<div class="side_bar">	
			<a href="tablets.php" class="sidebar_menu"><img src="images/icon/tableticon.png" width="33" alt="Phones">&nbsp;&nbsp;Tablets</a>
		</div>
		<div class="side_bar">	
			<a href="accessories.php" class="sidebar_menu"><img src="images/icon/accessoriesicon2.png" width="33" alt="Phones">&nbsp;&nbsp;Accessories</a>
		</div>
		<div class="side_bar">	
			<a href="smart_products.php" class="sidebar_menu"><img src="images/icon/smarticon.png" width="33" alt="Phones">&nbsp;&nbsp;Smart Products</a>
		</div>
		<div class="side_bar">	
			<a href="signal.php" class="sidebar_menu"><img src="images/icon/cgnal.png" width="33" alt="Phones">&nbsp;&nbsp;Signal HD TV</a>
		</div>
          </div>
        </div>
        <div class="sidebar"></div>
      </div>
      <div id="">
	  
	  
	  
	   
	  
	  
	  
<?php

include ('admin/includes/db.php');
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
			
$result= mysqli_query($con,"select * from products where product_type='Smartphones' and product_status='Available' and product_brand='Samsung' order by product_id DESC") or die (mysqli_error());
while ($row= mysqli_fetch_array ($result) ){
$product_id=$row['product_id'];
?>
					<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tab">
						<tbody>		
							<tr valign="top">			
								<td align="center" width="22%" height="320" bgcolor="#ffffff">
									<img src="<?php echo "admin/". $row['location']; ?>"  style="width:300px; height:340px; margin:10px 0 7px 0;">
								</td>							
								<td width="1%">&nbsp;</td>						
								<td align="left" width="40%" height="320" bgcolor="#ffffff" >
						<br />
									<span class="items">								
										<b>
											<?php echo $row['product_name']; ?>
										</b>								
									</span>	
						<br />
						<br />
									<p class="desc" style="text-align:center; word-wrap:break-word; word-spacing:5px;"> 
										<?php echo $row['product_description']; ?>
									</p>
									<center>		
										<span class="prices">
										Selling Price	Ksh <?php $oprice=$row['product_price']; echo formatMoney($oprice, true);?>
										</span>	
                                                    <br/>

								<span class="prices">
										Reserve Fee	Ksh <?php $rprice=$row['reservefee']; echo formatMoney($rprice, true);?>
										</span>	
						<br />
						<br />
<?php echo " <a href='view_cart.php?product_id= ".$product_id." &action=add' class='btnCart'><img src = 'images/cart_1.png'></a> ";


?>
						</center>						
								</td>				
							</tr>		
						</tbody>	
					</table>
<?php 
}
?>
  </div>
    </div>


   

    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php"><label class="footer_menu">Home</label></a> | <a href="about_us.php">About Us</a> | <a href="products.php">Products</a> | <a href="branches.php">Shops</a> | <a href="contact.php">Contact Us</a> | <a href="faq.php">FAQ</a> | <a href="news_event.php">News and Event</a></p>
      <p>Copyright &copy; K24 Electronics</p>
    </div>
  </div>
</body>
</html>
