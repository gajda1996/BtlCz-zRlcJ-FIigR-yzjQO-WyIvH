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
	if (isset($_POST['smazat']))
	{
		$_POST['deletehodnocenihospoda']=1;
		$_POST["ID_hospoda"]=$_SESSION['hospoda'][0];
		$_POST["login"]=$_SESSION['login'];
		include '../edit.php';
		$url= "Location: hospoda.php?nazev=" . $_SESSION['hospoda'][1];
		header($url);
	}
	else if (isset($_POST['pridat']))
	{
		if (is_numeric($_POST["znamka"]) && ($_POST["znamka"]>=0 && $_POST["znamka"]<=10))
		{
			$_POST['addhodnocenihospoda']=1;
			$_POST["ID_hospoda"]=$_SESSION['hospoda'][0];
			$_POST["login"]=$_SESSION['login'];
			$_POST["datum"]=0;
			$_POST["cas"]=0;
			include '../edit.php';
			$url= "Location: hospoda.php?nazev=" . $_SESSION['hospoda'][1];
			unset($_POST['pridat']);
			header($url);
		}
		else
		{
			echo "Špatný formát dat";
		}
	}
	else
	{
		$_POST['gethospoda']=1;
		$_POST["nazev"]=$_GET['nazev'];
		include '../edit.php';
		include '../functions.php';
		if ($_SESSION['hospoda'][0]!="")
		{
			?>
			<p>Název: <?php echo $_SESSION['hospoda'][1]?></p>
			<p>Město: <?php echo $_SESSION['hospoda'][2]?></p>
			<p>Adresa: <?php echo $_SESSION['hospoda'][3]?> <?php echo $_SESSION['hospoda'][4]?></p>
			<p>PSČ: <?php echo $_SESSION['hospoda'][5]?></p>
			<p>Průměrné hodnocení: <?php echo skorehospoda($_SESSION['hospoda'][0],$conn);?></p>

			<?php
			unset($_POST['gethospoda']);
			if (isset($_SESSION['timeout']))
				{
					$_POST['gethodnocenihospoda']=1;
					$_POST["ID_hospoda"]=$_SESSION['hospoda'][0];
					$_POST["login"]=$_SESSION['login'];
					include '../edit.php';
					unset($_POST['gethodnocenihospoda']);
					if ($_SESSION['hodnocenihospoda'][0]!="")
					{
						?>
						<p>Vaše hodnocení: <?php echo $_SESSION['hodnocenihospoda'][2]?></p>
						<form action="hospoda.php" method="POST">
							<input type="submit" name="smazat" value="Smazat hodnocení">
							</div>
						</form>
						<?php
					}
					else
					{
						?>
						<br>
						<form action="hospoda.php" method="POST">
							<label for="name">Znamka 0-10</t></label>
							<input type="text" name="znamka">
							<br>
							<input type="submit" name="pridat" value="Přidat hodnocení">
							</div>
						</form>
						<?php
					}
				}
		}
		else
		{
			echo "Hospoda nebyla nalezena";
		}
	}
?>
</article>

</body>
</html>
