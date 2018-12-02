 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Pivní databáze</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>


<div class="jumbotron text-center">
	<h1>Pivní databáze</h1>
	<p>Pro všechny fanoušky piva.</p>
</div>
<nav class="navbar navbar-expand-sm bg-light">

  <!-- Links -->
  <ul class="navbar-nav">
  	<li class="nav-item">
      <a class="nav-link" href="domu.php">Domů</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="seznampiv.php">Seznam piv</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Nejlepší pijani</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="registrace.php">Registrace</a>
    </li>
  </ul>

</nav>

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
