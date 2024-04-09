<?php

// Inclure le fichier de connexion à la base de données
require("bd.inc.php");

// Fonction pour ajouter un commentaire
function ajouterCommentaire($idUser, $titre, $message)
{
    try {
        // 1- Connexion à la base de données
        $conn = connexionPDO();

        //3-Sauvegarde du commentaire en base de données

        //3.1
        $sqlAjout = "INSERT INTO comment (title, content, validation_status, id_user)
                VALUES (:title, :content, 0 , :id_user)";
        //3.2
        $stmtAjout = $conn->prepare($sqlAjout);

        //3.3 Liaison des paramètres
        $stmtAjout->bindParam(':title', $titre);
        $stmtAjout->bindParam(':content', $message);
        $stmtAjout->bindParam(':id_user', $idUser);

        //3.4 Exécutez la requête SQL
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
        // 1- Connexion à la base de données
        $conn = connexionPDO();

        // 2- Récupération de id_user en fonction de l'email fourni par la session

        //2.1 Définition de la requête SQL a éxécuter (jointure de la table comment et user)
        $sqlComments = "SELECT title,content,login_ FROM comment INNER JOIN _user ON comment.id_user = _user.id_user;";
        //2.2 Préparation de l'objet de connexion a la base de donnée utilisant la requête sql définie précedement
        $stmtComments = $conn->prepare($sqlComments);

        //2.3 Execution de la requête SQL
        if ($stmtComments->execute()) {
            //2.3.1 Récupération de la ligne de résultat de l'execution de la requête
            $rows = $stmtComments->fetchAll();
            //2.3.2 Envoie du résultat pour le traitement de la vue
            return $rows;
        } else {
            //2.3.3 Dans le cas ou on a une erreur SQL on remonte un message d'erreur
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
