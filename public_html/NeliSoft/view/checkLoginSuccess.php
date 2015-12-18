<html lang="Fr">

<head> 
		<title> Profil </title>
<body>
	<table>
		<tr>
			<td> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</td>
			<td> <a href="monApplication.php?action=menuLogIn"> Retour au menu </td>
		</tr>
	</table>

<?php
if ($_SESSION["user"]){
echo '<ul>';

	echo '<li>';
		echo "Nom : ".$_SESSION['user']->data['nom'];
	echo '</li>';
	echo '<li>';
		echo "Prenom : ".$_SESSION['user']->data['prenom'];
	echo '</li>';
	echo '<li>';
		echo "Identifiant : ".$_SESSION['user']->data['identifiant'];
	echo '</li>';
	echo '<li>';
		echo "Avatar : <img src=/~uapv1403233/img/".$_SESSION['user']->data['avatar'].">";
	echo '</li>';

	foreach ($_SESSION["tweets"] as $array) 
		{
		echo '<li>';
			echo "Tweet : ".$array['texte'];
		echo '</li>';
		echo '<li>';
			echo "Date : ".$array['date'];
		echo '</li>';
		echo '<li>';
			echo "Avatar : <img src=/~uapv1403233/img/".$array['image'].">";
		echo '</li>';
		}
echo '</ul>';
	}
?>
<form name="tweet" action="monApplication.php?action=checkInscription" method="POST" enctype="multipart/form-data" >
	<textarea name="tweet" > Status</textarea>
	<textarea name="tweet" maxlength="140"> tweet</textarea>
	<input type="submit" value="Sauvegarder le statut" /><input type="save" value="save"/></td>
	<input type="submit" value="Envoyer le tweet" /><input type="reset" value="Reinitialiser"/></td>
</form>