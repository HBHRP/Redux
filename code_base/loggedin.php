<?php
	ini_set('display_errors', 1);
	if($_SESSION['loggedin'] == 1)
	{
		if(isset($_GET['action']))
		{
			$action = $_GET['action'];
			$what = $_GET['what'];
			switch($action)
			{
				case 'edit':
					if(isset($_GET['what']))
					{
						if($what == "profile")
						{
							if(isset($_POST['submit']))
							{
								$query = mysql_query("SELECT * FROM `system_members` WHERE `id` = '".$_SESSION['id']."' LIMIT 1");
								$data = mysql_fetch_array($query);
								$company = htmlentities(mysql_real_escape_string($_POST['information']));
								
								if( strlen( $company ) > 500 )
                  die( "Error: Company information exceeded the max amount of characters, please try again" );
								
								if( !empty($_POST['password1']) && !empty($_POST['password2']) )
								{
                  $password = hash('sha256', $_POST['password1']);
                  $password2 = hash('sha256', $_POST['password2']);

                  if($password != $data['password'])
                  {
                    if($password == $password2)
                    {
                      $update = mysql_query("UPDATE `system_members` SET `password` = '".$password."' WHERE `id` = '".$_SESSION['id']."' LIMIT 1");
                    }
                    else
                    {
                      echo "Error: The passwords were not the same.";
                    }
                  }
                }

								$editMem = mysql_query("UPDATE `system_members` SET `company_info` = '{$company}' WHERE `member_id`='".$data['host_id']."' LIMIT 1") or die(mysql_error());
								echo "Profile updated!";
							}
							else
							{
								$getinfo = mysql_query("SELECT * FROM `system_members` WHERE `id`='".$_SESSION['id']."' LIMIT 1");
								$data = mysql_fetch_array($getinfo);
								$memID = $data['host_id'];
								$fetchmem = mysql_query("SELECT * FROM `system_members` WHERE `member_id`='".$memID."' LIMIT 1");
								$ruw = mysql_fetch_array($fetchmem);
								echo '
									<h2>Edit Profile:</h2>
									<form action="" method="post">
                    Username: ' . $data['username'] . '<br />
                    Password: <br />
                    <input type="text" name="password1" value="" /><br />
                    Confirm Password: <br />
                    <input type="text" name="password2" value="" /><br /><hr><br />
										Company Information (500 chars max): <br />
										<textarea name="information">'.$ruw['company_info'].'</textarea><br />
										<input type="submit" name="submit" value="Edit!" />
									</form>
								';
							}
						}
					}
					else
					{
						header("Location:index.php?link=error&id=4");
					}
				break;
				
				default:
					header("Location:index.php?link=error&id=3");
			}
		}
		else
		{
			$sql = mysql_query("SELECT * FROM `system_members` WHERE `username`='".$_SESSION['username']."'");
			$row = mysql_fetch_array($sql);
			echo "Welcome ".$_SESSION['username']."<br /><br />";
			echo 'These are your options: <br />';
			echo '- <a href="index.php?link=loggedin&action=edit&what=profile">Edit Information</a>.<br />';
			echo '- <a href="index.php?link=logout">Logout</a>.<br /><br />';
			if($row['rights'] == 1)
			{
				echo 'Administrator Options:<br />';
				echo '- <a href="index.php?link=admin&action=edit&what=pages">Edit Pages</a><br />';
				echo '- <a href="index.php?link=admin&action=news">News</a><br />';
				echo '- <a href="index.php?link=admin&action=add&what=members">Add Member</a><br />';
				echo '- <a href="index.php?link=admin&action=edit&what=members">Edit Member</a><br />';
				echo '- <a href="index.php?link=admin&action=delete&what=members">Delete Member</a><br />';
				echo '- <a href="index.php?link=admin&action=edit&what=downloads">Edit Downloads</a><br />';
			}
		}
		
	}
	else
	{
		header("Location:index.php?link=error&id=2");
	}
?>