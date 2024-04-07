<?php
/*
Controleur secondaire : connexion
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>
<?php
require "./modele/modeleConnexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    // Appel de la fonction pour la connexion
    $resultatConnexion = connexionUtilisateur($email, $mot_de_passe);

    if ($resultatConnexion == "Connexion réussie !") {
        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        // Stockage de la valeur dans $_SESSION 
        $_SESSION['email'] = $_POST['email'];
         //Redirige vers l'accueil si le mot de passe est correct
        header("Location: ./?action=default");
    } else {
        //Redirige vers la page de connexion dans tout les autres cas
        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        $_SESSION['msg'] = $resultatConnexion;
    }
}
?>

<?php
    include("vue/vueConnexion.php");
?>