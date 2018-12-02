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
	<form action="search.php" method="POST">
		<label for="name">Název</t></label>
		<input type="text" name="nazev">
		<br>
		<input type="radio" name="volba" value="pivo" checked> Pivo<br>
		<input type="radio" name="volba" value="pivovar"> Pivovar<br>
		<input type="radio" name="volba" value="hospoda"> Hospoda<br>
		<input type="submit" value="Hledat">
		</div>
	</form>
</article>

</body>
</html>
<?php
	if (isset($_POST["volba"]))
	{
		if ($_POST["volba"]=="hospoda")
		{
			$url= "Location: hospoda.php?nazev=" . $_POST["nazev"];
			header($url);
		}
		else if ($_POST["volba"]=="pivo")
		{
			$url= "Location: pivo.php?nazev=" . $_POST["nazev"];
			header($url);
		}
		else
		{
			$url= "Location: pivovar.php?nazev=" . $_POST["nazev"];
			header($url);
		}
	}
?>