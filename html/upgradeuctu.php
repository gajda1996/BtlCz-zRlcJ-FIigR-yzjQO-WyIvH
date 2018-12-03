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
if (isset($_POST['upgrade']))
{
	$_POST['addsladek']=1;
	$_POST['login']=$_SESSION['login'];
	include '../edit.php';
	$_SESSION['typ']="sladek";
	echo "Typ vašeho učetu byl změněn na sládka";
}
else if($_SESSION['typ']=="sladek")
{
	echo "Vy už jste sládkem";
}
else
{
?>
<form action="upgradeuctu.php" method="POST">
          <label for="jmeno">Jméno</label>
          <input type="text" name="jmeno">
          <br>
          <label for="prijmeni">Příjmení</label>
          <input type="text" name="prijmeni">
          <br>
          <label for="adr_mesto">Město</label>
          <input type="text" name="adr_mesto">
          <br>
          <label for="adr_ulice">Ulice</label>
          <input type="text" name="adr_ulice">
          <br>
          <label for="adr_cislo_domu">Číslo domu</label>
          <input type="number" name="adr_cislo_domu">
          <br>
          <label for="PSC">PSČ</label>
          <input type="number" name="PSC">
          <br>
          <input type="submit" name="upgrade" value="Změnit typ účtu">
          </div>
        </form>
</article>
<?php
}
?>
</body>
</html>