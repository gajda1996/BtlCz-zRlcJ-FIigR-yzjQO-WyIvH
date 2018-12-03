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
	$_SESSION["error"] = 0;
	if ($_POST["heslo"] === $_POST["heslo2"])
	{
		$_POST["adduzivatel"] = 1;
		include '../edit.php';
		if (($_SESSION["error"]) != 0)
		{
			echo "Uživatel s tímto loginem již existuje. Registrace byla neúspěšná.";
		}
		else
		{
			echo "Registrace byla úspěšná";
			$_SESSION["login"]=$_POST["login"];
			$_SESSION["heslo"]=$_POST["heslo"];
			$_SESSION["typ"]="uzivatel";
			$_SESSION['timeout'] = time();
		}
	}
	else 
	{
		echo "Hesla se neshodují";
	}
 ?>
</article>
</body>
</html>
