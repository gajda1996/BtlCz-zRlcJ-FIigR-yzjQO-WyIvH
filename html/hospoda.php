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
	$_POST['gethospoda']=1;
	$_POST["nazev"]=$_GET['nazev'];
	include '../edit.php';
	?>
	<p>Název <?php echo $_SESSION['hospoda'][1]?></p>
	<p>Město <?php echo $_SESSION['hospoda'][2]?></p>
	<p>Adresa <?php echo $_SESSION['hospoda'][3]?> <?php echo $_SESSION['hospoda'][4]?></p>
	<p>PSČ <?php echo $_SESSION['hospoda'][5]?></p>
	<?php
	unset($_POST['gethospoda']);
?>
</article>

</body>
</html>
