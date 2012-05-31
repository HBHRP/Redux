<?php
	if(isset($_SESSION['loggedin']))
	{
		$sql = mysql_query("SELECT * FROM `system_members` WHERE `username` = '".$_SESSION['username']."'");
		$row = mysql_fetch_array($sql);
		if($row['rights'] == 1)
		{
			if(isset($_GET['action']))
			{
				$action = $_GET['action'];
				switch($action)
				{
					case 'edit':
						if(isset($_GET['what']))
						{
							if($_GET['what'] == "members")
							{
								include(admin/sys_editmembers.php);
							}
							if($_GET['what'] == "pages")
							{
								include(admin/sys_editpages.php);
							}
						
						if( $_GET['what'] == "downloads" )
						{
							include(admin/sys_editdownload.php);
						}
					break;
					
					case 'add':
						if(isset($_GET['what']))
						{
							$what = $_GET['what'];
							if($what == "members")
							{
								include(admin/sys_addmember.php);
							}
							else
							{
								echo "Invalid selection.";
							}
						}
						else
						{
							echo "Invalid selection<!--3-->.";
						}
					break;
					
					case 'news':
						if(isset($_GET['cmd']))
						{
							if($_GET['cmd'] == "add")
							{
								include(admin/sys_addnews.php);
							}
							elseif($_GET['cmd'] == "del")
							{
								include(admin/sys_delnews.php);
							}
							elseif($_GET['cmd'] == "edit")
							{
								include(admin/sys_editnews.php);
							}
							else
							{
								echo "Invalid selecion.";
							}
						}
						else
						{
							echo '<h2>News Options:</h2>';
							echo '<p><a href="index.php?link=admin&action=news&cmd=add">Add news item.</a>';
							echo '<p><a href="index.php?link=admin&action=news&cmd=del">Delete news item.</a></p>';
							echo '<p><a href="index.php?link=admin&action=news&cmd=edit">Edit news item.</a></p>';
						}
					break;
					
					case 'delete':
						if(isset($_GET['what']))
						{
							$what = $_GET['what'];
							if($what == "members")
							{
								include(admin/sys_members.php);
							}
							elseif($_GET['id'])
							{
								include(admin/sys_memberid.php);
							}
							else
							{
								echo "No id parameter specified.";;
							}
						}
						else
						{
							echo "Invalid selection.";
						}
					break;
					
					case 'upload':
            if( !isset( $_POST['submit'] ) )
            {
              echo "<form method='post' enctype='multipart/form-data'>" .
                   "File: <input type='file' name='upload' /><br />" .
                   "Anchor Text: <input type='text' name='name' /><br />" .
                   "<input type='submit' name='submit' value='Upload' />" .
                   "</form>";
            }
            else
            {
				include(admin/sys_uploadsubmit.php);
            }
            break;       
					
					default:
						echo "Invalid action.";
				}
			}
			else
			{
				echo "No action selected!";
			}
		}
		else
		{
			echo "You are not an admin!";
		}
	}
	else
	{
		echo "You are not permitted to be here. Please <a href='./index.php?link=login'>log in</a> to see this page.";
	}
?>