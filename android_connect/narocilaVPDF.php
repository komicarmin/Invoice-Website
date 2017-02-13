<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");

	$predracun = $_POST['idpredracunPDF'];
	$q = mysql_query("SELECT izdelki.naziv, izdelki.cena, izdelki.enota, narocilo.kolicina 
					FROM narocilo, izdelki 
					WHERE narocilo.id_izdelka=izdelki.id_izdelek AND narocilo.id_predracun='$predracun'");

	while($narocilo = mysql_fetch_assoc($q))
	{
		$output[] = $narocilo;
	}

	print(json_encode($output));
	mysql_close();
?>