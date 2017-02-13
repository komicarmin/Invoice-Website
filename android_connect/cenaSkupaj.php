<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");

	$predracun = $_POST['idpredracunCena'];
	$skupnaCena = 0;
	$q = mysql_query("SELECT SUM(izdelki.cena*narocilo.kolicina)
						AS skupaj_narocilo FROM izdelki, narocilo, predracuni 
						WHERE narocilo.id_predracun = predracuni.id_predracun 
						AND izdelki.id_izdelek = narocilo.id_izdelka 
						AND narocilo.id_predracun = '$predracun'");

	while($narocilo = mysql_fetch_assoc($q))
	{
		$output[] = $narocilo;
	}

	print(json_encode($output));

	mysql_close();
?>