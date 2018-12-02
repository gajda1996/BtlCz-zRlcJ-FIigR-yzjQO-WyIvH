
<div class="jumbotron text-center">
	<h1>Pivní databáze</h1>
	<p>Pro všechny fanoušky piva.</p>
	<?php
		session_start();
		if (isset($_SESSION["timeout"]))
		{
			if ($_SESSION["typ"]=="admin")
			{
				echo "Přihlášen administrátor";
			}
			else if ($_SESSION["typ"]=="sladek")
			{
				echo "Přihlášen sládek " . $_SESSION["login"];
			}
			else
			{
				echo "Přihlášen uživatel " . $_SESSION["login"];
			}
			$timelimit=600;
			$sessionTTL = time() - $_SESSION['timeout'];
			if ($sessionTTL > $timelimit) 
			{
				session_destroy();
				echo "logout";
			}
			echo "Zbývá " . ($timelimit - $sessionTTL) . " s";
		}
	?>
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
      <a class="nav-link" href="seznampivovaru.php">Seznam pivovarů</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Nejlepší pijani</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="registrace.php">Registrace</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="logout.php">Odhlásit</a>
    </li>
  </ul>

</nav>
