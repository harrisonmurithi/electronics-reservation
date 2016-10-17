<!DOCTYPE HTML>
<html>

<head>
  <title>k24 Electronnics</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/php; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  
  
    
 


  
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
          <li><a href="index.php">Home</a></li>
          <li><a href="about_us.php">About Us</a></li>
          <li ><a href="products.php">Products</a></li>
          <li class="selected"><a href="branches.php">Branches</a></li>
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
      <div id="content">
		<h1 style="color:#0000ff; font-size:25px;">PRO Electronics BRANCHES &#38; CONCEPT STORES:</h1>
		<p style="font-size:18px;">There are with 19 branches in Kenya.</p>

			<h1 style="color:#ff0000; font-size:30px;">Our Branches:</h1>
					<table border="0" cellpadding="1" cellspacing="1">
						<tr>
							<td>
					<ul>

						<li>PRO Electronics - Nyeri</li>
<br />
						<li>PRO Electronics - Nairobi City Kaka House Westland</li>
<br />
						<li>Nokia Store - Nairobi CBD</li>
<br />
						<li>Samsung Concept Store - Nyeri</li>
<br />
						<li>Samsung Concept Store Robinsons Nairobi</li>
<br />
						<li>Cherry Kiosk Nyeri</li>
<br />
						<li>PRO Electronics - Nanyuki</li>
<br />
						<li>PRO Electronics TRM Mall</li>
<br />
						<li>Cell Option Cellular Shop - Mombasa</li>
<br />
						<li>Samsung Shop Nyeri</li>
<br />
<br />
					</ul>

					<h1>Other Town:</h1>
					<ul>
						<li>PRO Eldoret </li>
<br />
						<li>PRO Nakuru</li>
<br />
						<li>Nokia Meru</li>
<br />
						<li>PRO Electronics Meru </li>
					</ul>
							</td>
						</tr>
					</table>
					<div align="right">
						<a href="#main" class="link1">Return to Top</a>
					</div>



			<h1 style="color:#ff0000; font-size:30px;">POS Digital-Main:</h1>
					<table border="0" cellpadding="1" cellspacing="1">
						<tr>
							<td>
					<ul>
					<li><b>Address:</b> Indra Gandhi Marg,Delhi</li>
<br />
					<li><b>Contact No.:</b> (+91) 123 4567 89</li>
<br />
					<li><b>E-mail Address:</b> abc@gmail.com</li>
					</ul>
							</td>
						</tr>
					</table>
					<div align="right">
						<a href="#main" class="link1">Return to Top</a>
					</div>

	  </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p><a href="index.php">Home</a> | <a href="about_us.php">About Us</a> | <a href="products.php">Products</a> | <a href="branches.php"><label class="footer_menu">Branches</label></a> | <a href="contact.php">Contact Us</a> | <a href="faq.php">FAQ</a> | <a href="news_event.php">News and Event</a></p>
      <p>Copyright &copy; INNO TECH</p>
    </div>
  </div>
</body>
</html>
