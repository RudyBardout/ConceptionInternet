<html lang="Fr">

<head> 
<link rel="stylesheet" type="text/css" href="/~uapv1403233/css/style.css" media="all"/>
		<title> Profil </title>
<body>
<div id="menu">
	<nav>
		<ul>
			<li> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</li></a>
			<li> <a href="monApplication.php?action=menuLogIn"> Retour au menu </li></a>
		</ul>
	</nav>
	</div>

<?php
if ($_SESSION["user"]){
echo '<ul>';

	echo '<li>';
		echo "Nom : ".$_SESSION['user']->data['nom'];
	echo '<li>';
		echo "Prenom : ".$_SESSION['user']->data['prenom'];
	echo '</li>';
	echo '<li>';
		echo "Identifiant : ".$_SESSION['user']->data['identifiant'];
	echo '</li>';
	echo '<li>';
		echo "Avatar : <img src=/~uapv1403233/img/".$_SESSION['user']->data['avatar'].">";
	echo '</li>';
echo "<div id = 'list_tweets'>";
	foreach ($_SESSION["tweets"] as $array) 
		{
		echo '<br /> <br /> <li>'; 
			echo "Tweet : ".$array->data['texte'];
		echo '</li>';
		echo '<li>';
			echo "Date : ".$array->data['date'];
		echo '</li>';
		echo '<li>';
			echo "Nombre de votes : ".$array->data['nbvotes'];
		echo '</li>';
		if($array->data['parent'] == $_SESSION['user']->data['id']){
			echo "<a href='monApplication.php?action=deleteTweet&&tweetToDelete=".$array->data['id']."'>
					<input type='submit' value='Supprimer'/>
				</a>";
		}
		
		if ($array->data['image'] != null) {
			echo '<li>';
			echo "Avatar : <img src=/~uapv1403233/img/".$array->data['image'].">";
			echo '</li>';
		}
		
		}
		echo "</div>";
echo '</ul>';
	}
?>
<div id="modify">
<form name="tweet" action="monApplication.php?action=sendTweet" method="POST" enctype="multipart/form-data" >

	<textarea name="tweet" maxlength="140"> Tweet</textarea>	
	<input type="submit" value="Envoyer le tweet" /><input type="reset" value="Reinitialiser"/>
</form>
<form name="status" action="monApplication.php?action=updateStatus" method="POST" enctype="multipart/form-data" >
	<textarea name="status" > Status</textarea>
	<input type="submit" value="Sauvegarder le statut" />
</form>
</div>
</html>