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
		echo "Prob�hlo odhl�en�";
	}
	else
	{
		echo "Nejste p�ihl�en�";
	}
?>
</article>

</body>
</html>
