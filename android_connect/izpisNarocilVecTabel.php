<?php
	include 'povezava.php';

	$idPredracun =$_POST['id_predracun'];

	$q = mysql_query("SELECT izdelki.naziv, narocilo.kolicina FROM izdelki, narocilo, predracuni WHERE narocilo.ID_izdelka = izdelki.ID_izdelek AND predracuni.ID_predracun = narocilo.ID_predracun AND narocilo.id_predracun ='$idPredracun'");

	while($narocilo = mysql_fetch_assoc($q))
	{
		$output[] = $narocilo;
	}

	print(json_encode($output));
	mysql_close();
?>