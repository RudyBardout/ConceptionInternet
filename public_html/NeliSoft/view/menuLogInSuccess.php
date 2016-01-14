<html>
<head>
<link rel="stylesheet" type="text/css" href="/~uapv1403233/css/style.css" media="all"/>
<body>
	<h1> Twitter </h1>
<div id="menu">
<nav>
	<ul>
		<li> <a href="monApplication.php?action=listeUtilisateur">Liste utilisateur</a></li>
		<li>                             </li>
		<li> <a href="monApplication.php?action=checkLogin"> Mon profil </a></li>
		<li><form name="logout" action="monApplication.php?action=logOut" method="POST" enctype="multipart/form-data" ></li>
			<li> <input type="submit" value="se deconnecter"> </li>
		</ul>
	</nav>
</div>
<div id="list_tweets">
<?php
	foreach ($_SESSION["tweets"] as $array) 
		{
		echo '<li>';
			echo "Tweet : ".$array->data['texte'];
		echo '</li>';
		echo '<li>';
			echo "Date : ".$array->data['date'];
		echo '</li>';
		echo '<li>';
			echo "Avatar : <img src=/~uapv1403233/img/".$array->data['image'].">";
		echo '</li>';
		}
echo '</ul>';
?>
</div>
</html>