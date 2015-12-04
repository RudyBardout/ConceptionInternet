<html lang="Fr">

<head> 
		<title> Profil </title>
<body>
	<table>
		<tr>
			<td> <a href="listeUtilisateur.php">Liste utilisateur</td>
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
} 
echo '</ul>';
?>
<form name="tweet" action="monApplication.php?action=checkInscription" method="POST" enctype="multipart/form-data" >
	<textarea name="tweet" > Status</textarea>
	<textarea name="tweet" maxlength="140"> tweet</textarea>
	<input type="submit" value="Envoyer le tweet" /><input type="reset" value="Reinitialiser"/></td>
</form>
