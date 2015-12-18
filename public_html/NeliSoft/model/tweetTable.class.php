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
		$posts = postTable::addPost($user);
		$connection = new dbconnection();
		foreach($posts as $post){
			$sql = "INSERT INTO jabaianb.tweet (emetteur, parent, post, nbvotes) VALUES (".$user->data["id"].", ".$user->data["id"].", ".$post->data["id"].", 0);";
			$res = $connection->doQueryObject($sql, "tweet");
		}
		return $res;
	}

	public static function addLike($user){
		$connection = new dbconnection();
		$sql = "SELECT * FROM jabainb.vote WHERE message = '".$_GET['id_tweet']."';";
		$res = $connection->doQuery($sql);
		$hasLiked = false;
		foreach($res as $vote){
			if($vote['utilisateur'] == $user->data['id']) {
				$hasLiked = true;
			}
		}
		if(!$hasLiked){
			$sql = "INSERT INTO jabaianb.vote (utilisateur, message) VALUES (".$user->data['id'].", ".$_GET['id_tweet']");";
			$res = $connection->doQuery($sql);
			$sql = "UPDATE jabaianb.tweet SET nbvotes = nbvotes+1 WHERE id = ".$_GET['id_tweet'].";";
			$res = $connection->doQuery($sql);
		}
	}
}

?>