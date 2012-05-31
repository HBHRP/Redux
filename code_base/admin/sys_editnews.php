<?php
								if(isset($_GET['id']))
								{
									if(isset($_POST['submit']))
									{
										$title = htmlentities(mysql_real_escape_string($_POST['title']));
										$content = htmlentities(mysql_real_escape_string($_POST['content']));
										$date = htmlentities(mysql_real_escape_string($_POST['date']));
										$editAdd = mysql_query("UPDATE `system_news` SET `news_title` = '".$title."', `news_content` = '".$content."', `news_date` = '".$date."' WHERE `news_id` = '".$_GET['id']."' LIMIT 1") OR die(mysql_error());
										echo "News item updated!";
									}
									else
									{
										$ughh = mysql_query("SELECT * FROM `system_news` WHERE `news_id` = '".mysql_real_escape_string($_GET['id'])."' LIMIT 1") OR die(mysql_error());
										$fetch = mysql_fetch_array($ughh);
										echo '
											<form action="" method="post">
												<input type="text" width="150px" name="title" value="'.$fetch['news_title'].'" /><br />
												<input type="text" width="150px" name="date" value="'.$fetch['news_date'].'" /><br />
												<textarea name="content" cols="80" rows="10">'.$fetch['news_content'].'</textarea><br />
												<input type="submit" name="submit" value="Update!" />
											</form>
										';
									}
								}
								else
								{
									echo "<h2>Select item:</h2>";
									$fetchNews = mysql_query("SELECT * FROM `system_news`");
									while($row = mysql_fetch_array($fetchNews))
									{
										echo "<p><a href='index.php?link=admin&action=news&cmd=edit&id=".$row['news_id']."' />".$row['news_title']."</a></p>";
									}
								}
?>