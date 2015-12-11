<?php

class tweetTable
{
	public static function getTweets(){

		$connection = new dbconnection() ;
	    $sql = "select * from jabaianb.tweet;" ;

	    $res = $connection->doQuery( $sql );

	    return $res ;

	}

	public static function getTweetsPostedBy()
}

?>