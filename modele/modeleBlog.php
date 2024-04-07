<?php
// Fonction pour ajouter un commentaire
function ajouterCommentaire($pseudo, $titre, $message) {
    // Inclure le fichier de connexion à la base de données
    require("bd.inc.php");

    try {
        // Vérifiez si les champs ne sont pas vides
        if (empty($pseudo) || empty($titre) || empty($message)) {
            return "Tous les champs sont obligatoires.";
        }

        // Connexion à la base de données
        $conn = connexionPDO();

        // Préparez la requête SQL pour insérer les données dans la base de données
        $sql = "INSERT INTO comment (title, content)
                VALUES (:title, :content)";

        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $validation_status = false; // L'avis doit être validé par un admin
        $id_user = 1; // ID de l'utilisateur qui a laissé l'avis, à remplacer par la vraie valeur
        $stmt->bindParam(':title', $titre);
        $stmt->bindParam(':content', $message);

        // Exécutez la requête SQL
        if ($stmt->execute()) {
            return "Avis ajouté avec succès !";
        } else {
            return "Erreur : " . $sql . "<br>" . $stmt->errorInfo()[2];
        }

        // Fermez la connexion à la base de données
        $conn = null;
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

// Récupérez les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    // Appel de la fonction pour ajouter le commentaire
    echo ajouterCommentaire($pseudo, $titre, $message);
}

function zekufhezfez($comment){
    //recupere les avis 
}
?>