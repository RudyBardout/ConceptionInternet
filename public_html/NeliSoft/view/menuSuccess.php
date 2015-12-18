<html>
<body>
	<h1> Twitter </h1>

<table>
	<tr>
		<td> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</a></td>
		<td>                             </td>
		<td> <a href="monApplication.php?action=checkLogin"> Mon profil </a></td>
		<form name="logout" action="monApplication.php?action=logOut" method="POST" enctype="multipart/form-data" >
			<td> <input type="submit" value="se deconnecter"> </td>
		</form>
	</tr>
</table>
<?php
$listTweets = tweetTable::getPostedbyId($_GET[id]);
?>
<p> Ici sera affiché l'historique des tweets que nous avons postés, et ceux qu'on a liké/retweet </p>
</html>