<?php
/*
Controleur secondaire : news
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>

<?php
require "./modele/modeleNews.php";
?>

<?php
include("vue/vueConnexion.php");
?>