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
	if (isset($_SESSION["timeout"]))
	{
		session_destroy();
		echo "Probìhlo odhlášení";
	}
	else
	{
		echo "Nejste pøihlášení";
	}
?>
</article>

</body>
</html>
