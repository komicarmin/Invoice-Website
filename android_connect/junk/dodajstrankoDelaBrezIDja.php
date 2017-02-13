<?php
header('Content-Type: application/json');
	include 'povezava.php';
	
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$hisnaSt = $_POST['hisnaSt'];
	$posta = $_POST['posta'];
	$postnaSt = $_POST['postnaSt'];
	mysql_query("INSERT INTO stranka VALUES(NULL, '$ime', '$priimek', '$naslov', '$hisnaSt', '$posta', '$postnaSt')");

	mysql_close();
?>