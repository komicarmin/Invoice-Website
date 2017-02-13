<?php
	ini_set('display_errors', '1');
	error_reporting(E_ALL);

	$povezava = mysql_connect('localhost', 'r4c_armin', 'potatojuggler');
	if(!$povezava)
	{
		die('Not connected' . mysql_error());
	}
	mysql_select_db("r4c_armin");
?>