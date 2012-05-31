<?php
              $query = mysql_query( "SELECT * FROM `system_members` WHERE `id` = '{$_SESSION['id']}' LIMIT 1" );
              $qdata = mysql_fetch_assoc( $query );
              
              $downloads = mysql_query( "SELECT * FROM `system_downloads` WHERE `host_id` = '{$qdata['host_id']}'" );

              if( isset( $_GET['delete'] ) && ctype_digit( $_GET['delete'] ) )
              {
                $query = mysql_query( "SELECT * FROM `system_downloads` WHERE `id` = '{$_GET['delete']}'" );
                $dload = mysql_fetch_assoc( $query );
                
                if( mysql_num_rows( $query ) == 0 || !file_exists( "./downloads/{$qdata['host_id']}-{$dload['link']}" ) )
                  die( "Error: file does not exist" );
                
                unlink( "./downloads/{$qdata['host_id']}-{$dload['link']}" );
                mysql_query( "DELETE FROM `system_downloads` WHERE `id` = '{$_GET['delete']}'" );
                header( "Location: ./index.php?link=admin&action=edit&what=downloads" );
              }
		
              $rows = mysql_num_rows( $downloads );
              
              if( $rows > 0 )
              {
                echo "<h2>Downloads</h2>";
                
                while( $data = mysql_fetch_assoc( $downloads ) )
                  echo "<p><a href='./downloads/{$data['host_id']}-{$data['link']}'>{$data['text']}</a> - <a href='./index.php?link=admin&action=edit&what=downloads&delete={$data['id']}'>Delete?</a></p>";
                  
                echo "<br /><p><a href='./index.php?link=admin&action=upload'>Upload more</a></p>";
              }
              else
                echo "You have no downloads, <a href='./index.php?link=admin&action=upload'>upload some?</a>";
            }
?>