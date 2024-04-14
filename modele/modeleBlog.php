<?php

// Inclusion du fichier de connexion à la base de données
require("bd.inc.php");

// Fonction pour ajouter un commentaire
function ajouterCommentaire($idUser, $titre, $message)
{
    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Préparation de la requête SQL
        $sqlAjout = "INSERT INTO comment (title, content, validation_status, id_user)
                VALUES (:title, :content, 0 , :id_user)";
        $stmtAjout = $conn->prepare($sqlAjout);

        //Liaison des paramètres
        $stmtAjout->bindParam(':title', $titre);
        $stmtAjout->bindParam(':content', $message);
        $stmtAjout->bindParam(':id_user', $idUser);

        //Exécution de la requête SQL
        if ($stmtAjout->execute()) {
            return "Avis ajouté avec succès !";
        } else {
            return "Erreur : " . $sqlAjout . "<br>" . $stmtAjout->errorInfo()[2];
        }

    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}

//Fonction récuperer tout les commentaires en base de donnée
function recupererCommentaires()
{

    try {
        //Connexion à la base de données
        $conn = connexionPDO();

        //Définition de la requête SQL a éxécuter (jointure de la table comment et user)
        $sqlComments = "SELECT title,content,login_ FROM comment INNER JOIN _user ON comment.id_user = _user.id_user;";

        //Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtComments = $conn->prepare($sqlComments);

        //Execution de la requête SQL
        if ($stmtComments->execute()) {
            //Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtComments->fetchAll();
            //Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //Dans le cas ou on a une erreur SQL on remonte un message d'erreur
            return "Erreur : " . $sqlComments . "<br>" . $stmtComments->errorInfo()[2];
        }
    } catch (PDOException $e) {
        return "Erreur lors de la connexion a la base donnée, veuillez contactez le support.";
    } finally {
        if (isset($conn)) {
            $conn = null;
        
        }
    }
}
