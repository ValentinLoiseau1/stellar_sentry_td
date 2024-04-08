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

    //Démarage de la session si pas démarrer ( a confirmer)
    if (!isset($_SESSION)) {
        // Démarrer la session
        session_start();
    }
    //2 Ajouter un commentaire uniquement si un utilisateur est connécté
    if(isset($_SESSION['id_user'])){
        //2.1 Récupération de l'email de session dans une variable
        $idUser = $_SESSION['id_user'];

         //2.2 Appel de la fonction pour ajouter le commentaire
        $resultatAjout = ajouterCommentaire($idUser, $titre, $message);

        //2.3 Traitement du résultat de l'ajout
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