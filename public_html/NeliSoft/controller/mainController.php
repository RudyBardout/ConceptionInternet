<?php
/*
 * Controler 
 */

class mainController
{

	public static function index($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function login($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function menuLogIn($request,$context)
	{
		$context->listTweets = tweetTable::getTweetsPostedBy($_SESSION['user']->data['id']);
		return context::SUCCESS;
	}

	public static function menuLogOut($request,$context)
	{
	
		return context::SUCCESS;
	}

	public static function listeUtilisateur($request,$context)
	{
		$context->users = utilisateurTable::getUsers();
		return context::SUCCESS;
	}

	public static function inscription($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function logOut($request,$context)
	{	
		session_unset();
		session_destroy();
		return context::SUCCESS;
	}

	public static function sendTweet($request,$context)
	{	
		tweetTable::addTweet($_SESSION['user']);
		return context::SUCCESS;
	}

	public static function deleteTweet($request, $context){
		$tweets = tweetTable::getTweetsPostedBy($_SESSION['user']->data['id']);
		foreach($tweets as $tweet){
			if($tweet->data['id'] == $_GET['tweetToDelete'] && $tweet->data['parent'] == $_SESSION['user']->data['id']){
				tweetTable::removeTweet($tweet);
			}
		}
		return context::SUCCESS;
	}

	public static function updateStatus($request,$context)
	{
		utilisateurTable::updateStatus($_SESSION['user']);
		return context::SUCCESS;
	}

		public static function tweetList($request,$context)
	{
		$context->users = tweetList::getTweets();
		return context::SUCCESS;
	}
	public static function checkInscription($request, $context)
	{
		if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['passConf']) && isset($_FILES['fichier'])) {
			$context->nom = $_POST['nom'];
			$context->prenom = $_POST['prenom'];
			$context->login = $_POST['login'];
			$context->pass = $_POST['pass'];
			$context->passConf = $_POST['passConf'];
			$context->avatar = $_FILES['fichier'];

			if ($_POST['pass'] != $_POST['passConf']) {
				$context->erreur = 1;
				return context::ERROR;
			}
			else {
				$context->clearPass = $context->pass;
				$context->pass=sha1($context->pass);
				utilisateurTable::inscription($context);
				$context->logged = utilisateurTable::getUserByLoginAndPass($context->login, $context->clearPass);
		        foreach($context->logged as $yolo){
		          $context->myProfileTweets=tweetTable::getTweetsPostedBy($yolo->data['id']);
		          context::setSessionAttribute("user", $yolo);
		          context::setSessionAttribute("tweets", $context->myProfileTweets);
				}
			}
		}
		else {
			$context->erreur = 2;
			return context::ERROR;
		}

		return context::SUCCESS;
	}

	public static function checkLogin($request, $context)
	{
		if(!isset($_SESSION['user']) || !isset($_SESSION['tweets'])){
			if (isset($_POST['login']) && isset($_POST['pass'])) {
				$context->login = $_POST['login'];
				$context->pass = $_POST['pass'];
				$context->logged = utilisateurTable::getUserByLoginAndPass($context->login, $context->pass);
				foreach($context->logged as $yolo){
					$context->myProfileTweets=tweetTable::getTweetsPostedBy($yolo->data['id']);
					context::setSessionAttribute("user", $yolo);
					context::setSessionAttribute("tweets", $context->myProfileTweets);
				}
			}
			else {
				$context->erreur = 2;
				return context::ERROR;
			}
			if (count($context->logged) < 1) {
				return context::ERROR;
			}
		}else{
				$context->myProfileTweets=tweetTable::getTweetsPostedBy($_SESSION['user']->data['id']);
				$_SESSION["tweets"] = $context->myProfileTweets;
		}
		
		return context::SUCCESS;
	}

	public static function getProfile($request, $context)
	{
		if(isset($_GET['id']))
		{
			$context->profile=utilisateurTable::getUserById($_GET['id']);
			$context->profileTweets=tweetTable::getTweetsPostedBy($_GET['id']);
			$context->votes=voteTable::getVotes();
		}
		else {
			$context->erreur = 2;
			return context::ERROR;
		}
		return context::SUCCESS;	
	}

	public static function vote($request, $context){
		voteTable::addVote($_SESSION['user']->data['id'], $_GET['id_tweet']);
		return context::SUCCESS;
	}

	public static function unVote($request, $context){
		voteTable::removeVote($_SESSION['user']->data['id'], $_GET['id_tweet']);
		return context::SUCCESS;
	}

	public static function retweet($request, $context)
	{
		$context->tweet=tweetTable::retweet($_GET['id_tweet']);
		return context::SUCCESS;	

	}
}