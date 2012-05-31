<?php
								if(isset($_GET['page']))
								{
									if($_GET['page'] == "home")
									{
										if(isset($_POST['submit']))
										{
											$title = htmlentities(mysql_real_escape_string($_POST['title']));
											$content = htmlentities(mysql_real_escape_string($_POST['content']));
											$query = mysql_query("UPDATE `system_pages` SET `content` = '".$content."', `title` = '".$title."' WHERE `page` = 'home' LIMIT 1") OR die(mysql_error());
											echo "Page updated!";
										}
										else
										{
											$getContent = mysql_query("SELECT * FROM `system_pages` WHERE `page` = 'home' LIMIT 1") OR die(mysql_error());
											$getArray = mysql_fetch_array($getContent);
											echo '<h2>Edit Home</h2>
												<form method="post" action="">
													<input type="text" name="title" value="'.htmlentities($getArray['title']).'" /><br /><br />
													<textarea cols="80" rows="10" name="content">'.$getArray['content'].'</textarea><br /><br />
													<input type="submit" name="submit" />
												</form>
											';
										}
									}
									elseif($_GET['page'] == "contact")
									{
										if(isset($_POST['submit']))
										{
											$title = htmlentities(mysql_real_escape_string($_POST['title']));
											$content = htmlentities(mysql_real_escape_string($_POST['content']));
											$query = mysql_query("UPDATE `system_pages` SET `content` = '".$content."', `title` = '".$title."' WHERE `page` = 'contact' LIMIT 1") OR die(mysql_error());
											echo "Page updated!";
										}
										else
										{
											$getContent = mysql_query("SELECT * FROM `system_pages` WHERE `page` = 'contact' LIMIT 1") OR die(mysql_error());
											$getArray = mysql_fetch_array($getContent);
											echo '<h2>Edit Contact</h2>
												<form method="post" action="">
													<input type="text" name="title" value="'.htmlentities($getArray['title']).'" /><br /><br />
													<textarea cols="80" rows="10" name="content">'.$getArray['content'].'</textarea><br /><br />
													<input type="submit" name="submit" />
												</form>
											';
										}
									}
									elseif($_GET['page'] == "meminfo")
									{
										if(isset($_POST['submit']))
										{
											$title = htmlentities(mysql_real_escape_string($_POST['title']));
											$content = htmlentities(mysql_real_escape_string($_POST['content']));
											$query = mysql_query("UPDATE `system_pages` SET `content` = '".$content."', `title` = '".$title."' WHERE `page` = 'meminfo' LIMIT 1") OR die(mysql_error());
											echo "Page updated!";
										}
										else
										{
											$getContent = mysql_query("SELECT * FROM `system_pages` WHERE `page` = 'meminfo' LIMIT 1") OR die(mysql_error());
											$getArray = mysql_fetch_array($getContent);
											echo '<h2>Edit Membership Information</h2>
												<form method="post" action="">
													<input type="text" name="title" value="'.htmlentities($getArray['title']).'" /><br /><br />
													<textarea cols="80" rows="10" name="content">'.$getArray['content'].'</textarea><br /><br />
													<input type="submit" name="submit" />
												</form>
											';
										}
									}
									else
									{
										echo "Invalid page parameter specified.";
									}
								}
								else
								{
									echo '<h2>Select Page:</h2>';
									echo '<p><a href="./index.php?link=admin&action=edit&what=pages&page=home">Home</a></p>';
									echo '<p><a href="./index.php?link=admin&action=edit&what=pages&page=contact">Contact</a></p>';
									echo '<p><a href="./index.php?link=admin&action=edit&what=pages&page=meminfo">Membership Information</a></p>';
								}
?>