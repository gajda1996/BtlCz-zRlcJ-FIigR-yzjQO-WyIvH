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
	$_POST['getpivo']=1;
	$_POST["nazev"]=$_GET['nazev'];
	include '../edit.php';
	include '../functions.php';
	?>
	<p>Název <?php echo $_SESSION['pivo'][1]?></p>
	<p>Stupeň EBC <?php echo $_SESSION['pivo'][2]?></p>
	<p>Styl kvašení <?php echo $_SESSION['pivo'][3]?></p>
	<p>Typ piva <?php echo $_SESSION['pivo'][4]?></p>
	<p>Obsah alkoholu <?php echo $_SESSION['pivo'][5]?> %</p>
	<p>Průměrné hodnocení <?php echo skore($_SESSION['pivo'][0],$conn);?></p>
	<?php
	unset($_POST['getpivo']);
?>
</article>

</body>
</html>
