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
	$_POST['getpivovar']=1;
	$_POST["nazev"]=$_GET['nazev'];
	include '../edit.php';
	?>
	<p>N�zev <?php echo $_SESSION['pivovar'][1]?></p>
	<p>M�sto <?php echo $_SESSION['pivovar'][2]?></p>
	<p>Adresa <?php echo $_SESSION['pivovar'][3]?> <?php echo $_SESSION['pivovar'][4]?></p>
	<p>PS� <?php echo $_SESSION['pivovar'][5]?></p>
	<?php
	unset($_POST['getpivo']);
?>
</article>

</body>
</html>
