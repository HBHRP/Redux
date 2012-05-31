<?php
	$getContent = mysql_query("SELECT * FROM `system_pages` WHERE `page` = 'contact' LIMIT 1");
	$getArray = mysql_fetch_array($getContent);
	
	$p1 = "<p>";
	$p2 = "</p>";
	
	echo "<h3>".$getArray['title']."</h3>";
	echo $p1.nl2br($getArray['content']).$p2;
	echo $p1."<a href='mailto:".$getArray['tbl5']."'>".$getArray['tbl5']."</a>".$p2;
	
?>