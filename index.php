<?php
	include "initdb.php";
	
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