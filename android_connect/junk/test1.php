<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		include 'povezava.php';
	
	$ime = "test";//$_POST['ime'];
	$priimek ="test"; //$_POST['priimek'];
	$naslov ="test"; //$_POST['naslov'];
	$hisnaSt ="test"; //$_POST['hisnaSt'];
	$posta ="test"; //$_POST['posta'];
	$postnaSt ="test"; //$_POST['postnaSt'];
	$idStr = 0;
	$q = mysql_query("SELECT * FROM stranka WHERE ime='$ime' AND priimek='$priimek' AND naslov='$naslov'");

	if(mysql_num_rows($q) == 0)
	{
	mysql_query("INSERT INTO stranka VALUES(NULL, '$ime', '$priimek', '$naslov', '$hisnaSt', '$posta', '$postnaSt')");
	}
	else
	{
		mysql_query("INSERT INTO stranka VALUES(NULL, '1', '1', '1', '1', '1', '1')");
	}

	$qId = mysql_query("SELECT id_stranka FROM stranka WHERE ime=$ime AND priimek=$priimek AND naslov=$naslov");
	$stranka = mysql_fetch_assoc($qId);
	$idStr = stranka['id_stranka'];
	print(json_encode($idStr));
	mysql_close();
	?>
</body>
</html>