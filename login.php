<?php

	if (isset($_POST['login']) && isset($_POST['heslo'])) 
	{
		if ($_POST['login'] == "admin" && $_POST['heslo'] == "admin")
		{
			$_SESSION['typ'] = "admin";
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['heslo'] = $_POST['heslo'];
		}
		else
		{
			$login = $_POST['login'];
			$heslo = $_POST["heslo"];
			$sql = "SELECT * FROM uzivatel WHERE login = '$login' AND heslo =  '$heslo'";   
			$retval = mysql_query( $sql, $conn );
			if(!$retval )
			{
				$_SESSION["error"]=1;
				die(mysql_error());
			}
			else
			{
				$row = mysql_fetch_array($retval, MYSQL_NUM);
				if (count($row)>1)
				{
					$sql = "SELECT * FROM sladek WHERE login = '$login'";
					$retval = mysql_query( $sql, $conn );
					if(! $retval ) 
					{
						$_SESSION["error"]=1;
						die(mysql_error());
					}
					else
					{
						$row = mysql_fetch_array($retval, MYSQL_NUM);
						if (count($row)>1)
						{
							$_SESSION['typ'] = "sladek";
						}
						else
						{
							$_SESSION['typ'] = "uzivatel";
						}
					}
					$_SESSION['login'] = $_POST['login'];
					$_SESSION['heslo'] = $_POST['heslo'];
				}
				else
				{
					echo "wrong username or password";
				}
			}
		}
		unset($_POST['login']);
		unset($_POST['heslo']);
	}
?>
	<form action="<?php $_PHP_SELF ?>" method="POST">
	login<br>
	<input type="text" name="login"><br>
	heslo<br>
	<input type="text" name="heslo"><br>
	<input type="submit" value="prihlasit">
	</form>