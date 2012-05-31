<?php
	$getContent = mysql_query("SELECT * FROM `system_pages` WHERE `page` = 'home' LIMIT 1");
	$getArray = mysql_fetch_array($getContent);
	
	$p1 = "<p class='about'>";
	$p2 = "</p>";
	
	echo $p1.nl2br($getArray['content']).$p2;
	
?>