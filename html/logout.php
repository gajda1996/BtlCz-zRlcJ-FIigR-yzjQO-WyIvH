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
	session_destroy();
	echo "Prob�hlo odhl�en�";
?>
</article>

</body>
</html>
