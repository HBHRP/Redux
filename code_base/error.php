<?php
	$error = $_GET['id'];
	$prefix = '<font color="#FF0000">Error: </font>';
	switch($error)
	{
		case '1':
			echo $prefix.'The username / password was incorrect!<br />Click <a href="index.php?link=login">here</a> to try again.';
		break;
		
		case '2':
			echo $prefix.'You are not allowed in here.';
		break;
		
		default:
			echo $prefix.'No Error ID!';
	}
?>