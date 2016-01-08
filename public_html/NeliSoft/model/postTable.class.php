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

	public static function addPost(){
		$connection = new dbconnection();
		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO jabaianb.post (texte, date) VALUES ('".$_POST['tweet']."', '".$date."');";
		$res = $connection->doQueryObject($sql, "post");
		
		$sql = "SELECT id FROM jabaianb.post WHERE texte = '".$_POST['tweet']."' AND date = '".$date."';";
		$res = $connection->doQueryObject($sql, "post");
		return $res;
	}
}
?>