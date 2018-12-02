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
	if (isset($_POST['deletepivo']))
	{
		include '../edit.php';
		unset($_POST['deletepivo']);
	}
?>
	<form action="delete.php" method="POST">
	<select multiple name="nazev"> 
	<?php
	$_POST['getallpivo']=1;
	$index=0;
	include '../edit.php';
	foreach($_SESSION['allpivo'] as $row)
	{
	?>
		<option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option> 
	<?php
		$index=$index+1;
	}
	unset($_POST['getallpivo']);
	?>
	</select>
	<input type="submit" name="deletepivo" value="Smazat pivo">
	</form>
</article>

</body>
</html>
