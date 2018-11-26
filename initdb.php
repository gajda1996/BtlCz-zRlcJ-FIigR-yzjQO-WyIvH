<?php

	$dbhost = 'localhost:/var/run/mysql/mysql.sock';
	$dbuser = 'xgajdo21';
	$dbpass = '8ejvadej';
	$dbdat = 'xgajdo21';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
	if(! $conn ) 
	{
		die(mysql_error());
	}

	mysql_select_db( $dbdat );
?>