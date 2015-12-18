<?php

class postTable
{
	public static function getPostById($id)
	{
		$connection = new dbconnection() ;
    	$sql = "select * from jabaianb.post where id='".$id."';" ;

   		$res = $connection->doQueryObject( $sql, "post" );

		return $res;
	}

	public static function addPost($user){
		$connection = new dbconnection();
		$sql = "INSERT INTO jabaianb.post (texte, date) VALUES ('".$_POST['tweet']."', '".date('Y-m-d H:i:s')."');";
		$res = $connection->doQueryObject($sql, "post");
		return $res;
	}


?>