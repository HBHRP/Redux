<?php
								$memID = mysql_real_escape_string($_GET['id']);
								if(is_numeric($memID))
								{
									$delMem = mysql_query("DELETE FROM `systemmembers` WHERE `member_id` = '{$memID}' LIMIT 1") OR die(mysql_error());
									$delMemLogin = mysql_query("DELETE FROM `system_members` WHERE `host_id` = '{$memID}' LIMIT 1") OR die(mysql_error());
									echo "Member deleted!";
								}
								else
								{
									echo "Invalid id parameter specified.";;
								}
?>