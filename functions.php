<?php

	function skore($cislopiva,$conn)
	{
		$sql = "SELECT * FROM hodnoceni WHERE ID_pivo = '$cislopiva'";
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$i=0;
			$pocet=0;
			$celkem=0;
			$rows = array();
			while($row = mysql_fetch_array($retval))
				$rows[] = $row;
			foreach($rows as $row)
			{
				foreach($row as $data)
				{
					if ($i==6)
					{
						$celkem=$celkem+$data;
						$pocet=$pocet+1;
					}
					if ($i==12)
					{
						$i=0;
					}
					$i=$i+1;
				}
			}
			return $celkem/$pocet;
		}
	}
?>