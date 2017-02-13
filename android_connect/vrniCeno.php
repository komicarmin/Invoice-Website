<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");

	$naziv = $_POST['element'];
	$q = mysql_query("SELECT cena FROM izdelki WHERE naziv='$naziv'");

	while($cena = mysql_fetch_assoc($q))
	{
		$output[] = $cena;
	}

	print(json_encode($output));
	mysql_close();
?>