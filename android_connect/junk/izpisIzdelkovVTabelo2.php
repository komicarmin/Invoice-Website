<?php
header('Content-Type: application/json', 'charset: utf-8');
	include "povezava.php";
	mysql_query("SET NAMES 'utf8'");
	
	$q = mysql_query("SELECT * FROM izdelki");

	while($izdelek = mysql_fetch_assoc($q))
	{
		$output[] = $izdelek;
	}
	$json = json_encode($output);		
	echo($json);
	mysql_close();
?>