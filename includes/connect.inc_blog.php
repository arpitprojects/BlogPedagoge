<?php
	$mysql_host = 'localhost';
	$mysql_user = 'root';
	$mysql_pass = '';
	$item_per_page = 6;
	
	$mysql_db = 'pedagoge_blog';
	if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass) || !@mysql_select_db($mysql_db)){
		die(mysql_error());
	}else{
       
    }
	session_start();
	$_SESSION['id'] = 1;

?>
