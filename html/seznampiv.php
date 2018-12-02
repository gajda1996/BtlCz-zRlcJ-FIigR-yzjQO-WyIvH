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
	$_POST['getallpivo']=1;
	$index=0;
	include '../edit.php';
	foreach($_SESSION['allpivo'] as $row)
	{
		?>
			<a href="pivo.php?nazev=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a>
			<br>
		<?php
		$index=$index+1;
	}
	unset($_POST['getallpivo']);
?>
</article>

</body>
</html>
