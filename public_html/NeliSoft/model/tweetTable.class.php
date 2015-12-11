<?php

class tweetTable
{
	public static function getTweets(){

		$connection = new dbconnection() ;
	    $sql = "select * from jabaianb.tweet;" ;

	    $res = $connection->doQuery( $sql );

	    return $res;

	}

	public static function getTweetsPostedBy($id_user){
		$connection = new dbconnection() ;
	    $sql = "select * from jabaianb.tweet where parent=".$id_user.";";

	    $res = $connection->doQuery( $sql );

	    return $res;

	}
}

?>