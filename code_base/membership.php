<?php
	$getContent = mysql_query("SELECT * FROM `system_pages` WHERE `page` = 'meminfo' LIMIT 1");
	$getArray = mysql_fetch_array($getContent);
	
	$p1 = "<p>";
	$p2 = "</p>";
	
	echo "<h3>".$getArray['tbl1']."</h3>";
	echo $p1.nl2br($getArray['content']).$p2;
	
  $downloads = mysql_query( "SELECT * FROM `system_downloads`" );
  
  $rows = mysql_num_rows( $downloads );
  if(isset($_SESSION['loggedin']))    if( $rows > 0 ){
    {
  
      echo "<hr>
<h2>Downloads</h2>";
    
      while( $data = mysql_fetch_assoc( $downloads ) )
        echo "<p><a href='./downloads/{$data['host_id']}-{$data['link']}'>{$data['text']}</a></p>";
    }
  }
	
?>