<?php
								if(isset($_GET['id']))
								{
									$memID = $_GET['id'];
									if(is_numeric($memID))
									{
										$fetchmem = mysql_query("SELECT * FROM `system_members` WHERE `member_id` = '".$memID."' LIMIT 1");
										$fetch2 = mysql_query("SELECT * FROM `system_members` WHERE `host_id` = '".$memID."' LIMIT 1");
										$ruw = mysql_fetch_array($fetchmem);
										$rcw = mysql_fetch_array($fetch2);
										if(isset($_POST['submit']))
										{
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
                      $info = htmlentities(mysql_real_escape_string($_POST['information']));
                      
                      if( strlen( $info ) > 500 )
                        die( "Error: Company information exceeded the max amount of characters, please try again" );

											if(isset($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']))
											{
												$username = htmlentities(mysql_real_escape_string($_POST['username']));
												$password = hash('sha256', $_POST['password1']);
												$password2 = hash('sha256', $_POST['password2']);
												if($_POST['username'] != $rcw['username'])
												{
													$update = mysql_query("UPDATE `system_members` SET `username` = '".$username."' WHERE `host_id` = '".$memID."' LIMIT 1");
												}
												if($password != $rcw['password'])
												{
													if($password == $password2)
													{
														$update = mysql_query("UPDATE `system_members` SET `password` = '".$password."' WHERE `host_id` = '".$memID."' LIMIT 1");
													}
													else
													{
														echo "ERROR: The passwords were not alike.";
													}
												}
											}
											$addMem = mysql_query("UPDATE `system_members` SET `company_info` = '{$info}', `company_name` = '".$company."', `rep_f_name` = '".$fname."', `rep_l_name` = '".$lname."', `rep_sur` = '".$prefix."', `rep_title` = '".$title."', `rep_email` = '".$email."', `mail_address` = '".$address."', `city` = '".$city."', `province` = '".$province."', `pcode` = '".$postcode."', `tel_no` = '".$telephone."', `fax_no` = '".$fax."', `member_since` = '".$membersince."', `web_address` = '".$url."' WHERE `member_id` = '".$memID."' LIMIT 1") or die(mysql_error());
											echo "Member updated!";
										}
										else
										{
											echo '
												<h2>Edit Member:</h2>
												<form action="" method="post">
													Username: <br />
													<input type="text" name="username" value="'.$rcw['username'].'" /><br />
													Password: <br />
													<input type="text" name="password1" value="" /><br />
													Confirm Password: <br />
													<input type="text" name="password2" value="" /><br /><hr><br />
													Company Name: <br />
													<input type="text" name="company" value="'.$ruw['company_name'].'" /><br />
													Prefix: <br />
													<input type="text" name="prefix" value="'.$ruw['rep_sur'].'" /><br />
													First Name: <br />
													<input type="text" name="fname" value="'.$ruw['rep_f_name'].'" /><br />
													Last Name: <br />
													<input type="text" name="lname" value="'.$ruw['rep_l_name'].'" /><br />
													Title: <br />
													<input type="text" name="title" value="'.$ruw['rep_title'].'" /><br />
													Email: <br />
													<input type="text" name="email" value="'.$ruw['rep_email'].'" /><br />
													City: <br />
													<input type="text" name="city" value="'.$ruw['city'].'" /><br />
													Address: <br />
													<input type="text" name="address" value="'.$ruw['mail_address'].'" /><br />
													Province: <br />
													<input type="text" name="province" value="'.$ruw['province'].'" /><br />
													Postcode: <br />
													<input type="text" name="postcode" value="'.$ruw['pcode'].'" /><br />
													Telephone: <br />
													<input type="text" name="telephone" value="'.$ruw['tel_no'].'" /><br />
													Fax: <br />
													<input type="text" name="fax" value="'.$ruw['fax_no'].'" /><br />
													Member since:<br />
													<input type="text" name="membersince" value="'.$ruw['member_since'].'" /><br />
													Web Address:  <br />
													<input type="text" name="url" value="'.$ruw['web_address'].'" /><br />
													Company Information (500 chars max): <br />
                          <textarea name="information">'.$ruw['company_info'].'</textarea><br /><br />
													<input type="submit" name="submit" value="Edit!" />
												</form>
											';
										}
									}
									else
									{
										echo "Invalid id parameter specified.";
									}
								}
								
								else
								{
									$selectMem = mysql_query("SELECT * FROM `system_members` ORDER BY `company_name` ASC");
									echo "<h2>Edit Member:</h2>";
									while($raw = mysql_fetch_array($selectMem))
									{
										echo "<p><a href='./index.php?link=admin&action=edit&what=members&id={$raw['member_id']}'>{$raw['company_name']}</a></p>";
									}
								}
?>