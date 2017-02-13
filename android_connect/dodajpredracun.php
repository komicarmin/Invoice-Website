<?php
header('Content-Type: application/json');
	include 'povezava.php';

	function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}

	$id_user =$_POST['id_user'];
	$id_stranka =$_POST['id_stranka'];
	$koda = generateRandomString(8);

	mysql_query("INSERT INTO predracuni /*('id_predracun', 'id_user', 'datum_izdelave', 'koda')*/ VALUES(NULL, '$id_user', '$id_stranka', CURRENT_TIMESTAMP, '$koda')");

	$q = mysql_query("SELECT id_predracun FROM predracuni WHERE id_user = '$id_user' AND id_stranka = '$id_stranka' ORDER BY id_predracun DESC LIMIT 1");
	$num = mysql_num_rows($q);
	if($num!=0)
	{
		while($list=mysql_fetch_assoc($q))
		{
			$output[] = $list;
		}
	}
	print json_encode($output);
	/*$idPredracuna = mysql_fetch_assoc($q);
	print json_encode($idPredracuna);*/

	mysql_close();
?>