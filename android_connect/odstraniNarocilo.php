<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");

	$id = $_POST['idNarocilo'];
	mysql_query("DELETE FROM narocilo WHERE id_narocilo='$id'");
	mysql_close();
?>