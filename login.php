<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<?php
	session_start();
	include ("connect.php");
	$UpIme = mysql_real_escape_string($_POST['UpIme']);
	$Geslo = md5(mysql_real_escape_string($_POST['Geslo']));
	
	if($UpIme && $Geslo)
	{
		$query = mysql_query("SELECT * FROM users WHERE upime = '$UpIme' AND geslo='$Geslo'");
		$stVrstic = mysql_num_rows($query);
		if($stVrstic != 0)
		{
			$_SESSION['uporabnik'] = $UpIme;
			header('Location: index.php');
		}
		else
		{
			header('Location: login.html');
		}
		
	}
	else
	{
		header('Location: login.html');
	}
	
?>