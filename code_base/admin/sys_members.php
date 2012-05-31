<?php
								$fetchMembers = mysql_query("SELECT * FROM `system_members`");
								echo "<h2>Delete Member:</h2>";
								while($raw = mysql_fetch_array($fetchMembers))
								{
									echo "<p><a href='./index.php?link=admin&action=delete&what=pages&id={$raw['member_id']}'>{$raw['company_name']}</a></p>";
								}
?>