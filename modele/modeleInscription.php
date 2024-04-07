<?php
// Inclure le fichier de connexion
require("bd.inc.php");

function inscriptionUtilisateur($nom, $prenom, $pseudo, $email, $mot_de_passe) {
    try {
        // Connexion à la base de données
        $conn = connexionPDO();

/* function controleUtilisateur(){ */
        // Vérifier si l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "L'adresse e-mail n'est pas valide.";
        }

        // Vérifier la complexité du mot de passe
        if (strlen($mot_de_passe) < 8) {
            return "Le mot de passe doit contenir au moins 8 caractères.";
        }

        if (!preg_match("#[A-Z]+#", $mot_de_passe)) {
            return "Le mot de passe doit contenir au moins une lettre majuscule.";
        }

        if (!preg_match("#[a-z]+#", $mot_de_passe)) {
            return "Le mot de passe doit contenir au moins une lettre minuscule.";
        }

        if (!preg_match("#[0-9]+#", $mot_de_passe)) {
            return "Le mot de passe doit contenir au moins un chiffre.";
        }

        if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $mot_de_passe)) {
            return "Le mot de passe doit contenir au moins un caractère spécial.";
        }
/*     } */
        // Utiliser trim pour supprimer les espaces avant et après le mot de passe
        $mot_de_passe = trim($mot_de_passe);

        // Utiliser crypt pour hacher le mot de passe
        $mot_de_passe_hache = crypt($mot_de_passe, $mot_de_passe);

        // Définir le rôle par défaut
        $role = "utilisateur";

        // Préparez la requête SQL pour insérer les données dans la base de données
        $sql = "INSERT INTO _user (login, password_, email, name, surname, role)
        VALUES (:login, :password_, :email, :name, :surname, :role)";

        $stmt = $conn->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':login', $pseudo);
        $stmt->bindParam(':password_', $mot_de_passe_hache);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $nom);
        $stmt->bindParam(':surname', $prenom);
        $stmt->bindParam(':role', $role);

        // Exécutez la requête SQL
        if ($stmt->execute()) {
            return "Inscription réussie !";
        } else {
            return "Erreur lors de l'inscription.";
        }

        // Fermez la connexion à la base de données
        $conn = null;
    } catch (PDOException $e) {
        return "Erreur : " . $e->getMessage();
    }
}

// Récupérez les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Appel de la fonction pour l'inscription
    $message = inscriptionUtilisateur($nom, $prenom, $pseudo, $email, $mot_de_passe);
    echo $message;
}
?>