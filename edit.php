<?php

    if(isset($_POST['addpivo']))
	{
		$nazev = $_POST["nazev"];
		$stupen_EBC = $_POST["stupen_EBC"];
		$styl_kvaseni = $_POST["styl_kvaseni"];
		$typ_piva = $_POST["typ_piva"];
		$obsah_alkoholu = $_POST["obsah_alkoholu"];
		$sql = "INSERT INTO pivo(nazev, stupen_EBC, styl_kvaseni, typ_piva, obsah_alkoholu) VALUES('$nazev', '$stupen_EBC','$styl_kvaseni', '$typ_piva', '$obsah_alkoholu')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }
		
	if(isset($_POST['getpivo']))
	{
		$nazev = $_POST["nazev"];
		$sql = "SELECT * FROM pivo WHERE nazev = '$nazev'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['pivo'] = $row;
		}
    }

	if(isset($_POST['deletepivo']))
	{
		$nazev = $_POST["nazev"];
		$sql = "DELETE FROM pivo WHERE nazev = '$nazev'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addslad']))
	{
		$barva = $_POST["barva"];
		$puvod = $_POST["puvod"];
		$extrakt = $_POST["extrakt"];
		$sql = "INSERT INTO slad (barva, puvod, extrakt) VALUES('$barva', '$puvod', '$extrakt')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['getslad']))
	{
		$ID_slad = $_POST["ID_slad"];
		$sql = "SELECT * FROM slad WHERE ID_slad = '$ID_slad'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['slad'] = $row;
		}
    }

	if(isset($_POST['deletepivo']))
	{
		$ID_slad = $_POST["ID_slad"];
		$sql = "DELETE FROM slad WHERE ID_slad = '$ID_slad'";       
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addchmel']))
	{
		$puvod = $_POST["puvod"];
		$doba_sklizne = $_POST["doba_sklizne"];
		$aroma = $_POST["aroma"];
		$horkost = $_POST["horkost"];
		$podil_alfa_kyselin = $_POST["podil_alfa_kyselin"];
		$sql = "INSERT INTO chmel (puvod, doba_sklizne, aroma, horkost, podil_alfa_kyselin) VALUES('$puvod', '$doba_sklizne', '$aroma', '$horkost' ,'$podil_alfa_kyselin')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['getchmel']))
	{
		$ID_chmel = $_POST["ID_chmel"];
		$sql = "SELECT * FROM chmel WHERE ID_chmel = '$ID_chmel'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['chmel'] = $row;
		}
    }

	if(isset($_POST['deletechmel']))
	{
		$ID_chmel = $_POST["ID_chmel"];
		$sql = "DELETE FROM chmel WHERE ID_chmel = '$ID_chmel'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addkvasnice']))
	{
		$skupenstvi = $_POST["skupenstvi"];
		$typ_kvaseni = $_POST["typ_kvaseni"];
		$sql = "INSERT INTO kvasnice (skupenstvi, typ_kvaseni) VALUES('$skupenstvi', '$typ_kvaseni')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['getkvasnice']))
	{
		$ID_kvasnice = $_POST["ID_kvasnice"];
		$sql = "SELECT * FROM kvasnice WHERE ID_kvasnice = '$ID_kvasnice'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['kvasnice'] = $row;
		}
    }
	
	if(isset($_POST['deletekvasnice']))
	{
		$ID_kvasnice = $_POST["ID_kvasnice"];
		$sql = "DELETE FROM kvasnice WHERE ID_kvasnice = '$ID_kvasnice'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addzaznam_vypiteho_piva']))
	{
		$ID_pivo = $_POST["ID_pivo"];
		$login = $_POST["login"];
		$datum = $_POST["datum"];
		$cas = $_POST["cas"];
		$sql = "INSERT INTO zaznam_vypiteho_piva (ID_pivo, login, datum, cas) VALUES('$ID_pivo', '$login' , '$datum', '$cas')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['getzaznam_vypiteho_piva']))
	{
		$ID_pivo = $_POST["ID_pivo"];
		$login = $_POST["login"];
		$sql = "SELECT * FROM zaznam_vypiteho_piva WHERE ID_pivo = '$ID_pivo' AND login = '$login'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['zaznam_vypiteho_piva'] = $row;
		}
    }

	if(isset($_POST['deletezaznam_vypiteho_piva']))
	{
		$ID_pivo = $_POST["ID_pivo"];
		$login = $_POST["login"];
		$sql = "DELETE FROM zaznam_vypiteho_piva WHERE ID_pivo = '$ID_pivo' AND login = '$login'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addhodnoceni']))
	{
		$ID_pivo = $_POST["ID_pivo"];
		$login = $_POST["login"];
		$ID_hospoda = $_POST["ID_hospoda"];
		$znamka = $_POST["znamka"];
		$datum = $_POST["datum"];
		$cas = $_POST["cas"];
		$sql = "INSERT INTO hodnoceni (ID_pivo, login, ID_hospoda, znamka, datum, cas) VALUES('$ID_pivo', '$login', '$ID_hospoda', '$znamka', '$datum', '$cas')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['gethodnoceni']))
	{
		$ID_pivo = $_POST["ID_pivo"];
		$login = $_POST["login"];
		$ID_hospoda = $_POST["ID_hospoda"];
		$sql = "SELECT * FROM hodnoceni WHERE ID_pivo = '$ID_pivo' AND login = '$login' AND ID_hospoda = '$ID_hospoda'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['hodnoceni'] = $row;
		}
    }

	if(isset($_POST['deletehodnoceni']))
	{
		$ID_pivo = $_POST["ID_pivo"];
		$login = $_POST["login"];
		$ID_hospoda = $_POST["ID_hospoda"];
		$sql = "DELETE FROM hodnoceni WHERE ID_pivo = '$ID_pivo' AND login = '$login' AND ID_hospoda = '$ID_hospoda'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addhospoda']))
	{
		$nazev = $_POST["nazev"];
		$adr_mesto = $_POST["adr_mesto"];
		$adr_ulice = $_POST["adr_ulice"];
		$adr_cislo_domu = $_POST["adr_cislo_domu"];
		$PSC = $_POST["PSC"];
		$sql = "INSERT INTO pivovar (nazev, adr_mesto, adr_ulice, adr_cislo_domu ,PSC) VALUES('$nazev', '$adr_mesto', '$adr_ulice', '$adr_cislo_domu', '$PSC')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['gethospoda']))
	{
		$nazev = $_POST["nazev"];
		$sql = "SELECT * FROM hospoda WHERE nazev = '$nazev'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['hospoda'] = $row;
		}
    }

	if(isset($_POST['deletehospoda']))
	{
		$nazev = $_POST["nazev"];
		$sql = "DELETE FROM hospoda WHERE nazev = '$nazev'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['addpivovar']))
	{
		$nazev = $_POST["nazev"];
		$adr_mesto = $_POST["adr_mesto"];
		$adr_ulice = $_POST["adr_ulice"];
		$adr_cislo_domu = $_POST["adr_cislo_domu"];
		$PSC = $_POST["PSC"];
		$sql = "INSERT INTO pivovar (nazev, adr_mesto, adr_ulice, adr_cislo_domu ,PSC) VALUES('$nazev', '$adr_mesto', '$adr_ulice', '$adr_cislo_domu', '$PSC')";   
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['getpivovar']))
	{
		$nazev = $_POST["nazev"];
		$sql = "SELECT * FROM pivovar WHERE nazev = '$nazev'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
		else
		{
			$row = mysql_fetch_array($retval, MYSQL_NUM);
			$_SESSION['pivovar'] = $row;
		}
    }

	if(isset($_POST['deletepivovar']))
	{
		$nazev = $_POST["nazev"];
		$sql = "DELETE FROM pivovar WHERE nazev = '$nazev'";        
		$retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['adduzivatel']))
	{
		$login = $_POST["login"];
		$heslo = $_POST["heslo"];
		$sql = "INSERT INTO uzivatel(login, heslo) VALUES ('$login', '$heslo')";
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }

	if(isset($_POST['deleteuzivatel']))
	{
		$login = $_POST["login"];
		$heslo = $_POST["heslo"];
		$sql = "DELETE FROM uzivatel WHERE login = '$login' AND heslo = '$heslo'";  
        $retval = mysql_query( $sql, $conn );
        if(! $retval ) 
		{
			die(mysql_error());
        }
    }
?>