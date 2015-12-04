<?php
	
	
?>

<!DOCTYPE HTML>
<html lang="Fr">

	<head>
		<title>Inscription</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	        <link href="style.css" rel="stylesheet" type="text/css" >
	</head>

<?php

	$dbconn = pg_connect("host=localhost dbname=L3 user=uapv1504059 password='4Eaq3f'");

	if(isset($_COOKIE['login']) && isset($_COOKIE['pass'])){
		$log = $_COOKIE['login'];
		$pass = $_COOKIE['pass'];
		$check = 'checked';
	}else{
		$log = '';
		$pass = '';
		$check = '';
	}

	echo 	"<form name='login' action='private/index.php' method='POST'>
				<table>
					<tr>
						<td class='title'> Login : </td>
						<td> <input name='login' type='text' value = '".$log."' /></td>
					</tr>
					<tr>
						<td class='title'> Password  : </td>
						<td> <input name='password' type='password' value = '".$pass."' /></td>
					</tr>
					<tr>
						<td><input type='checkbox' name=rememberMe checked = '".$check."' /></td>
						<td>Se souvenir de moi</td>
					</tr>
					<tr>
						<td><a href='inscription.php'>S'inscrire</a></td>
					</tr>
					<tr>
						<td><input type='submit' name='login in'/></td>
					</tr>
				</table>
			</form>";

	$query = "SELECT * FROM Personnes;";
	$result = pg_query($query);	

	if($result == false){
		echo "Une erreur est survenue sur le Check !";
	}else{

		$list = array();
		while($row = pg_fetch_array($result)){
			$list[] = $row;
		}

		echo 	"<table>
					<tr>
						<td>ID</td>
						<td>Nom</td>
						<td>Prenom</td>
						<td>Chemin Avatar</td>
					</tr> <tr></tr>";

		foreach ($list as $row) {

			echo "<tr>";
			echo "<td><a href='view_profile.php?id=".$row['id']."'>".$row["id"]."</a></td>";
			echo "<td>".$row["nom"]."</td>";
			echo "<td>".$row["prenom"]."</td>";
			echo "<td>".$row["avatar"]."</td>";

		}
		echo "</table>";
	}

	pg_close($dbconn);
?>