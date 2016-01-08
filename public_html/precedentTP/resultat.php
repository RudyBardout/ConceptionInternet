<!DOCTYPE HTML>
<html lang="Fr">

	<head>
		<title>Inscription</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	        <link href="style.css" rel="stylesheet" type="text/css" >
	</head>

<?php

	$dbconn = pg_connect("host=localhost dbname=L3 user=uapv1504059 password='4Eaq3f'");

	if(!empty($_POST["prenom"]) && !empty($_POST["nom"]) ){
		echo "Bonjour ".$_POST["prenom"]." ".$_POST["nom"]."<br />";
	}else{
		echo "Vous n'avez pas rempli le/les champs nécessaire ! <br />";
	}

	//si le repertoire img existe pas alors il le cree avec droit chmod 755
	if( !is_dir(img) ) {
		if( !mkdir(img ) ) {
			exit("Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement ! <br />");
		}
	}
	//chmod("img", 0755);

	$checkQuery = "SELECT nom, prenom FROM Personnes WHERE nom = '".$_POST["nom"]."' AND prenom = '".$_POST["prenom"]."';";
	$checkResult = pg_query($checkQuery);	

	if($checkResult == false){
		echo "Une erreur est survenue sur le Check !";
	}else{

		$nameExist = false;

		$list = array();
		while($row = pg_fetch_array($checkResult)){
			$list[] = $row;
		}

		foreach ($list as $row) {

			if($row["nom"] == $_POST["nom"] && $row["prenom"] == $_POST["prenom"]){
				$nameExist = true;
			}

		}

		// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
		if($nameExist == false){

			if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0){

				// Testons si le fichier n'est pas trop gros
				if ($_FILES['fichier']['size'] <= 10000000){

			        // Testons si l'extension est autorisée
			        $infosfichier = pathinfo($_FILES['fichier']['name']);
			        $extension_upload = $infosfichier['extension'];
			        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
			        $imgPath = $_POST["nom"].$_POST["prenom"].".".$extension_upload;

			        if (in_array($extension_upload, $extensions_autorisees)){

			            // On peut valider le fichier et le stocker définitivement
			            move_uploaded_file($_FILES['fichier']['tmp_name'], 'img/'.$_POST["nom"].$_POST["prenom"].".".$extension_upload);
			            echo "L'envoi a bien été effectué !<br />";
						chmod("img/".$_POST["nom"].$_POST["prenom"].".".$extension_upload , 0755);
						echo "<img src=img/".$_POST["nom"].$_POST["prenom"].".".$extension_upload." />";

						$query = "INSERT INTO Personnes (nom, prenom, avatar) VALUES ('".$_POST["nom"]."', '".$_POST["prenom"]."', '".$imgPath."');";
						$result = pg_query($query);
						if($result == false){
							echo "Une erreur est survenue !";
						}

			        }else{
						echo "erreur extension";
					}

				}else{
					echo "erreur taille";
				}

			}else{
				echo "erreur reception";
			}
		}else{
			echo "Personne déjà existante !";
		}
	}

	Pg_close($dbconn);
?>

<br /> <a href="index.html">cliquez ici pour revenir </a>


