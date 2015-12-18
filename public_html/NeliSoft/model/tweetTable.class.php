<?php

class tweetTable
{
	public static function getTweets(){

		$connection = new dbconnection() ;
	    $sql = "SELECT * from jabaianb.tweet;" ;

	    $res = $connection->doQueryObject( $sql, "tweet" );

	    return $res;
	}

	public static function getTweetsPostedBy($id_user){
		$connection = new dbconnection() ;
	    $sql = "SELECT * FROM jabaianb.post p JOIN jabaianb.tweet t ON p.id = t.post WHERE t.emetteur=".$id_user.";";

	    $res = $connection->doQueryObject( $sql, "tweet" );

	    return $res;
	}

	public static function addTweet($user){
		$post = postTable::addPost($user);
		$connection = new dbconnection();
		$sql = "INSERT INTO jabaianb.tweet ('emetteur', 'parent', 'post', 'nbvotes') VALUES (".$user->data["id"].", ".$user->data["id"].", ".$post->data["id"].", 0);";
		$res = $connection->doQueryObject($sql, "tweet");
	}
}

?>