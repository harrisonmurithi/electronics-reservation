<?php
						include('admin/includes/db.php');



                        // define variables and set to empty values
                        $fnameErr = $emailErr = $lnameErr=$cnoErr = "";
                        $firstname = $email = $lastname =$contactno = $contactno1=$email1="";

                        /*if(isset($_POST['Submit'])){
                        	// code for check server side validation
                        	if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){
                        		$msg="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.
                        	}
                            */
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["firstname"])) {
                            $fnameErr = "Name is required";
                          } else {
                            $firstname = test_input($_POST["firstname"]);
                            // check if name only contains letters and whitespace
                            if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                              $fnameErr = "Only letters and white space allowed";
                            }
                          }

                          if (empty($_POST["email"])) {
                            $emailErr = "Email is required";
                          } else {
                            $email = test_input($_POST["email"]);
                            // check if e-mail address is well-formed
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                              $emailErr = "Invalid email format";
                            }
                            else
                            {
                            $email1=$email;
                            }
                          }

                          if (empty($_POST["lastname"])) {
                            $lnameErr = "Last Name required";
                          } else {
                            $lastname = test_input($_POST["lastname"]);
                            // check if name only contains letters and whitespace
                            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                              $lnameErr = "Only letters and white space allowed";
                            }
                          }


                        $contactno = $_POST['contactno'];

                        if(!empty($contactno)) // phone number is not empty
                        {
                            if(preg_match('/^\d{10}$/',$contactno)) // phone number is valid
                            {
                              $contactno1 = '0' . $contactno;

                              // your other code here
                            }
                            else // phone number is not valid
                            {
                              echo 'Phone number invalid !';
                            }
                        }
                        else // phone number is empty
                        {
                          echo 'You must provid a phone number !';
                        }

                          $password=$_POST['password'];


                          $postaladdress=$_POST['postaladdress'];
                           $dob=$_POST['date'];
                        }




                        function test_input($data) {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          return $data;
                        }



//if(empty($msg)){
						
							$sql="INSERT INTO members (firstname,lastname,email,password,contact_no,address,date)
									VALUES('$firstname','$lastname','$email1','".password_hash($password,PASSWORD_DEFAULT)."','$contactno1','$postaladdress','$dob')";

						if(mysqli_query($con, $sql)){


                            echo "<script>alert('customer has been added'); window.location='index.php'</script>";

                        } else{

                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

                        }
                      //  }
                       /* else{
                        echo "<script>alert('customer has been added'); window.location='signup.php'</script>";
                        }


                        */

                        // close connection

                        mysqli_close($con);

						?>
			