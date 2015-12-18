<?php
//nom de l'application
$nameApp = "NeliSoft";

//action par défaut
$action = "login";

if(key_exists("action", $_REQUEST))
$action =  $_REQUEST['action'];

require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';
session_start();

$context = context::getInstance();
$context->init($nameApp);

/*$context->nom = $_POST['nom'];
$context->prenom = $_POST['prenom'];
$context->login = $_POST['login'];
$context->pass = $_POST['pass'];
$context->passConf = $_POST['passConf'];
$context->avatar = $_FILES['fichier'];*/

$view=$context->executeAction($action, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false)
{
	echo "Une grave erreur s'est produite, il est probable que l'action ".$action." n'existe pas...";
	die;
}
//inclusion du layout qui va lui meme inclure le template view
elseif($view!=context::NONE)
{
	$template_view=$nameApp."/view/".$action.$view.".php";
	include($nameApp."/layout/".$context->getLayout().".php");
}

?>
