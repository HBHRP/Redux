<?php
								if(isset($_GET['id']))
								{
									$delItem = mysql_query("DELETE FROM `system_news` WHERE `news_id` = '".mysql_real_escape_string($_GET['id'])."' LIMIT 1") OR die(mysql_error());
									echo "News item deleted!";
								}
								else
								{
									echo "<h2>Select item:</h2>";
									$fetchNews = mysql_query("SELECT * FROM `system_news`");
									while($row = mysql_fetch_array($fetchNews))
									{
										echo "<p><a href='index.php?link=admin&action=news&cmd=del&id=".$row['news_id']."' />".$row['news_title']."</a></p>";
									}
								}
?>