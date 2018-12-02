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
	$_POST['getpivo']=1;
	$_POST["nazev"]=$_GET['nazev'];
	include '../edit.php';
	include '../functions.php';
	?>
	<p>Název <?php echo $_SESSION['pivo'][1]?></p>
	<p>Stupeň EBC <?php echo $_SESSION['pivo'][2]?></p>
	<p>Styl kvašení <?php echo $_SESSION['pivo'][3]?></p>
	<p>Typ piva <?php echo $_SESSION['pivo'][4]?></p>
	<p>Obsah alkoholu <?php echo $_SESSION['pivo'][5]?></p>
	<p>Průměrné hodnocení <?php echo skore($_SESSION['pivo'][0],$conn);?></p>
	<?php
	unset($_POST['getpivo']);
?>
</article>

</body>
</html>
