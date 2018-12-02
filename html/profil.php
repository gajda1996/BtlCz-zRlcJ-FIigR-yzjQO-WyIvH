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
	if (isset($_SESSION['login']) && isset($_SESSION['heslo']))
	{
	
	}
	else
	{
		header("Location: domu.php");
	}
?>
</article>

</body>
</html>