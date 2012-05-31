<?php
	
	/****************
	*  All code by  *
	*  Marius Wahl  *
	****************/
	
	if(isset($_POST['submit']))
	{
		/* Variables */
		$submit 	= $_POST['submit'];
		$username	= htmlentities(mysql_real_escape_string($_POST['username']));
		$password	= hash(sha256, $_POST['password']);
		$userIP		= $_SERVER['REMOTE_ADDR'];
		/* End */
		
		/* SQL Queries */
		$checkUser 	= "SELECT * FROM `system_members` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
		$checkUserQuery = mysql_query($checkUser);
		$checkUserNum	= mysql_num_rows($checkUserQuery);
		/* End */
		
		// If username and password is correct.
		if($checkUserNum > 0)
		{
			$userArray = mysql_fetch_array($checkUserQuery);
			// Registering sessions.
			$_SESSION['username']	= $username;
			$_SESSION['id']			= $userArray['id'];
			$_SESSION['ip']			= $userIP;
			$_SESSION['loggedin']   = 1;
			// Sending to members area.
			header("Location:index.php?link=loggedin");
		}
		else
		{
			header("Location:index.php?link=error&id=1");
		}
		
	}
	else
	{
		?>
			<form method="post" action="">
				<input type="username" value="username" name="username" onclick="value=''" /><br />
				<input type="password" value="password" name="password" onclick="value=''" /><br />
				<input type="submit" value="Login" name="submit" onclick="value='Processing...'" />
			</form>
		<?php
	}
?>