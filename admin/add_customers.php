<?php
						include('includes/db.php');


							                            $firstname=$_POST['firstname'];
                                                        $lastname=$_POST['lastname'];
                                                        $email=$_POST['email'];
                                                        $password=$_POST['password'];
                                                        $contactno=$_POST['contactno'];
							
                                                        $postaladdress=$_POST['postaladdress'];
                                                        $dob=$_POST['date'];
						
							$sql="INSERT INTO members (firstname,lastname,email,password,contact_no,address,date)
									VALUES('$firstname','$lastname','$email','$contactno','$password','$postaladdress','$dob')";

						if(mysqli_query($con, $sql)){


                            echo "<script>alert('customer has been added'); window.location='customers.php'</script>";

                        } else{

                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

                        }



                        // close connection

                        mysqli_close($con);

						?>
			