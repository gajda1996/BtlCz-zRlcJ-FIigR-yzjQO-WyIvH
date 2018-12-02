 <!DOCTYPE html>
<html lang="en">
<head>
<?php
include 'head.php';
?>
</head>
<body>

<?php
include 'menu.php';
?>

<article>
<?php
	include '../login.php';
	if (isset($_SESSION["typ"]) && isset($_SESSION["login"]) && isset($_SESSION["heslo"]))
	{
		if ($_SESSION["typ"]=="admin")
		{
			echo "V�tejte administr�tore";
		}
		else if ($_SESSION["typ"]=="sladek")
		{
			echo "V�tejte sl�dku " . $_SESSION["login"];
		}
		else
		{
			echo "V�tejte u�ivateli " . $_SESSION["login"];
		}
		$_SESSION['timeout'] = time();
	}
?>
</article>

</body>
</html>
