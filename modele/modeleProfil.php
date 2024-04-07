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
        //2.1 Définition de la requête SQL a éxécuter (jointure de la table comment et user)
        $sqlProfil = "SELECT login_, password_, email, name, surname FROM _user WHERE email = :email";
        //2.2 Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtProfil  = $conn->prepare($sqlProfil );

        $stmtProfil->bindParam(':email', $email_utilisateur, PDO::PARAM_STR);

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
        return "Erreur : " . $e->getMessage();
    }
}


?>
