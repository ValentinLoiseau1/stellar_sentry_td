<?php
/*
Controleur secondaire : profil
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>
<?php
require "./modele/modeleProfil.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['pseudo'];
    $password = $_POST['mot_de_passe'];
    $mot_de_passe_confirmation = $_POST['mot_de_passe_confirmation'];
    $email = $_POST['email'];
    $name = $_POST['nom'];
    $surname = $_POST['prenom'];
    

    //Démarage de la session si pas démarrer ( a confirmer)
    if (!isset($_SESSION)) {
        // Démarrer la session
        session_start();
    }
    $idUser = $_SESSION['id_user'];

    // Appel de la fonction pour modifier le profil
    $resultatModification = modifierProfil($login, $password, $mot_de_passe_confirmation, $email, $name, $surname, $idUser);

    if ($resultatModification == "Les mots de passe ne correspondent pas."){
        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        $_SESSION['msg'] = $resultatModification;
    }
    // Gérer le résultat de la modification du profil
    if ($resultatModification == "Les données de l'utilisateur ont été mises à jour avec succès.") {
        // Rediriger vers la page de profil avec un message de succès
        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        header("Location: ./?action=profil");
    } else {
        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        $_SESSION['msg'] = $resultatModification;
    }
}
?>
<?php
include("vue/vueProfil.php");
?>