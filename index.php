<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin+Slab">
	<script type="text/javascript">
	function submitform()
	{
	  document.myform.submit();
	}
	</script>
	<link rel="icon" type="img/ico" href="favicon.ico">
</head>

<?php
	include ("connect.php");
	session_start();
	mysql_query("SET NAMES 'utf8'");
	$UpIme = $_SESSION['uporabnik'];
		if(!$UpIme)
		{
			header('Location: login.html');
		}
	$userQ = mysql_query("SELECT * FROM users WHERE upime = '$UpIme'");
	$user = mysql_fetch_assoc($userQ);
	$id = $user['id_user'];
	
	
	function izpis($predracunKoda, $sIme, $sPriimek, $datum)
	{
		echo "<tr>";				
		echo "<td height='45px' style='padding-left:10px;'>";
		echo $sIme . " " . $sPriimek;
		echo "</td>";
		
		echo "<td width='100px' align='center'>";
		echo $datum;
		echo "</td>";
		
		echo "<td width='95px' align='center'>";
		echo "<a href='datoteke/" . $predracunKoda . ".pdf'" . " target='_blank'>";
		echo "Predogled";
		echo "</td>";
		
		echo "<td width='75px' align='center'>";
		echo "<a href='datoteke/" . $predracunKoda . ".pdf'" . " download>";
		echo "Prenos";
		echo "</td>";
		
		echo "</tr>";
	}
?>

<body bgcolor="#EEEFF7">
	<div id="glava">
	<div id="logo"><font class="bold">Invoic</font><font class="thick">app</font></div>
	<div id="acc">
		<a href="logout.php"><div id="odjava">Odjava</div></a>
		<div id="ime"><?php echo $user['ime'] . " " . $user['priimek']; ?></div>
	</div>
	</div>
	<div id="container">
		<div id="meni">
			<a href="http://r4c.sc-nm.si/armin/Invoicapp/"><div class="gumb" id="izbran">Vsi predračuni</div></a>
				<form action="" method="get">
				<?php
				if(empty($_GET['uredi']))
				{
				echo"<div class='gumbUredi' style='font-weight: 900; background-color: #59729C;  color: #EEEFF7;'><input type='radio' name='uredi' onclick='javascript: submit()' value='ip' id='1' checked><label for='1'>Ime padajoče</label></div>
				<div class='gumbUredi'><input type='radio' name='uredi'  onclick='javascript: submit()'value='in' id='2'><label for='2'>Ime naraščajoče</label></div>
				<div class='gumbUredi'><input type='radio' name='uredi'  onclick='javascript: submit()'value='dp' id='3'><label for='3'>Datum padajoče</label></div>
				<div class='gumbUredi'><input type='radio' name='uredi' onclick='javascript: submit()' value='dn' id='4'><label for='4'>Datum naraščajoče</label></div>
				<div class='iskanje'>
				<input type='text' name='iskanje' id='iskanjeInput' placeholder='Iskanje'>
				<input type='submit' style='position: absolute; left: -9999px; width: 1px; height: 1px;'/>
			</div>";
				}
				else
				{
				$value=mysql_real_escape_string($_GET['iskanje']);
				echo"<div class='gumbUredi'"; if($_GET['uredi']=='ip'){echo " style='font-weight: 900; background-color: #59729C; color: #EEEFF7;'";} echo"><input type='radio' name='uredi' onclick='javascript: submit()' value='ip' id='1'";if($_GET['uredi']=='ip'){echo "checked";}echo"><label for='1'>Ime padajoče</label></div>";
				echo"<div class='gumbUredi'"; if($_GET['uredi']=='in'){echo " style='font-weight: 900; background-color: #59729C; color: #EEEFF7;'";} echo"><input type='radio' name='uredi' onclick='javascript: submit()' value='in' id='2'";if($_GET['uredi']=='in'){echo "checked";}echo"><label for='2'>Ime naraščajoče</label></div>";
				echo"<div class='gumbUredi'"; if($_GET['uredi']=='dp'){echo " style='font-weight: 900; background-color: #59729C; color: #EEEFF7;'";} echo"><input type='radio' name='uredi' onclick='javascript: submit()' value='dp' id='3'";if($_GET['uredi']=='dp'){echo "checked";}echo"><label for='3'>Datum padajoče</label></div>";
				echo"<div class='gumbUredi'"; if($_GET['uredi']=='dn'){echo " style='font-weight: 900; background-color: #59729C; color: #EEEFF7;'";} echo"><input type='radio' name='uredi' onclick='javascript: submit()' value='dn' id='4'";if($_GET['uredi']=='dn'){echo "checked";}echo"><label for='4'>Datum naraščajoče</label></div>";
				echo"	<div class='iskanje'>
				<input type='text' name='iskanje' id='iskanjeInput' placeholder='Iskanje' value=$value>
				<input type='submit' style='position: absolute; left: -9999px; width: 1px; height: 1px;'/>
				</div>";
				}
				?>
			</form>
		</div>
		<div id="vsebina">
			<table width="100%">
				<?php
				$nizP = "SELECT * FROM predracuni, stranka WHERE predracuni.id_user = '$id' AND stranka.id_stranka = predracuni.id_stranka";
				if(isset($_GET['uredi']))
				{
					if($_GET['uredi']=='dp')
						$nizP .= " ORDER BY predracuni.datum_izdelave DESC";
					else if($_GET['uredi']=='dn')
						$nizP .= " ORDER BY predracuni.datum_izdelave ASC";
					else if($_GET['uredi']=='in')
						$nizP .= " ORDER BY stranka.ime DESC";
					else if($_GET['uredi']=='ip')
						$nizP .= " ORDER BY stranka.ime ASC";
				}
				else $nizP .= " ORDER BY stranka.ime ASC";
					
				$predracunQ = mysql_query($nizP);
				
				while($predracun = mysql_fetch_assoc($predracunQ))
				{
					$predracunKoda = $predracun['koda'];
					$strankaId = $predracun['id_stranka'];
					$niz = "SELECT * FROM stranka WHERE id_stranka='$strankaId'";
					$strankaQ = mysql_query($niz);
					$stranka = mysql_fetch_assoc($strankaQ);
					
					$sIme = $stranka['ime'];
					$sPriimek = $stranka['priimek'];
					$datum = $predracun['datum_izdelave'];
					
					if(!empty($_GET['iskanje']))
					{
						$niz = $_GET['iskanje'];
						if (strpos($niz,$sIme) !== false || strpos($niz,$sPriimek) !== false || strpos($niz,$datum) !== false)
						{
							izpis($predracunKoda, $sIme, $sPriimek, $datum);
						}
					}
					else
					{
						izpis($predracunKoda, $sIme, $sPriimek, $datum);
					}
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>