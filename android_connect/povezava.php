<?php
	$dbhost ="localhost";
	$dbuser = "r4c_armin";
	$dbpass = "potatojuggler";
	$dbdb = "r4c_armin";
	ini_set('display_errors', '1');
	//error_reporting(E_ALL);
	
	$connect = mysql_connect($db_host, $dbuser, $dbpass) or die("connection error");
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($dbdb);
?>