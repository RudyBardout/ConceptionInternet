<html>
<head>
<link rel="stylesheet" type="text/css" href="/~uapv1403233/css/utilisateur.css" />
</head>
<body>
<?php
	echo "<div id= userlist>";
	echo "<div id = Barre>";
		echo "<table border='1'>";
		echo "<tr>";
		echo "<td> Nom</td>";
		echo "<td> Prénom</td>";
		echo "<td> Identifiant</td>";
		echo "</div>";
	foreach ($context->users as $value) 
	{
		echo "<tr>";
			echo "<td><a href='monApplication.php?action=getProfile&&id=".$value->data['id']."'>".$value->data['nom']."</a> \n";
			echo "<td class='case'><a href='monApplication.php?action=getProfile&&id=".$value->data['id']."'>".$value->data['prenom']."</a> \n";
			echo "<td><a href='monApplication.php?action=getProfile&&id=".$value->data['id']."'>".$value->data['identifiant']."</a> \n";
		echo "</tr>";
	}
	echo "</div>";

	?>
	</body>
	<html>