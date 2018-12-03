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
  <form action="reg2.php" method="POST">
    <label for="name">Login</t></label>
    <input type="text" name="login" maxlength="25" required>
    <br>
    <label for="surname">Heslo</t></label>
    <input type="password" name="heslo" maxlength="25" required>
    <br>
    <label for="surname">Potvrzení hesla</t></label>
    <input type="password" name="heslo2" maxlength="25" required>
    <br>
    <input type="submit" value="Registrovat">
    </div>
  </form>

</article>
</body>
</html>
