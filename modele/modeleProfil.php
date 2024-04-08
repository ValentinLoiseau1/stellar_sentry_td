<?php
// Inclure le fichier de connexion
require("bd.inc.php");

//Fonction récuperer tout les commentaires en base de donnée
function recupererProfil()
{

    try {
        // 1- Connexion à la base de données
        $conn = connexionPDO();

        // 2- Récupération de id_user en fonction de l'email fourni par la session
        $email_utilisateur = $_SESSION['email'];
        //2.1 Définition de la requête SQL a éxécute
        $sqlProfil = "SELECT login_, password_, email, name, surname FROM _user WHERE email = :email";
        //2.2 Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtProfil  = $conn->prepare($sqlProfil );

        $stmtProfil->bindParam(':email', $email_utilisateur);

        //2.3 Execution de la requête SQL
        if ($stmtProfil ->execute()) {
            //2.3.1 Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtProfil ->fetchAll();
            //2.3.2 Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //2.3.3 Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlProfil  . "<br>" . $stmtProfil ->errorInfo()[2];
        }
        // Fermez la connexion à la base de données
        $conn = null;
    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}

// Fonction pour mettre à jour les données de l'utilisateur
function modifierProfil($login, $password, $email, $name, $surname)
{
    try {
        // Connexion à la base de données
        $conn = connexionPDO();

        // Récupération de l'adresse e-mail de l'utilisateur à partir de la session
/*         $email_utilisateur = $_SESSION['email']; */

        // Définition de la requête SQL pour mettre à jour les données de l'utilisateur
        $sqlModifierProfil = "UPDATE _user SET login_ = :login_, password_ = :password_, email = :email, name = :name, surname = :surname WHERE email = :email_utilisateur";

        // Préparation de la requête SQL
        $stmtModifierProfil = $conn->prepare($sqlModifierProfil);

        $stmtModifierProfil->bindParam(':login', $login);
        $stmtModifierProfil->bindParam(':password', $password);
        $stmtModifierProfil->bindParam(':email', $email);
        $stmtModifierProfil->bindParam(':name', $name);
        $stmtModifierProfil->bindParam(':surname', $surname);
/*         $stmtModifierProfil->bindParam(':email_utilisateur', $email_utilisateur); */

        // Exécution de la requête SQL
        if ($stmtModifierProfil->execute()) {
            return "Les données de l'utilisateur ont été mises à jour avec succès.";
        } else {
            return "Erreur lors de la mise à jour des données de l'utilisateur : " . $stmtModifierProfil->errorInfo()[2]; // Gestion des erreurs SQL
        }
        // Fermeture de la connexion à la base de données
        $conn = null;

    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}
?>