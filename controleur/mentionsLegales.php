<?php
/*
Controleur secondaire : mentionsLegales
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

// header ("Location: ?action=accueil"); 

?>

<?php 
    include ("vue/vueMentionsLegales.php");
 ?>