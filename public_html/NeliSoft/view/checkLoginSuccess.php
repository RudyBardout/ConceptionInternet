<html lang="Fr">

<head> 
		<title> Profil </title>
<body>
	<table>
		<tr>
			<td> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</td>
			<td> <a href="monApplication.php?action=menu"> Retour au menu </td>
		</tr>
	</table>

<?php
echo '<ul>';
foreach( $context->res as $array ){ 

	echo '<li>';
		echo "Nom : ".$array['nom'];
	echo '</li>';
	echo '<li>';
		echo "Prenom : ".$array['prenom'];
	echo '</li>';
	echo '<li>';
		echo "Identifiant : ".$array['identifiant'];
	echo '</li>';
	echo '<li>';
		echo "Avatar : <img src=/~uapv1403233/img/".$array['avatar'].">";
	echo '</li>';

	foreach ($context->myProfileTweets as $key => $value) 
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
	}
} 
echo '</ul>';
?>
<form name="tweet" action="monApplication.php?action=checkInscription" method="POST" enctype="multipart/form-data" >
	<textarea name="tweet" > Status</textarea>
	<textarea name="tweet" maxlength="140"> tweet</textarea>
	<input type="submit" value="Sauvegarder le statut" /><input type="save" value="save"/></td>
	<input type="submit" value="Envoyer le tweet" /><input type="reset" value="Reinitialiser"/></td>
</form>
