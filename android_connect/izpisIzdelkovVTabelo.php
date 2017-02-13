<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");		
	$q = mysql_query("SELECT * FROM izdelki");

	while($izdelek = mysql_fetch_assoc($q))
	{
		$output[] = $izdelek;
	}

	print(json_encode($output));
	mysql_close();
?>