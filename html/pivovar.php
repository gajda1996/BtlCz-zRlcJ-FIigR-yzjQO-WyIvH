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
	if ($_SESSION['pivovar'][0]!="")
	{
		?>
		<p>Název: <?php echo $_SESSION['pivovar'][1]?></p>
		<p>Mìsto: <?php echo $_SESSION['pivovar'][2]?></p>
		<p>Adresa: <?php echo $_SESSION['pivovar'][3]?> <?php echo $_SESSION['pivovar'][4]?></p>
		<p>PSÈ: <?php echo $_SESSION['pivovar'][5]?></p>
		<br>
		<label for="name"><b>Pivovar vaří následující piva</b></t></label>
		<?php
		unset($_POST['getpivo']);
	}
	else
	{
		echo "Pivovar nebyl nalezen";
	}
		$sql = "SELECT * FROM pivo ORDER BY nazev";
        $result = mysql_query($sql, $conn);
        while ($row = mysql_fetch_assoc($result))
		{
			if ($row['ID_pivovar']==$_SESSION['pivovar'][0])
			{
				?>
				<a href="pivo.php?nazev=<?php echo $row['nazev']; ?>"><?php echo $row['nazev']; ?></a>
				<br>
				<?php
			}
        }
?>
</article>

</body>
</html>
