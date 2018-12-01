<?php

	if (!isset($_SESSION))
	{
		session_start();
	}

	$timelimit=600;
	if (isset($_SESSION['timeout'])) 
	{
		$sessionTTL = time() - $_SESSION['timeout'];
		if ($sessionTTL > $timelimit) 
		{
			session_destroy();
			echo "logout";
		}
    }	
	$_SESSION['timeout'] = time();


	include "initdb.php";
	include "login.php";
	include "edit.php";
	
	$query_file = 'x.txt';
    $cislo=0;
	$fp = fopen($query_file, 'r');
	while(!feof($fp)) 
	{
		$cislo++;
		echo $cislo;
		echo "\n";
        $line = fgets($fp);
		$retval = mysql_query( $line, $conn );
		if(! $retval ) 
		{
			echo mysql_error();
		}
    }
	fclose($fp);
?>