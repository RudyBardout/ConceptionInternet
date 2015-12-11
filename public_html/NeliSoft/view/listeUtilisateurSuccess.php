<html>

<?php
		echo "<table>";

	foreach ($context->users as $value) 
	{
		echo "<tr>";
			echo "<td><a href='monApplication.php?action=getProfile&&id=".$value['id']."'>".$value['identifiant']."</a> \n";
		echo "</tr>";
	}