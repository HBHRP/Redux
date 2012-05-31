<?php
/* 
$valid_array = array( "link" => array( "home", "members", "contact", "news", "membership", "login" );

foreach( $_GET as $key => $value ){
  if ( array_key_exists( $key, $valid_array ) ){
    $module = in_array($value, $valid_array[$key]) == TRUE ? "{$value}.php" : "home.php";
    if ( !file_exists( $module ) ){
      $module = "home.php";
    }  
  }
}
if( !$module ) $module = "home.php";
require_once( $module ); 
*/

$page = isset( $_GET['link'] ) ? $_GET['link'] : "";

switch($page)
{
	case 'members':
		require_once( "members.php" );
	break;
	
	case 'contact':
		require_once( "contact.php" );
	break;
	
	case 'news':
		require_once( "news.php" );
	break;
	
	case 'membership':
		require_once( "membership.php" );
	break;
	
	case 'login':
		require_once( "login.php" );
	break;
	
	case 'admin':
		require_once( "admin.php" );
	break;
	
	case 'error':
		require_once( "error.php" );
	break;
	
	case 'loggedin':
		require_once( "loggedin.php" );
	break;
	
	case 'logout':
		session_destroy();
		echo "You were successfully logged out.";
	break;
	
	default:
		require_once( "home.php" );
	
}

?>