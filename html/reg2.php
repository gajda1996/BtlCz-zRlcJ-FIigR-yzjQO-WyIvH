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
	if ($_POST["heslo"] === $_POST["heslo2"])
	{
		$_POST["adduzivatel"] = 1;
		include '../edit.php';
		if ($_SESSION["error"] == 1)
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

 <form action="reg2.php" method="POST">
   <label for="name">Login</t></label>
   <input type="text" name="login"<?php echo "value=\"" . $_POST["login"] . "\""?>>
   <br>
   <label for="surname">Heslo</t></label>
   <input type="password" name="heslo">
   <br>
   <label for="surname">Potvrzení hesla</t></label>
   <input type="password" name="heslo2">
   <br>
   <input type="submit" value="Registrovat">
   </div>
 </form>

</article>
</body>
</html>
