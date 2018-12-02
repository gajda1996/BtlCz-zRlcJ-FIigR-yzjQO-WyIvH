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
	$_POST['getallpivovar']=1;
	$index=0;
	include '../edit.php';
	foreach($_SESSION['allpivovar'] as $row)
	{
		?>
			<a href="pivovar.php?nazev=<?php echo $row[0]; ?>"><?php echo $row[0]; ?></a>
			<br>
		<?php
		$index=$index+1;
	}
	unset($_POST['getallpivovar']);
?>
</article>

</body>
</html>
