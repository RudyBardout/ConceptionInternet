<html lang="Fr">

	<head>
		<title>Inscription</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	        <link href="style.css" rel="stylesheet" type="text/css" >
	</head>

<?php
	
	$dbconn = pg_connect("host=localhost dbname=L3 user=uapv1504059 password='4Eaq3f'");
	$query = "SELECT * FROM Personnes where id = ".$_GET['id'];
	echo "</table> 

		<form name= 'modifier', action='view.php', method='POST'>
		<SELECT name='id'>";
		
		echo "</SELECT>
		<input type='submit', value='Supprimer'>
		</form>";