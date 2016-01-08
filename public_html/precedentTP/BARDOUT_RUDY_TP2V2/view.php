
<!DOCTYPE HTML>
<html lang="Fr">

	<head>
		<title>Inscription</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	        <link href="style.css" rel="stylesheet" type="text/css" >
	</head>

<?php
	
	$dbconn = pg_connect("host=localhost dbname=L3 user=uapv1504059 password='4Eaq3f'");
	if (ISSET($_POST["id"])) 
	{
		$query="DELETE from Personnes where id ='".$_POST["id"]."';";
		$result=pg_query($query);
	}
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
			echo "<td><a href='modif.php?id=".$row['id']."'>".$row["id"]."</a></td>";
			echo "<td>".$row["nom"]."</td>";
			echo "<td>".$row["prenom"]."</td>";
			echo "<td>".$row["avatar"]."</td>";

		}
		echo "</table> 

		<form name= 'supprimer', action='view.php', method='POST'>
		<SELECT name='id'>";
		foreach ($list as $row) 
		{
			echo "<OPTION>".$row['id']."</OPTION>";
		}
		echo "</SELECT>
		<input type='submit', value='Supprimer'>
		</form>";
	}

	pg_close();
?>