<?php session_start();


?>



<!DOCTYPE html>
<html>
<head>
    <title>k24 Electronics</title>
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="js/jquery/jquery-ui.css">
      <script src="js/jquery/jquery-1.12.4.js"></script>
      <script src="js/jquery/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

  <script>
      $(".ui-datepicker-next, .ui-datepicker-prev").hover(function () {
          $(this).addClass("hover");
          },
      function () {
          $(this).removeClass("hover");
          });
  </script>

  <script type='text/javascript'>
  function refreshCaptcha(){
  	var img = document.images['captchaimg'];
  	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
  }
  </script>
<style>
  .hover
  {
      background-image:url('images/bg/2.jpg');
  }

</style>
</head>

<body>




	<div id="wrapper">
	
		<div id="login_form">
			<b>k24 Electronics</b>
			<br />
			<br />
<form method="post" action="signup_action.php" enctype="multipart/form-data">
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
			<td><input type="password" name="password" placeholder="" required /></td>
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
			<td><input type="text" name="date" id="datepicker" placeholder="mm/dd/yy" required /></td>
		</tr>

		<?php if(isset($msg)){?>
                    <tr>
                      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                      <td align="right" valign="top"> Validation code:</td>
                      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                        <label for='message'>Enter the code above here :</label>
                        <br>
                        <input id="captcha_code" name="captcha_code" type="text" required>
                        <br>
                        Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>
                    </tr>


		<tr>
		<td>&nbsp;</td>
			<td colspan="3" style="text-align:center;">
			<button class="btn-submit-photo" name="Submit" type="submit" style="text-align:center; margin-left:10px; margin-right:10px;"  onclick="return validate();">signup</button>
			<a href="index.php"><input type="button" class="btn-cancel-photo" value="Cancel" style="text-align:center; margin-left:10px; margin-right:10px;"></a>
			</td>
		</tr>



	</table>
</form>
			
		</div>
	
	</div>
	
</body>

</html>

