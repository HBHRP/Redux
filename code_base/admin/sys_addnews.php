<?php
								if(isset($_POST['submit']))
								{
									$title = htmlentities(mysql_real_escape_string($_POST['title']));
									$content = htmlentities(mysql_real_escape_string($_POST['content']));
									$date = date("Y-d-m");
									$addItem = mysql_query("INSERT INTO `system_news` (`news_title`, `news_content`, `news_date`) VALUES ('".$title."', '".$content."', '".$date."') ") OR die(mysql_error());
									echo "News item added!";
								}
								else
								{
									echo '
										<form action="" method="post">
											<p>Title:</p>
											<input type="text" name="title" /><br />
											<textarea cols="80" rows="10" name="content"></textarea><br />
											<input type="submit" name="submit" value="Add item!" />
										</form>
									';
								}
?>