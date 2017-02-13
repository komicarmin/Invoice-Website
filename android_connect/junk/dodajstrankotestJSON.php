<?php
header('Content-Type: application/json');
	include 'povezava.php';
	
	$ime = 3;//$_POST['ime'];
	$priimek = 1;//$_POST['priimek'];
	$naslov = 1;//$_POST['naslov'];
	$hisnaSt = 1;//$_POST['hisnaSt'];
	$posta = 1;//$_POST['posta'];
	$postnaSt = 1;//$_POST['postnaSt'];
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