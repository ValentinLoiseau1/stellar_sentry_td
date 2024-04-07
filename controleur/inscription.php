<?php
/*
Controleur secondaire : inscription
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

// header ("Location: ?action=accueil"); 

?>
<?php
require "./modele/modeleInscription.php";

// Récupérez les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Appel de la fonction pour l'inscription
    $resultatInscription = inscriptionUtilisateur($nom, $prenom, $pseudo, $email, $mot_de_passe);

    if ($resultatInscription == "Inscription réussie !") {
        //Redirige vers la page connexion si l'inscription a réussie
        header("Location: ./?action=connexion");
    } if ($resultatInscription == "L'adresse e-mail n'est pas valide.") {
            //Redirige vers la page connexion si l'inscription a réussie
            $_SESSION['msg'] = $resultatInscription;;
    } else {
        //Redirige vers la page de connexion dans tout les autres cas
        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        $_SESSION['msg'] = $resultatInscription;
    }
}
?>
<?php
include("vue/vueInscription.php");
?>
