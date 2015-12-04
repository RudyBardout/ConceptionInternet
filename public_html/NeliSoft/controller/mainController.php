<?php
/*
 * Controler 
 */

class mainController
{

	public static function helloWorld($request,$context)
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}

	public static function index($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function login($request,$context)
	{
		
		return context::SUCCESS;
	}

	public static function superTest($request, $context)
	{
		$context->mavariable1=$_GET['param1'];
		$context->mavariable2=$_GET['param2'];

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
				$context->pass=sha1($context->pass);
				utilisateurTable::inscription($context);
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
		if (isset($_POST['login']) && isset($_POST['pass'])) {
			$context->login = $_POST['login'];
			$context->pass = $_POST['pass'];
			
			$context->res = utilisateurTable::getUserByLoginAndPass($context->login, $context->pass);
		}
		else {
			$context->erreur = 2;
			return context::ERROR;
		}
		if ($context->res === false ) {
			return context::ERROR;
		}
		return context::SUCCESS;
	}
}

	