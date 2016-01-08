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
			echo "Nom : ".$array->data['nom'];
		echo '</li>';
		echo '<li>';
			echo "Prenom : ".$array->data['prenom'];
		echo '</li>';
		echo '<li>';
			echo "Identifiant : ".$array->data['identifiant'];
		echo '</li>';
		echo '<li>';
			echo "Avatar : <img src=/~uapv1403233/img/".$array->data['avatar'].">";
		echo '</li>';
		echo '<li>';
		echo "Status : ".$array->data['statut'];
		echo '</li>';

		foreach ($context->profileTweets as $value) 
		{
			echo '<br /> <br <li>';
				echo "Tweet : ".$value->data['texte'];
			echo '</li>';
			echo '<li>';
				echo "Date : ".$value->data['date'];
			echo '</li>';
			echo "<a href='monApplication.php?action=retweet&&id_tweet=".$value->data['id']."'>
					<input type='submit' value='Retweet'/>
				</a>";

			if ($value->data['image'] != null) {
				echo '<li>';
				echo "Avatar : <img src=/~uapv1403233/img/".$value->data['image'].">";
				echo '</li>';
		}
		}
	}
?>