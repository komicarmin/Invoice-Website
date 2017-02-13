<?php
	include 'povezava.php';

	$idPredracun = $_POST['id_predracun'];

	$q = mysql_query("SELECT * FROM narocilo WHERE id_predracun = '$idPredracun'");

	while($narocilo = mysql_fetch_assoc($q))
	{
		$output[] = $narocilo;
	}

	print(json_encode($output));
	mysql_close();
?>