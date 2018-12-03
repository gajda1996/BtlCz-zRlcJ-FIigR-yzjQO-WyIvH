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
			echo "Vítejte administrátore";
		}
		else if ($_SESSION["typ"]=="sladek")
		{
			echo "Vítejte sládku " . $_SESSION["login"];
		}
		else
		{
			echo "Vítejte uživateli " . $_SESSION["login"];
		}
		$_SESSION['timeout'] = time();
	}
?>
</article>

</body>
</html>
