<?php
session_start();
$_SESSION["error"] = 0;
include "../initdb.php";
if($_SESSION["pridat_odebrat"] === 'pridat'){
	if($_SESSION['vyber'] === 'pivo'){
		$_POST["addpivo"] = 1;
	}
	elseif($_SESSION['vyber'] === 'slad'){
		$_POST["addslad"] = 1;
	}
	elseif($_SESSION['vyber'] === 'chmel'){
		$_POST["addchmel"] = 1;
	}
	elseif($_SESSION['vyber'] === 'kvasnice'){
		$_POST["addkvasnice"] = 1;
	}
	elseif($_SESSION['vyber'] === 'pivovar'){
		$_POST["addpivovar"] = 1;
	}
	elseif($_SESSION['vyber'] === 'hospoda'){
		$_POST["addhospoda"] = 1;
	}
	elseif($_SESSION['vyber'] === 'uzivatel'){
		$_POST["adduzivatel"] = 1;
	}
	elseif($_SESSION['vyber'] === 'sladek'){
		$_POST["addsladek"] = 1;
	}
	else{
	$_SESSION['error'] = 2;
	}
}
elseif($_SESSION["pridat_odebrat"] === 'odebrat'){
  if($_SESSION["vyber"] === 'pivo'){
  	$idecka = $_POST["pivoid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM pivo WHERE ID_pivo = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'slad'){
  	$idecka = $_POST["sladid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM slad WHERE ID_slad = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'chmel'){
  	$idecka = $_POST["chmelid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM chmel WHERE ID_chmel = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'kvasnice'){
  	$idecka = $_POST["kvasniceid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM kvasnice WHERE ID_kvasnice = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'pivovar'){
  	$idecka = $_POST["pivovarid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM pivovar WHERE ID_pivovar = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'hospoda'){
  	$idecka = $_POST["hospodaid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM hospoda WHERE ID_hospoda = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'uzivatel'){
  	$idecka = $_POST["login"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM uzivatel WHERE login = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  elseif($_SESSION["vyber"] === 'sladek'){
  	$idecka = $_POST["sladekid"];
  	foreach ($idecka as $id){
  		$sql = "DELETE FROM sladek WHERE ID_sladka = '$id'";
  		$retval = mysql_query($sql, $conn);
  		if(!$retval){
  			$_SESSION["error"] = 2;
  		}
  	}
  }
  else{
    $_SESSION["error"] = 2;
  }
}
include "../edit.php";
unset($_SESSION['vyber']);
unset($_SESSION['pridat_odebrat']);
header("Location: sprava.php");


?>
