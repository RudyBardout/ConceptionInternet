<?php

class voteTable
{
	public static function getVotes()
	{
		$connection = new dbconnection() ;
    	$sql = "select * from jabaianb.vote;" ;

   		$res = $connection->doQueryObject( $sql, "vote" );

		return $res;
	}

	public static function addVote($idUser, $idTweet){
		$connection = new dbconnection();
		$sql = "INSERT INTO jabaianb.vote (utilisateur, message) VALUES ('".$idUser."', '".$idTweet."');";
		$res = $connection->doQueryObject($sql, "vote");
		$sql = "UPDATE jabaianb.tweet SET nbvotes = nbvotes+1 WHERE id = ".$idTweet.";";
		$connection->doExec($sql);
		return $res;
	}

	public static function removeVote($idUser, $idTweet){
		$connection = new dbconnection();
		$sql = "DELETE FROM jabaianb.vote WHERE utilisateur = ".$idUser." AND message = ".$idTweet.";";
		$connection->doExec($sql);
		$sql = "UPDATE jabaianb.tweet SET nbvotes = nbvotes-1 WHERE id = ".$idTweet.";";
		$connection->doExec($sql);
	}
}
?>