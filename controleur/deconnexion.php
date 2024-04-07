<?php
/*
Controleur secondaire : deconnexion.php
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// header ("Location: ?action=accueil"); 

?>
<?php
if (!isset($_SESSION)) {
    // Démarrer la session
    session_start();
}

session_destroy();

//Redirige vers la page d'acceuil
header("Location: ./?action=default");
exit();

?>

