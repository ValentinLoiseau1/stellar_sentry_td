<?php
/*
Controleur secondaire : blog
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

?>
<?php
require_once "./modele/modeleBlog.php";

// Récupérez les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //1-Récupération des données de la requête POST
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    //Démarage de la session si elle n'est pas démarrer
    if (!isset($_SESSION)) {
        // Démarrer la session
        session_start();
    }

    if(isset($_SESSION['id_user'])){
        // Récupération de l'id_user de la session dans une variable
        $idUser = $_SESSION['id_user'];

        //Appel de la fonction pour ajouter le commentaire
        $resultatAjout = ajouterCommentaire($idUser, $titre, $message);

        //Traitement du résultat de l'ajout
        if($resultatAjout == "Avis ajouté avec succès !"){
            header("Location: ./?action=blogAjout");
        } else {
            $_SESSION['msg'] = $resultatAjout;
        }

    }
   
}
?>
<?php
include("vue/vueBlog.php");
?>