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
		include '../edit.php';
		$url= "Location: pivo.php?nazev=" . $_SESSION['pivo'][1];
		header($url);
	}
	else if (isset($_POST['pridat']))
	{
		if (is_numeric($_POST["znamka"]) && ($_POST["znamka"]>=0 && $_POST["znamka"]<=10))
		{
			$_POST['addhodnoceni']=1;
			$_POST["ID_pivo"]=$_SESSION['pivo'][0];
			$_POST["login"]=$_SESSION['login'];
			$_POST["datum"]=0;
			$_POST["cas"]=0;
			include '../edit.php';
			$url= "Location: pivo.php?nazev=" . $_SESSION['pivo'][1];
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
		$_POST['getpivo']=1;
		$_POST["nazev"]=$_GET['nazev'];
		include '../edit.php';
		include '../functions.php';
		if ($_SESSION['pivo'][0]!="")
		{
			?>
			<br>
			<label for="name"><b>Pivo</b></t></label>
			<p>Název: <?php echo $_SESSION['pivo'][1]?></p>
			<p>Stupeň EBC: <?php echo $_SESSION['pivo'][2]?></p>
			<p>Styl kvašení: <?php echo $_SESSION['pivo'][3]?></p>
			<p>Typ piva: <?php echo $_SESSION['pivo'][4]?></p>
			<p>Obsah alkoholu: <?php echo $_SESSION['pivo'][5]?> %</p>
			<p>Průměrné hodnocení: <?php echo skore($_SESSION['pivo'][0],$conn);?></p>

			<?php
			unset($_POST['getpivo']);
			$_POST['getslad']=1;
			$_POST["ID_slad"]=$_SESSION['pivo'][6];
			include '../edit.php';

			?>
			<br>
			<label for="name"><b>Slad piva</b></t></label>
			<p>Barva: <?php echo $_SESSION['slad'][1]?></p>
			<p>Původ: <?php echo $_SESSION['slad'][2]?></p>
			<p>Extrakt: <?php echo $_SESSION['slad'][3]?></p>
			<?php

			unset($_POST['getslad']);
			$_POST['getchmel']=1;
			$_POST["ID_chmel"]=$_SESSION['pivo'][7];
			include '../edit.php';

			?>
			<br>
			<label for="name"><b>Chmel piva</b></t></label>
			<p>Původ: <?php echo $_SESSION['chmel'][1]?></p>
			<p>Doba sklizně: <?php echo $_SESSION['chmel'][2]?></p>
			<p>Aroma: <?php echo $_SESSION['chmel'][3]?></p>
			<p>Hořkost: <?php echo $_SESSION['chmel'][4]?></p>
			<p>Podíl alfa kyselin: <?php echo $_SESSION['chmel'][5]?></p>
			<?php

			unset($_POST['getchmel']);
			$_POST['getkvasnice']=1;
			$_POST["ID_kvasnice"]=$_SESSION['pivo'][8];
			include '../edit.php';

			?>
			<br>
			<label for="name"><b>Kvasnice v pivě</b></t></label>
			<p>Skupenství: <?php echo $_SESSION['kvasnice'][1]?></p>
			<p>Typ kvaseni: <?php echo $_SESSION['kvasnice'][2]?></p>
			<br>
			<?php

			unset($_POST['getslad']);
			if (isset($_SESSION['timeout']))
			{
				$_POST['gethodnoceni']=1;
				$_POST["ID_pivo"]=$_SESSION['pivo'][0];
				$_POST["login"]=$_SESSION['login'];
				include '../edit.php';
				unset($_POST['gethodnoceni']);
				if ($_SESSION['hodnoceni'][0]!="")
				{
					?>
					<p>Vaše hodnocení: <?php echo $_SESSION['hodnoceni'][2]?></p>
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
