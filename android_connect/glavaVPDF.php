<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");

	$predracun = $_POST['idpredracunPDF'];
	$q = mysql_query("SELECT users.ime AS u_ime, 
							users.priimek AS u_priimek, 
							podjetja.ime AS p_ime, 
							podjetja.davcna AS p_davcna, 
							podjetja.sedez AS p_sedez, 
							podjetja.posta AS p_posta, 
							podjetja.postnaSt AS p_postnaSt, 
							predracuni.datum_izdelave AS p_datum, 
							predracuni.koda AD p_koda, 
							stranka.ime AS s_ime, 
							stranka.priimek AS s_priimek, 
							stranka.naslov AS s_naslov, 
							stranka.hisnaSt AS s_hisnaSt, 
							stranka.posta AS s_posta, 
							stranka.postnaSt AS s_postnaSt 
					FROM users, stranka, predracuni, podjetja 
					WHERE predracuni.id_user=users.id_user 
					AND predracuni.id_stranka=stranka.id_stranka 
					AND users.id_podjetja=podjetja.id_podjetja 
					AND predracuni.id_predracun='$predracun'");

	while($podatki = mysql_fetch_assoc($q))
	{
		$output[] = $podatki;
	}

	print(json_encode($output));
	mysql_close();
?>