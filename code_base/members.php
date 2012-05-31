<?php
	include("sys_config.php");
	$replace = array(".", "-");
	$with = "";
	$fetchMembers = mysql_query("SELECT * FROM `system_members` ORDER BY `company_name` ASC");
	$countMembers = mysql_num_rows($fetchMembers);
	if(isset($_GET['id']))
	{
		$memID = $_GET['id'];
		$memID = str_replace($replace, $with, $memID);
		if(is_numeric($memID) == TRUE && $memID <= $countMembers+50000)
		{
			$fetchMemberByID = mysql_query("SELECT * FROM `system_members` WHERE `member_id` = '{$memID}' LIMIT 1");
			$row = mysql_fetch_array($fetchMemberByID);
			echo "<h2>".$row['company_name']."</h2>";
			echo "<p><strong>Name:</strong> ".$row['rep_sur']." ".$row['rep_f_name']." ".$row['rep_l_name']."</p>";
			echo "<p><strong>Title:</strong> ".$row['rep_title']."</p>";
			echo "<p><strong>Email:</strong> ".$row['rep_email']."</p>";
			echo "<p><strong>Address:</strong> ".$row['mail_address']."</p>";
			echo "<p><strong>City:</strong> ".$row['city']."</p>";
			echo "<p><strong>Province:</strong> ".$row['province']."</p>";
			echo "<p><strong>Postcode:</strong> ".$row['pcode']."</p>";
			echo "<p><strong>Telephone:</strong> ".$row['tel_no']."</p>";
			echo "<p><strong>Fax:</strong> ".$row['fax_no']."</p>";
			echo "<p><strong>Member since:</strong> ".$row['member_since']."</p>";
			echo "<p><strong>Web Address:</strong> <a href='http://".$row['web_address']."'>".$row['company_name']."</a></p>";
			echo "<p><strong>Company Information:</strong><br />{$row['company_info']}</a></p>";
		}
		else
		{
			die("Error with id paramter.");
		}
	}
	else
	{
?>
<table width="100%" border="0" cellspacing="5" cellpadding="2">
  <tr>
    <td colspan="4"><h3>Members:</h3></td>
	<tr>
	<?php
		$x = 1;
		$count = 1;
		while($row = mysql_fetch_array($fetchMembers))
		{
		  echo '<td class="tbl'.$x.'"><a href="index.php?link=members&id='.$row['member_id'].'">'.$row['company_name'].'</a></td>';
		  if($count==4){echo "</tr><tr>";$x++;$count=0;}
		  if($x == 5){ $x = 1; }
		  $count++;
		}
	?>
	</tr>
</table>
<?php
}
?>