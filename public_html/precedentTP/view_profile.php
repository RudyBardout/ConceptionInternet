<!DOCTYPE HTML>
<html lang="Fr">

	<head>
		<title>Inscription</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	        <link href="style.css" rel="stylesheet" type="text/css" >
	</head>

<?php
	
	$dbconn = pg_connect("host=localhost dbname=L3 user=uapv1504059 password='4Eaq3f'");

	$query = "SELECT * FROM Personnes where id = ".$_GET['id'];
	$result = pg_query($query);

	$people = array();
	while($row = pg_fetch_array($result)){
			$people[] = $row;
	}

	echo "<table>"; 

	foreach ($people as $row) {
		
		echo "<tr>
				<td>".$row['nom']."</td>
			</tr>
			<tr>
				<td>".$row['prenom']."</td>
			</tr>
			<tr>
				<td><img src='img/".$row['avatar']."'/></td>
			</tr>";

		

	}

	echo "</table>";
	pg_close($dbconn);
?>