<?php
/*
Controleur secondaire : admin
*/
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : ' . basename(__FILE__));
}

require_once "./modele/modeleAdministrateur.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if ($_POST['idAction'] == "delete") {
        
        // Récupérer l'id stocker dans l'input du formulaire
        $idRoadmap = $_POST['idRoadmap'];

        //Appel de la fonctionpour supprimer un item de la roadmap
        $resultatDelete = supprimerLesRoadpmapItem($idRoadmap);

        //Redirection vers la page adminstrateur pour montrer a l'admin que la supression a bien été prise en compte
        header("Location: ./?action=administrateur");

    } else if ($_POST['idAction'] == "ajout") {
        // Récupérer les valeurs des champs du formulaire
        $version = $_POST['version'];
        $content = $_POST['contenu'];
        $date = $_POST['date'];

        if (!isset($_SESSION)) {
            // Démarrer la session
            session_start();
        }
        $idUser = $_SESSION['id_user'];

        // Appel de la fonction ajouter un item a la roadmap
        $resultatAjoutRoadmap = ajouterLesRoadpmapItem($version, $content, $date, $idUser);

        header("Location: ./?action=administrateur");
    }
}

?>
<?php
include("vue/vueAdministrateur.php");
?>
