<?php
	ob_start();
	session_start();
	ini_set('display_errors', 1);
	require_once( "sys_config.php" );
	if(isset($_SESSION['ip']))
	{
		if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'])
		{
			echo "<p><strong><font color='#FF0000'>Error:</font></strong> You don't have the same IP as you logged in with.</p>";
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title></title>
</head>
<body>
<link href="basic-style.css" rel="stylesheet" type="text/css">
<table width="100%"  border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td valign="top">
<? require_once('logo.php'); ?>
    </td>
    <td valign="top">
<? require_once('title.php'); ?>
    </td>
  </tr>
  <tr>
    <td class="npanel">
<? require_once('navigation.php'); ?>
    </td>
    <td class="main" width="80%" valign="top">
<? require_once('navlink.php'); ?>
    </td>
  </tr>
  <tr>
    <td colspan=2 valign="top">
<? require_once('footer.php'); ?>
    </td>
  </tr>
</table>