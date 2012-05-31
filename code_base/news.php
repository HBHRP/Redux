<?php
	$getContent = mysql_query("SELECT * FROM `system_news`");

	if(isset($_GET['viewall']))
	{
		echo "<h2>Select news item:</h2>";
		while($row = mysql_fetch_array($getContent))
		{
			echo '<p><a href="index.php?link=news&amp;view='.$row['news_id'].'">'.$row['news_title'].'</a></p>';
		}
	}
	elseif(isset($_GET['view']))
	{
		$viewID = abs( (int) $_GET['view'] );
		if(is_numeric($viewID))
		{
			$getNews = mysql_query("SELECT * FROM `system_news` WHERE `news_id` = '".$viewID."' LIMIT 1");
			$fetchBloodyNews = mysql_fetch_array($getNews);
			echo "<h2>".$fetchBloodyNews['news_title']."</h2>";
			echo "<p>".nl2br($fetchBloodyNews['news_content'])."</p>";
			echo "<p><i>Posted: ".$fetchBloodyNews['news_date']."</i></p>";
		}
		else
		{
		}
	}
	else
	{
		$p1 = "<p class='about'>";
		$p2 = "</p>";
		
		$q1 = mysql_query("SELECT * FROM `system_news` ORDER BY `news_id` DESC LIMIT 3");
		
		while( $get1 = mysql_fetch_array($q1) )
		{
      echo "<h3>".$get1['news_title']."</h3>";
      echo $p1.nl2br($get1['news_content']).$p2;
      echo $p1."<em>Posted: ".$get1['news_date']."</em>".$p2."<hr /><br />";
		}

		echo "<a href='index.php?link=news&amp;viewall'>View all news items</a>";
	}
?>