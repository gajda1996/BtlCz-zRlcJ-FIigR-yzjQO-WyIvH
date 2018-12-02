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
		$_POST['deletehodnoceni']=1;
		$_POST["ID_pivo"]=$_SESSION['hodnoceni'][0];
		$_POST["login"]=$_SESSION['login'];
		$_POST["ID_hospoda"]=$_SESSION['hodnoceni'][2];
		include '../edit.php';
		$url= "Location: pivo.php?nazev=" . $_SESSION['pivo'][1];
		header($url);
	}
	else if (isset($_POST['pridat']))
	{
		$_POST['addhodnoceni']=1;
		$_POST["ID_pivo"]=$_SESSION['pivo'][0];
		$_POST["login"]=$_SESSION['login'];
		$_POST["ID_hospoda"]=1;
		$_POST["datum"]=0;
		$_POST["cas"]=0;
		include '../edit.php';
		$url= "Location: pivo.php?nazev=" . $_SESSION['pivo'][1];
		header($url);
	}
	else
	{
		$_POST['getpivo']=1;
		$_POST["nazev"]=$_GET['nazev'];
		include '../edit.php';
		include '../functions.php';
		if ($_SESSION['pivo'][0]!="")
		{
			?>
			<p>Název: <?php echo $_SESSION['pivo'][1]?></p>
			<p>Stupeň EBC: <?php echo $_SESSION['pivo'][2]?></p>
			<p>Styl kvašení: <?php echo $_SESSION['pivo'][3]?></p>
			<p>Typ piva: <?php echo $_SESSION['pivo'][4]?></p>
			<p>Obsah alkoholu: <?php echo $_SESSION['pivo'][5]?> %</p>
			<p>Průměrné hodnocení: <?php echo skore($_SESSION['pivo'][0],$conn);?></p>

			<?php
			unset($_POST['getpivo']);
			$_POST['gethodnoceni']=1;
			$_POST["ID_pivo"]=$_SESSION['pivo'][0];
			$_POST["login"]=$_SESSION['login'];
			include '../edit.php';
			unset($_POST['gethodnoceni']);
			if ($_SESSION['hodnoceni'][0]!="")
			{
				?>
				<p>Vaše hodnocení: <?php echo $_SESSION['hodnoceni'][3]?></p>
				<form action="pivo.php" method="POST">
					<input type="submit" name="smazat" value="Smazat hodnocení">
					</div>
				</form>
				<?php
			}
			else
			{
				?>
				<br>
				<form action="pivo.php" method="POST">
					<label for="name">Znamka 0-10</t></label>
					<input type="text" name="znamka">
					<br>
					<input type="submit" name="pridat" value="Přidat hodnocení">
					</div>
				</form>
				<?php
			}
		}
		else
		{
			echo "Pivo nebylo nalezeno";
		}
	}
	?>
</article>

</body>
</html>
