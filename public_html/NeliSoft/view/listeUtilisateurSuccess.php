<html>

<?php
		echo "<table>";

	foreach ($context->users as $value) 
	{
		echo "<tr>";
			echo "<td><a href='monApplication.php?action=getProfile&&id=".$value->data['id']."'>".$value->data['identifiant']."</a> \n";
		echo "</tr>";
	}