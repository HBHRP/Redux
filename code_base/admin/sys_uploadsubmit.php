<?php
              $query = mysql_query( "SELECT * FROM `system_members` WHERE `id` = '{$_SESSION['id']}' LIMIT 1" );
              $qdata = mysql_fetch_assoc( $query );
              $path = "./downloads/{$qdata['host_id']}-";
              
              $name = mysql_real_escape_string( strip_tags( $_POST['name'] ) );
              
              $_FILES['upload']['name'] = str_replace( '.php', '', $_FILES['upload']['name'] );

              $target = $path . $_FILES['upload']['name']; 

              if( move_uploaded_file( $_FILES['upload']['tmp_name'], $target ) )
              {
                mysql_query( "INSERT INTO `system_downloads` VALUES ('', '{$_FILES['upload']['name']}', '{$name}', '{$qdata['host_id']}')" );
                
                echo "File uploaded.";
              }
              else
                echo "Error uploading file.";
?>