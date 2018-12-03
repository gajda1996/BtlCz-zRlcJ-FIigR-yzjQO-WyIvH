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
<form action="upgradeuctu.php" method="POST">
		<input type="submit" value="Staňte se sládkem">
		</div>
</form> 
<br>
<br>
<?php
	if (isset($_SESSION['login']) && isset($_SESSION['heslo']))
	{
		if (isset($_POST['stareheslo']))
		{
			if ($_SESSION['heslo']!=$_POST['stareheslo'])
			{
				echo "Špatné stávající heslo";
			}
			else
			{
				if ($_POST['potvrdheslo']!=$_POST['heslo'])
				{
					echo "Nové heslo a jeho potvrzení se neshodují";
				}
				else
				{
					$_POST['updateuzivatel']=1;
					$_POST['login']=$_SESSION['login'];
					include '../edit.php';
					$_SESSION['heslo']=$_POST['login'];
					echo "Heslo bylo úspěšně změněno";
				}
			}
		}
	?>
		<form action="profil.php" method="POST">
		<label for="stareheslo">Původní heslo</t></label>
		<input type="password" name="stareheslo">
		<br>
		<label for="heslo"></t>Nové heslo</label>
		<input type="password" name="heslo">
		<br>
		<label for="potvrdheslo">Potvrzení nového hesla</t></label>
		<input type="password" name="potvrdheslo">
		<br>
		<input type="submit" value="Změna hesla">
		</div>
	  </form>
	<?php
	}
	else
	{
		header("Location: domu.php");
	}
?>
</article>

</body>
</html>