<!DOCTYPE html>
<html lang="cs">
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
  include "../initdb.php";
  if (!isset($_SESSION["typ"])){
    echo "K této stránce nemáte dostatečná uživatelská práva.";
    exit();
  }
  if (($_SESSION["typ"] != "admin") && ($_SESSION["typ"] != "sladek")){
    echo "K této stránce nemáte dostatečná uživatelská práva.";
    exit();
  }
  if(!isset($_POST["editace"])){

    echo '<select name="pridat_odebrat" form="upravy">';
    echo '<option value="pridat">Přidat</option>';
    echo '<option value="odebrat">Odebrat</option>';
    echo '</select>';

    echo "<select name=\"editace\" form=\"upravy\">";
    echo "<option value=\"pivo\">Pivo</option>";
    echo "<option value=\"slad\">Slad</option>";
    echo "<option value=\"chmel\">Chmel</option>";
    echo "<option value=\"kvasnice\">Kvasnice</option>";
    if($_SESSION["typ"] == "admin"){
    echo "<option value=\"pivovar\">Pivovar</option>";
    echo "<option value=\"hospoda\">Hospoda</option>";
    echo "<option value=\"uzivatel\">Uživatel</option>";
    echo "<option value=\"sladek\">Sládek</option>";
    }
    echo "</select>";


    echo "<form action=\"sprava.php\" id=\"upravy\" method=\"POST\">";
    echo "<input type=\"submit\" value='Upravit'>";
    echo "</form>";
  }
  else {
    /*echo $_POST["editace"];
    echo $_POST["pridat_odebrat"];*/ /*pro test*/
    if($_POST["pridat_odebrat"] === 'pridat'){
      $_SESSION["pridat_odebrat"] = 'pridat';
      if($_POST["editace"] === 'pivo'){
        $_SESSION['vyber'] = 'pivo';
        $sql = "SELECT * FROM slad ORDER BY barva";
        $result = mysql_query($sql, $conn);
        echo "<label for='id_slad'>Slad </label>";
        echo "<select name='id_slad' form='pridani'>";
        while ($row = mysql_fetch_assoc($result)){
          echo "<option value='" .$row['ID_slad'] . "'>" .
              " barva:" . $row["barva"] .
              " původ:" . $row["puvod"] .
              " extrakt:" . $row["extrakt"] .
              "</option>";
        }
        echo "</select><br>";

        $sql = "SELECT * FROM chmel ORDER BY puvod";
        $result = mysql_query($sql, $conn);
        echo "<label for='id_chmel'>Chmel </label>";
        echo "<select name='id_chmel' form='pridani'>";
        while ($row = mysql_fetch_assoc($result)){
          echo "<option value='" .$row['ID_chmel'] . "'>" .
              " původ:" . $row["puvod"] .
              " doba sklizně:" . $row["doba_sklizne"] .
              " aroma:" . $row["aroma"] .
              " hořkost:" . $row["horkost"] .
              " podíl alfa kyselin:" . $row["podil_alfa_kyselin"] .
              "</option>";
        }
        echo "</select><br>";

        $sql = "SELECT * FROM kvasnice ORDER BY skupenstvi";
        $result = mysql_query($sql, $conn);
        echo "<label for='id_kvasnice'>Kvasnice </label>";
        echo "<select name='id_kvasnice' form='pridani'>";
        while ($row = mysql_fetch_assoc($result)){
          echo "<option value='" .$row['ID_kvasnice'] . "'>" .
              " skupenství:" . $row["skupenstvi"] .
              " typ kvašení:" . $row["typ_kvaseni"] .
              "</option>";
        }
        echo "</select><br>";

        $sql = "SELECT * FROM sladek ORDER BY jmeno";
        $result = mysql_query($sql, $conn);
        echo "<label for='id_sladek'>Sládek </label>";
        echo "<select name='id_sladek' form='pridani'>";
        while ($row = mysql_fetch_assoc($result)){
          echo "<option value='" .$row['ID_sladka'] . "'>" .
              " Jméno: " . $row["jmeno"] .
              " Příjmení: " . $row["prijmeni"] .
              "</option>";
        }
        echo "</select><br>";

        $sql = "SELECT * FROM pivovar ORDER BY nazev";
        $result = mysql_query($sql, $conn);
        echo "<label for='id_pivovar'>Pivovar </label>";
        echo "<select name='id_pivovar' form='pridani'>";
        while ($row = mysql_fetch_assoc($result)){
          echo "<option value='" .$row['ID_pivovar'] . "'>" .
              " Název: " . $row["nazev"] .
              " Město: " . $row["adr_mesto"] .
              "</option>";
        }
        echo "</select><br>";

        echo'

        <form action="sprava2.php" id="pridani" method="POST">
          <label for="nazev">Nazev</label>
          <input type="text" name="nazev" maxlength="25" required>
          <br>
          <label for="stupen_EBC">Stupeň EBC</label>
          <input type="number" name="stupen_EBC" min="0" max="200">
          <br>
          <label for="styl_kvaseni">Styl Kvašení</label>
          <input type="text" name="styl_kvaseni" maxlength="25" required>
          <br>
          <label for="typ_piva">Typ piva</label>
          <input type="text" name="typ_piva" maxlength="25" required>
          <br>
          <label for="obsah_alkoholu">Obsah alkoholu</label>
          <input type="number" name="obsah_alkoholu" min="0" max="100">
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'slad'){
        $_SESSION['vyber'] = 'slad';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="barva">Barva</label>
          <input type="text" name="barva" maxlength="25" required>
          <br>
          <label for="puvod">Původ</label>
          <input type="text" name="puvod" maxlength="25" required>
          <br>
          <label for="extrakt">Extrakt</label>
          <input type="text" name="extrakt" maxlength="25" required>
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'chmel'){
        $_SESSION['vyber'] = 'chmel';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="puvod">Původ</label>
          <input type="text" name="puvod" maxlength="25" required>
          <br>
          <label for="doba_sklizne">Doba sklizně</label>
          <input type="text" name="doba_sklizne" maxlength="25" required>
          <br>
          <label for="aroma">Aroma</label>
          <input type="text" name="aroma" maxlength="25" required>
          <br>
          <label for="horkost">Hořkost</label>
          <input type="number" name="horkost" min="0" required>
          <br>
          <label for="podil_alfa_kyselin">Podíl alfa kyselin</label>
          <input type="number" name="podil_alfa_kyselin" min="0" required>
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'kvasnice'){
        $_SESSION['vyber'] = 'kvasnice';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="skupenstvi">Skupenství</label>
          <input type="text" name="skupenstvi" maxlength="25" required>
          <br>
          <label for="typ_kvaseni">Typ kvašení: </label>
          <input type="radio" name="typ_kvaseni" value="Svrchní">  Svrchní
          <input type="radio" name="typ_kvaseni" value="Spodní">  Spodní
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'pivovar'){
        $_SESSION['vyber'] = 'pivovar';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="nazev">Název</label>
          <input type="text" name="nazev" maxlength="25" required>
          <br>
          <label for="adr_mesto">Město</label>
          <input type="text" name="adr_mesto" maxlength="30" required>
          <br>
          <label for="adr_ulice">Ulice</label>
          <input type="text" name="adr_ulice" maxlength="30" required>
          <br>
          <label for="adr_cislo_domu">Číslo domu</label>
          <input type="number" name="adr_cislo_domu" min="0" required>
          <br>
          <label for="PSC">PSČ</label>
          <input type="number" name="PSC" min="10000" max="99999" required>
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'hospoda'){
        $_SESSION['vyber'] = 'hospoda';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="nazev">Název</label>
          <input type="text" name="nazev" maxlength="25" required>
          <br>
          <label for="adr_mesto">Město</label>
          <input type="text" name="adr_mesto" maxlength="30" required>
          <br>
          <label for="adr_ulice">Ulice</label>
          <input type="text" name="adr_ulice" maxlength="30" required>
          <br>
          <label for="adr_cislo_domu">Číslo domu</label>
          <input type="number" name="adr_cislo_domu" min="0" required>
          <br>
          <label for="PSC">PSČ</label>
          <input type="number" name="PSC" min="10000" max="99999" required>
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'uzivatel'){
        $_SESSION['vyber'] = 'uzivatel';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="login">Login</label>
          <input type="text" name="login" maxlength="25" required>
          <br>
          <label for="heslo">Heslo</label>
          <input type="text" name="heslo" maxlength="25" required>
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
      elseif($_POST["editace"] === 'sladek'){
        $_SESSION['vyber'] = 'sladek';
        echo'
        <form action="sprava2.php" method="POST">
          <label for="login">Login</label>
          <input type="text" name="login" maxlength="25" required>
          <br>
          <label for="jmeno">Jméno</label>
          <input type="text" name="jmeno" maxlength="25" required>
          <br>
          <label for="prijmeni">Příjmení</label>
          <input type="text" name="prijmeni" maxlength="25" required>
          <br>
          <label for="adr_mesto">Město</label>
          <input type="text" name="adr_mesto" maxlength="30" required>
          <br>
          <label for="adr_ulice">Ulice</label>
          <input type="text" name="adr_ulice" maxlength="30" required>
          <br>
          <label for="adr_cislo_domu">Číslo domu</label>
          <input type="number" name="adr_cislo_domu" min="0" required>
          <br>
          <label for="PSC">PSČ</label>
          <input type="number" name="PSC" min="10000" max="99999">
          <br>
          <input type="submit" value="Přidat">
          </div>
        </form>
        ';
      }
    }
    elseif($_POST['pridat_odebrat'] === 'odebrat'){
      $_SESSION["pridat_odebrat"] = 'odebrat';
      $_SESSION["vyber"] = $_POST["editace"];
      if($_POST["editace"] === 'pivo'){
        $sql = "SELECT * FROM pivo ORDER BY nazev";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Název</th>
                  <th>Stupeň EBC</th>
                  <th>Styl kvašení</th>
                  <th>Typ piva</th>
                  <th>Obsah alkoholu</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["nazev"] .
                "</th><th>" . $row["stupen_EBC"] .
                "</th><th>" . $row["styl_kvaseni"] .
                "</th><th>" . $row["typ_piva"] .
                "</th><th>" . $row["obsah_alkoholu"] .
                "</th><th><input type='checkbox' name='pivoid[]' value='" .
            $row["ID_pivo"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'slad'){
        $sql = "SELECT * FROM slad ORDER BY barva";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Barva</th>
                  <th>Původ</th>
                  <th>Extrakt</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["barva"] .
                "</th><th>" . $row["puvod"] .
                "</th><th>" . $row["extrakt"] .
                "</th><th><input type='checkbox' name='sladid[]' value='" .
            $row["ID_slad"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'chmel'){
        $sql = "SELECT * FROM chmel ORDER BY puvod";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Původ</th>
                  <th>Doba sklizně</th>
                  <th>Aroma</th>
                  <th>Hořkost</th>
                  <th>Podíl alfa kyselin</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["puvod"] .
                "</th><th>" . $row["doba_sklizne"] .
                "</th><th>" . $row["aroma"] .
                "</th><th>" . $row["horkost"] .
                "</th><th>" . $row["podil_alfa_kyselin"] .
                "</th><th><input type='checkbox' name='chmelid[]' value='" .
            $row["ID_chmel"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'kvasnice'){
        $sql = "SELECT * FROM kvasnice ORDER BY skupenstvi";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Skupenství</th>
                  <th>Typ kvašení</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["skupenstvi"] .
                "</th><th>" . $row["typ_kvaseni"] .
                "</th><th><input type='checkbox' name='kvasniceid[]' value='" .
            $row["ID_kvasnice"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'pivovar'){
        $sql = "SELECT * FROM pivovar ORDER BY nazev";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Název</th>
                  <th>Město</th>
                  <th>Ulice</th>
                  <th>Číslo domu</th>
                  <th>PSČ</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["nazev"] .
                "</th><th>" . $row["adr_mesto"] .
                "</th><th>" . $row["adr_ulice"] .
                "</th><th>" . $row["adr_cislo_domu"] .
                "</th><th>" . $row["PSC"] .
                "</th><th><input type='checkbox' name='pivovarid[]' value='" .
            $row["ID_pivovar"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'hospoda'){
        $sql = "SELECT * FROM hospoda ORDER BY nazev";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Název</th>
                  <th>Město</th>
                  <th>Ulice</th>
                  <th>Číslo domu</th>
                  <th>PSČ</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["nazev"] .
                "</th><th>" . $row["adr_mesto"] .
                "</th><th>" . $row["adr_ulice"] .
                "</th><th>" . $row["adr_cislo_domu"] .
                "</th><th>" . $row["PSC"] .
                "</th><th><input type='checkbox' name='hospodaid[]' value='" .
            $row["ID_hospoda"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'uzivatel'){
        $sql = "SELECT * FROM uzivatel ORDER BY login";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Login</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["login"] .
                "</th><th><input type='checkbox' name='login[]' value='" .
            $row["login"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
      elseif($_POST["editace"] === 'sladek'){
        $sql = "SELECT * FROM sladek ORDER BY login";
        $retval = mysql_query($sql, $conn);
        echo "<table>
                <tr>
                  <th>Login</th>
                  <th>Jméno</th>
                  <th>Příjmení</th>
                  <th>Město</th>
                  <th>Ulice</th>
                  <th>Číslo domu</th>
                  <th>PSČ</th>
                  <th>Smazat?</th>
                </tr>";

        if (mysql_num_rows($retval) > 0){
          while ($row = mysql_fetch_assoc($retval)){
            echo "<tr><th>" . $row["login"] .
                "</th><th>" . $row["jmeno"] .
                "</th><th>" . $row["prijmeni"] .
                "</th><th>" . $row["adr_mesto"] .
                "</th><th>" . $row["adr_ulice"] .
                "</th><th>" . $row["adr_cislo_domu"] .
                "</th><th>" . $row["PSC"] .
                "</th><th><input type='checkbox' name='sladekid[]' value='" .
            $row["ID_sladka"] . "' form='smazat'>" . "</th></tr>";
          }
          echo "</table>";
          echo "<form action=\"sprava2.php\" id=\"smazat\" method=\"POST\">";
          echo "<input type=\"submit\" value='Smazat'>";
          echo "</form>";
        }
      }
    }
  }
?>
</article>

</body>
</html>
