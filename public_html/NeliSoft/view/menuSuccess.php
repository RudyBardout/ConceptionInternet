<html>
<body>
	<h1> Twitter </h1>

<table>
	<tr>
		<td> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</td>
		<td>                             </td>
		<td> <a href="monApplication.php?action=checkLogin"> Mon profil </td>
		<td> <input type="submit" value="se deconnecter">
	</tr>
</table>

$listTweets = tweetTable::getTweets();

<p> Ici sera affiché l'historique des tweets que nous avons postés, et ceux qu'on a liké/retweet </p>
</html>