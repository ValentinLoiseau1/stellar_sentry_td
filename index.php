<?php

/**
*	Controleur principal  
*/

require dirname(__FILE__) . "/controleur/config.php";

require RACINE . "/controleur/routage.php";

if (isset($_GET["action"])) {
	$action = $_GET["action"];
}

//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirigeVers($action);
require RACINE . "/controleur/" . $fichier;

?>
