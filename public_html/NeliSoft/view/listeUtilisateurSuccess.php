<?php
	$list = getUsers();
	foreach ($list as $value) 
	{
		echo "<a href='monApplication.php?action=getProfile&&id=".$value['id']."'>".$value['identifiant']."</a>";
	}