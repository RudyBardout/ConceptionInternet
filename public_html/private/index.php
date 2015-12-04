<?php
	
	include('verif_login.php');

	if(!empty($_POST["prenom"]) && !empty($_POST["nom"]) ){
		echo "Bonjour ".$_POST["prenom"]." ".$_POST["nom"]."<br />";
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
			echo "<td><a href='view_profile.php?id=".$row['id']."'>".$row["id"]."</a></td>";
			echo "<td>".$row["nom"]."</td>";
			echo "<td>".$row["prenom"]."</td>";
			echo "<td>".$row["avatar"]."</td>";

		}
		echo "</table>";
	}
	pg_close($dbconn);
?>