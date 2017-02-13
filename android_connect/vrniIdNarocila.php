<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");

	$idPredracun = $_POST['idpredracunNarocilo'];
	$naziv = $_POST['nazivNarocilo'];
	$kolicina = $_POST['kolicinaNarocilo'];

	$qIdIzdelka = mysql_query("SELECT id_izdelek FROM izdelki WHERE naziv='$naziv'");
	$idIzdelka = mysql_fetch_assoc($qIdIzdelka);
	$id = $idIzdelka['id_izdelek'];

	$q = mysql_query("SELECT id_narocilo FROM narocilo WHERE id_predracun='$idPredracun' AND id_izdelka='$id' AND kolicina='$kolicina'");

	while($cena = mysql_fetch_assoc($q))
	{
		$output[] = $cena;
	}

	print(json_encode($output));
	mysql_close();
?>