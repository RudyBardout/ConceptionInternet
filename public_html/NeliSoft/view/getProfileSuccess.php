<html lang="Fr">

<head> 
		<title> Profil </title>
<body>
	<table>
		<tr>
			<td> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</td>
			<?php 
				if(isset($_SESSION['user'])){
			?>
			<td> <a href="monApplication.php?action=menuLogIn"> Retour au menu </td>
			<?php
				}else{
			?>
			<td> <a href="monApplication.php?action=menuLogOut"> Retour au menu </td>
			<?php
				}
			?>
		</tr>
	</table>
<?php
	foreach( $context->profile as $array )
	{ 
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
		echo '<li>';
		echo "Status : ".$array['statut'];
		echo '</li>';

		foreach ($context->profileTweets as $key => $value) 
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
?>