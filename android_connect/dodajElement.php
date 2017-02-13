<?php
header('Content-Type: application/json');
	include 'povezava.php';
	
	$id_predracun = $_POST['id_predracun'];
	$element = $_POST['element'];
	$kolicina = $_POST['kolicina'];
	$cena = $_POST['cena'];
	
	$elementQ = mysql_query("SELECT * FROM izdelki WHERE naziv='$element'");
	$izdelek = mysql_fetch_assoc($elementQ);
	$id_izdelka = $izdelek['id_izdelek'];
	
	if($elementQ)
	{
		$narociloQ = mysql_query("INSERT INTO narocilo VALUES(NULL, '$id_predracun', '$id_izdelka', '$kolicina')");
	}
	else
	{
		$novIzdelek = mysql_query("INSERT INTO izdeki VALUES(NULL, '$element', '$cena', '', 'da')");
		$narociloQ = mysql_query("INSERT INTO narocilo VALUES(NULL, '$id_predracun', '$id_izdelka', '$kolicina')");
	}
	
	mysql_close();
?>