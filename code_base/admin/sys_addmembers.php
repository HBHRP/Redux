<?php
								if(isset($_POST['submit']))
								{
									$username = htmlentities(mysql_real_escape_string($_POST['username']));
									$password = hash('sha256', $_POST['password1']);
									$password2 = hash('sha256', $_POST['password2']);
									$company = htmlentities(mysql_real_escape_string($_POST['company']));
									$prefix = htmlentities(mysql_real_escape_string($_POST['prefix']));
									$fname = htmlentities(mysql_real_escape_string($_POST['fname']));
									$lname = htmlentities(mysql_real_escape_string($_POST['lname']));
									$title = htmlentities(mysql_real_escape_string($_POST['title']));
									$city = htmlentities(mysql_real_escape_string($_POST['city']));
									$email = htmlentities(mysql_real_escape_string($_POST['email']));
									$postcode = htmlentities(mysql_real_escape_string($_POST['postcode']));
									$address = htmlentities(mysql_real_escape_string($_POST['address']));
									$province = htmlentities(mysql_real_escape_string($_POST['province']));
									$telephone = htmlentities(mysql_real_escape_string($_POST['telephone']));
									$fax = htmlentities(mysql_real_escape_string($_POST['fax']));
									$membersince = htmlentities(mysql_real_escape_string($_POST['membersince']));
									$url = htmlentities(mysql_real_escape_string($_POST['url']));
									if($password != $password2)
									{
									}
									else
									{
										$addMem = mysql_query("INSERT INTO `system_members` (`company_name`, `rep_f_name`, `rep_l_name`, `rep_sur`, `rep_title`, `rep_email`, `mail_address`, `city`, `province`, `pcode`, `tel_no`, `fax_no`, `member_since`, `web_address`) VALUES ('".$company."','".$fname."','".$lname."','".$prefix."','".$title."','".$email."','".$address."','".$city."','".$province."','".$postcode."','".$telephone."','".$fax."','".$membersince."','".$url."')") or die(mysql_error());
										$id = mysql_insert_id();
										$addLogin = mysql_query("INSERT INTO `system_members` (`username`, `password`, `host_id`) VALUES ('".$username."', '".$password."', '".$id."')") OR die(mysql_error());
										echo "User added.";
									}
								}
								else
								{
									echo '
										<form action="" method="post">
											Username: <br />
											<input type="text" width="150px" name="username" /><br />
											Password: <br />
											<input type="password" width="150px" name="password1" /><br />
											Confirm Password: <br />
											<input type="password" width="150px" name="password2" /><br /><hr><br />
											Company Name: <br />
											<input type="text" width="150px" name="company" /><br />
											Prefix: <br />
											<input type="text" width="150px" name="prefix" /><br />
											First Name: <br />
											<input type="text" width="150px" name="fname" /><br />
											Last Name: <br />
											<input type="text" width="150px" name="lname" /><br />
											Title: <br />
											<input type="text" width="150px" name="title" /><br />
											Email: <br />
											<input type="text" width="150px" name="email" /><br />
											Address: <br />
											<input type="text" width="150px" name="address" /><br />
											City: <br />
											<input type="text" width="150px" name="city" /><br />
											Province: <br />
											<input type="text" width="150px" name="province" /><br />
											Postcode: <br />
											<input type="text" width="150px" name="postcode" /><br />
											Telephone: <br />
											<input type="text" width="150px" name="telephone" /><br />
											Fax: <br />
											<input type="text" width="150px" name="fax" /><br />
											Member since:<br />
											<input type="text" width="150px" name="membersince" /><br />
											Web Address: <br />
											<input type="text" width="150px" name="url" /><br /><br />
											<input type="submit" name="submit" value="Add!" />
										</form>
									';
								}
?>