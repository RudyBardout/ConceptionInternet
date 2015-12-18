<html>
<body>
<?php

echo "<table>";

	foreach ($context->users as $value) 
	{
		echo "<tr>";
			echo "'<td><form action = monApplication?action=getTweets&id_tweet='".$context->tweet.">".$value->data['id']."'>".$value->data['identifiant']."</a> \n";
		echo "</tr>";