  <tr>
    <td colspan="2" class="footer" id="footer" title="footer"><br />
	<?php 
		if(!isset($_SESSION['loggedin']))
		{
			echo '<p><a href="./index.php?link=login">Login</a></p>'; 
		}
		else
		{
			echo '<p><a href="./index.php?link=logout">Logout</a></p>';
			echo '<p><a href="./index.php?link=loggedin">Control Panel</a></p>';
		}
	?>
	</td>

  </tr>
</table>
</body>
</html>