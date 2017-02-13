<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin+Slab">
	<link rel="icon" type="img/ico" href="favicon.ico">
</head>
<body bgcolor="#92CDCF">
	<div id="logo">
	<font class="bold">Invoic</font><font class="thick">app</font>
	</div>
	<div id="prijava">
		<form action="" method="post">
			<input type="text" id="txt" name="Koda" placeholder="Vnesite kodo predračuna">
			<br>
			<input type="submit" id="sub" value="Poglej">
		</form>
	</div>
</body>

	<?php
			$koda = $_POST['Koda'];
			include ("connect.php");
			$q = mysql_query("SELECT id_stranka FROM predracuni WHERE koda='$koda'");
			$st = mysql_num_rows($q);
			if($st == 1)
			{
				$strankaId = mysql_fetch_assoc($q);
				$id = $strankaId['id_stranka'];
				$qIme = mysql_query("SELECT id_stranka,ime,priimek FROM stranka WHERE id_stranka='$id'");
				$ime = mysql_fetch_assoc($qIme);
				$lokacija = "datoteke/" . $ime['id_stranka'] . "_" . $ime['ime'] . "_" . $ime['priimek'] . ".pdf";
				header("Location: $lokacija");
				mysql_free_result($q);
				mysql_free_result($qIme);
				mysql_close($povezava);
			}
		?>

</html>