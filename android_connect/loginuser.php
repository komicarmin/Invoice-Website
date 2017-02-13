<?php 
header('Content-Type: application/json');
include 'povezava.php';

$upime = $_POST['username'];
$geslo = mysql_real_escape_string($_POST['password']);

$query = mysql_query("SELECT * FROM users WHERE upime='$upime' AND geslo='$geslo'");
$num = mysql_num_rows($query);
if($num!=0)
{
	while($list=mysql_fetch_assoc($query))
	{
		$output[] = $list;
	}
}
print(json_encode($output));
mysql_close();
?>