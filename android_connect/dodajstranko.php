<?php
header('Content-Type: application/json', 'charset: utf-8');
	include ('povezava.php');
	
	$ime = $_POST['ime'];
	$priimek = $_POST['priimek'];
	$naslov = $_POST['naslov'];
	$hisnaSt = $_POST['hisnaSt'];
	$posta = $_POST['posta'];
	$postnaSt = $_POST['postnaSt'];
	$idStr = 0;
	$q = mysql_query("SELECT * FROM stranka WHERE ime='$ime' AND priimek='$priimek' AND naslov='$naslov'");


	if(mysql_num_rows($q) == 0)
	{
	mysql_query("INSERT INTO stranka VALUES(NULL, '$ime', '$priimek', '$naslov', '$hisnaSt', '$posta', '$postnaSt')");
	}
	$qId = mysql_query("SELECT id_stranka FROM stranka WHERE ime='$ime' AND priimek='$priimek' AND naslov='$naslov'");

	while($id=mysql_fetch_assoc($qId))
	{
		$output[] = $id;
	}
	print(json_encode($output));
	mysql_close();
?>